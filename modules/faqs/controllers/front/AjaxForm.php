<?php
if (!defined('_PS_VERSION_')) {
  exit;
}
require_once(dirname(__FILE__) . '/../../classes/faqsPost.php');
require_once(dirname(__FILE__) . '/../../classes/FaqsMailer.php');

class faqsAjaxFormModuleFrontController extends FrontController
{
  public function initContent()
  {
    if (!$this->ajax) {
      parent::initContent();
    }
  }

  public function displayAjax()
  {
    $json = array();

    try {

      if (Tools::getValue('action') == 'setUsefulness') {
          $json = $this->updateUsefulness();
          $json['success'] = true;
      }

      if (Tools::getValue('action') == 'send') {
        $name = Tools::getValue('name');
        $email = Tools::getValue('email');
        $question_category_id = Tools::getValue('category');
        $question = Tools::getValue('question');

        if (!$name) {
          throw new Exception ('name_customer:' . Module::getInstanceByName('faqs')->l('Name is required', 'AjaxForm'));
        }

        if (!$email) {
          throw new Exception ('email_customer:' . Module::getInstanceByName('faqs')->l('E-mail is required', 'AjaxForm'));
        } elseif ($email && !Validate::isEmail($email)) {
          throw new Exception ('email_customer:' . Module::getInstanceByName('faqs')->l('E-mail is not valid', 'AjaxForm'));
        }

        if (!$question) {
          throw new Exception ('question_customer:' . Module::getInstanceByName('faqs')->l('Question is required', 'AjaxForm'));
        }

        $json['form'] = 'response';
        $question_is_saved = $this->saveCustomerQuestion($name, $email, $question_category_id, $question);

        if (!$question_is_saved) {
          throw new Exception('Can not save question!');
        }

        $notification_template = FaqsMailer::getNewQuestionTemplate($this->getEmailNotificationVars($question_is_saved));
        $notification_is_sent = FaqsMailer::sendNewQuestionNotificationToAdmins($notification_template);

        if ($question_is_saved && $notification_is_sent) {
          $json['form'] = $this->notificationForm(Module::getInstanceByName('faqs')->l('Please, check your mailbox from time to time. We will respond you as soon as possible.', 'AjaxForm'), 'success');
        } else {
          $json['form'] = $this->notificationForm(Module::getInstanceByName('faqs')->l('Something went wrong... Can you try again?', 'AjaxForm'), 'error');
        }
      }

      if (Tools::getValue('action') == 'getSearchPreview') {
          $json['template'] = $this->getSearchPreview();
      }

      if (Tools::getValue('action') == 'showForm') {
        $json['form'] = $this->getFaqsForm(Tools::getValue('id_lang'), Tools::getValue('id_shop'));
      }

      die(json_encode($json));
    } catch (Exception $e) {
      $error_info = explode(':', $e->getMessage());
      $json['error_field'] = $error_info[0];
      $json['error_message'] = $error_info[1];

      if ($e->getCode() == 10) {
        $json['error_message'] = $e->getMessage();
      }
    }

    die(json_encode($json));
  }

  public function updateUsefulness()
  {
      $id_faq = Tools::getValue('id_faq');
      $usefulness_cookies = Tools::getValue('usefulness_cookies');
      $usefulness = Tools::getValue('usefulness');

      $likes = (int)Db::getInstance()->getValue("SELECT `like` FROM `"._DB_PREFIX_."gomakoil_faq` WHERE `id_gomakoil_faq` = ".(int)$id_faq);
      $dislikes = (int)Db::getInstance()->getValue("SELECT `dislike` FROM `"._DB_PREFIX_."gomakoil_faq` WHERE `id_gomakoil_faq` = ".(int)$id_faq);

      if ($usefulness === 'like') {
          $likes++;
      } elseif ($usefulness === 'dislike') {
          $dislikes++;
      }

      if ($usefulness_cookies === 'like') {
          $likes--;
      } elseif ($usefulness_cookies === 'dislike') {
          $dislikes--;
      }

      if ($likes < 0) {
          $likes = 0;
      }
      if ($dislikes < 0) {
          $dislikes = 0;
      }

      Db::getInstance()->execute("UPDATE `"._DB_PREFIX_."gomakoil_faq` SET `like` = ".(int)$likes.", `dislike` = ".(int)$dislikes." WHERE `id_gomakoil_faq` = ".(int)$id_faq);
      return [
            'likes' => $likes,
            'dislikes' => $dislikes
      ];
  }

  public function getSearchPreview()
  {
      $id_shop = Context::getContext()->shop->id;
      $id_lang = Context::getContext()->language->id;
      $search_query = Tools::getValue('search_query');

      $template = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/front/all_versions/search_preview.tpl');

      $template->assign(array(
          'base_url' => faqs::getBaseUrl(),
          'rewrite_settings'  => faqs::getRewriteSettings(),
          'search_results' => faqsPost::searchFaqs($id_shop, $id_lang, $search_query, 5)
      ));

      return $template->fetch();

  }

