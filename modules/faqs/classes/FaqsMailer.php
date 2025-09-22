<?php
if (!defined('_PS_VERSION_')) { exit; }
class FaqsMailer
{
  public static function sendNewQuestionNotificationToAdmins($notification_template)
  {
    $admin_emails = self::getAdminEmails();

    if (empty($admin_emails)) {
      throw new Exception('Can not find emails of admins');
    }

    foreach($admin_emails as $send_to) {
      $template_vars = array('{content}' => $notification_template);
      self::send($template_vars, trim($send_to), null, Module::getInstanceByName('faqs')->l('New question', 'FaqsMailer'));
    }

    return true;
  }

  public static function getNewQuestionTemplate($tpl_vars)
  {
    $tpl_path = _PS_MODULE_DIR_ . 'faqs/views/templates/front/all_versions/new_question_notification.tpl';
    $template = Context::getContext()->smarty->createTemplate($tpl_path);

    $template->assign(
      array(
        'logo_url'     =>  Context::getContext()->link->getMediaLink(_PS_IMG_.Configuration::get('PS_LOGO')),
        'baseUrl'      =>  _PS_BASE_URL_SSL_.__PS_BASE_URI__,
        'store_name' => $tpl_vars['store_name'],
        'store_link' => Context::getContext()->link->getBaseLink(),
        'customer_name'      => $tpl_vars['customer_name'],
        'customer_email'      => $tpl_vars['customer_email'],
        'faq_category_name'      => $tpl_vars['faq_category_name'],
        'customer_question'      => $tpl_vars['customer_question'],
        'associated_product_name'      => is_array($tpl_vars['associated_product']) ? $tpl_vars['associated_product']['name'] : false,
        'associated_product_link'      => is_array($tpl_vars['associated_product']) ? $tpl_vars['associated_product']['link'] : '#',
        'faq_edit_page_link' => Validate::isUrl($tpl_vars['faq_edit_page_link']) ? $tpl_vars['faq_edit_page_link'] : '#',
      )
    );

    return $template->fetch();
  }

  public static function sendAnsweredQuestionNotificationToCustomer(faqsPost $question_obj)
  {

    $notification_template = self::getQuestionWasAnsweredTemplate($question_obj);

    $template_vars = array('{content}' => $notification_template);
    self::send($template_vars, trim($question_obj->email), NULL, Module::getInstanceByName('faqs')->l('Your Question was Answered', 'FaqsMailer'));

    return true;
  }

  private static function getQuestionWasAnsweredTemplate(faqsPost $question_obj)
  {
    $faq_category = new faqsCategory($question_obj->id_gomakoil_faq_category);
    $tpl_path = _PS_MODULE_DIR_ . 'faqs/views/templates/front/all_versions/answered_question_notification.tpl';
    $template = Context::getContext()->smarty->createTemplate($tpl_path);
    $logo = Context::getContext()->link->getMediaLink(_PS_IMG_.Configuration::get('PS_LOGO'));
    $lang_id = Context::getContext()->language->id;

    $faqs_base_url = faqs::getBaseUrl();

    if (faqs::getRewriteSettings()) {
      $link_to_question_category_page = $faqs_base_url . $faq_category->link_rewrite[$lang_id] . '.html';
      $link_to_question_page = $faqs_base_url . $faq_category->link_rewrite[$lang_id] . '/' . $question_obj->link_rewrite[$lang_id] . '.html';
    } else {
      $link_to_question_category_page = $faqs_base_url . '&category=' . $faq_category->link_rewrite[$lang_id];
      $link_to_question_page = $faqs_base_url . '&category=' . $faq_category->link_rewrite[$lang_id] . '&question=' . $question_obj->link_rewrite[$lang_id];
    }

//    var_dump($link_to_question_page); die;

    $template->assign(
      array(
        'logo_url'     =>  $logo,
        'baseUrl'      =>  _PS_BASE_URL_SSL_.__PS_BASE_URI__,
        'customer_name'      => $question_obj->name,
        'customer_email'      => $question_obj->email,
        'customer_question'      => $question_obj->question[$lang_id],
        'answer' => $question_obj->answer[$lang_id],
        'link_to_question_page' => $link_to_question_page,
        'faq_category_name' => $faq_category->name[$lang_id],
        'link_to_question_category_page' => $link_to_question_category_page,
      )
    );

    return $template->fetch();
  }

  private static function send($template_vars, $send_to, $send_from, $subject)
  {
    $mail = Mail::Send(
      Configuration::get('PS_LANG_DEFAULT'),
      'faqs',
      $subject,
      $template_vars,
      "$send_to",
      NULL,
      NULL,
      NULL,
      NULL,
      NULL,
      dirname(__FILE__).'/../mails/');

    return $mail;
  }

  private static function getAdminEmails()
  {
    $email_admin = Configuration::get('FAQS_EMAILS');
    return explode(',', $email_admin);
  }
}