  private function getLinkToFaqEditPage($base_link, $faq_id, $token)
  {
    return $base_link . '&updategomakoil_faq&id_gomakoil_faq='.(int)$faq_id.'&token='.$token;
  }

  private function getEmailNotificationVars($question_id)
  {
    $associated_product = false;
    $associated_product_id = Tools::getValue('id_product');

    if (!empty($associated_product_id)) {
      $associated_product = array();
      $associated_product['name'] = Product::getProductName($associated_product_id);
      $associated_product['link'] = Context::getContext()->link->getProductLink($associated_product_id);
    }

    $faqs_post_controller_data = Module::getInstanceByName('faqs')->getFaqsPostControllerData();

    return array(
      'customer_name'          => !empty(Tools::getValue('name')) ? Tools::getValue('name') : '',
      'customer_email'         => !empty(Tools::getValue('email')) ? Tools::getValue('email') : '',
      'faq_category_name'      => !empty(Tools::getValue('category')) ? faqsCategory::getNameById(Tools::getValue('category'), Tools::getValue('id_lang')) : '',
      'store_name'             => Configuration::get('PS_SHOP_NAME'),
      'customer_question'      => !empty(Tools::getValue('question')) ? Tools::getValue('question') : '',
      'associated_product'     =>  $associated_product,
      'faq_edit_page_link' => $this->getLinkToFaqEditPage($faqs_post_controller_data['base_url'], $question_id, $faqs_post_controller_data['token']),
    );
  }

  public function notificationForm($msg, $status){
    $tpl_path = Module::getInstanceByName('faqs')->absolutePathToFrontTemplates . 'notification.tpl';
    $data = Context::getContext()->smarty->createTemplate($tpl_path);
    $data->assign(
      array(
        'status' => $status,
        'msg' => $msg,
      )
    );

    return $data->fetch();
  }

  public function saveCustomerQuestion($name, $email, $category, $question) {

    //Need to make answer field not required, for successful upgrade of unanswered questions
    faqsPost::setFieldParameter('answer', 'required', false);

    $is_associated_with_product = !empty(Tools::getValue('id_product'));

    $faqsPost = new faqsPost();
    $faqsPost->active = 0;
    $faqsPost->most = 0;
    $faqsPost->as_url = 0;
    $faqsPost->association = $is_associated_with_product ? 1 : 0;
    $faqsPost->id_gomakoil_faq_category = $category;

    $this->position = (int)faqsPost::getLastPostPosition($category) + 1;

    $faqsPost->by_customer = 1;
    $faqsPost->name = $name;
    $faqsPost->email = $email;
    $languages = Language::getLanguages(false);
    foreach ($languages as $lang){
      $faqsPost->question[$lang['id_lang']] = $question;
      $faqsPost->link_rewrite[$lang['id_lang']] = Tools::truncate(Tools::str2url($question), 125, '');
    }

    $is_saved = $faqsPost->save();

    faqsPost::setFieldParameter('answer', 'required', true);

    if (!$is_saved) {
      return false;
    }

    $faqsPost->addIdToListOfUnansweredQuestions();

    if ($is_associated_with_product) {
      $faqsPost->setAssociation($faqsPost->id, Tools::getValue('id_product'), 'faq_association_product', 'id_product');
    }

    return $faqsPost->id;
  }

  public function getFaqsForm($id_lang, $id_shop) {
    $tpl_path = Module::getInstanceByName('faqs')->absolutePathToFrontTemplates . 'form.tpl';
    $data = Context::getContext()->smarty->createTemplate($tpl_path);
    $faqCategories = faqsCategory::getCategoriesFaq(Context::getContext()->shop->id, Context::getContext()->language->id);

    $show_consent_message = Configuration::get('FAQS_SHOW_CONSENT_CHECKBOX');
    $consent_message = false;
    if ($show_consent_message) {
      $consent_message = Configuration::get('FAQS_CONSENT_CHECKBOX_MESSAGE', $id_lang);
    }

    $data->assign(
      array(
        'id_shop'           => $id_shop,
        'id_lang'           => $id_lang,
        'faqCategories'     => $faqCategories,
        'base_url'          => _PS_BASE_URL_SSL_.__PS_BASE_URI__,
        'consent_message'   => $consent_message,
        'enable_recaptcha'  => Configuration::get('FAQS_ENABLE_RECAPTCHA'),
        'recaptcha_key'     => Configuration::get('FAQS_RECAPTCHA_KEY')
      )
    );

    return $data->fetch();
  }

}