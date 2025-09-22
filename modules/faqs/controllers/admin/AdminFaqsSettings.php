<?php
if (!defined('_PS_VERSION_')) {
  exit;
}
require_once(dirname(__FILE__) . '/../../classes/faqsCategory.php');
require_once(dirname(__FILE__) . '/../../faqs.php');

class AdminFaqsSettingsController extends ModuleAdminController
{
  public function __construct()
  {
    $this->className = '';
    $this->table = 'gomakoil_faq_settings';
    $this->bootstrap = true;
    $this->lang = false;
    $this->edit = true;
    $this->delete = true;

    parent::__construct();

    $this->multishop_context = -1;
    $this->multishop_context_group = true;
    $this->position_identifier = 'id_gomakoil_faq_settings';
    $_GET['updategomakoil_faq_settings'] = 1;
    $_GET['id_gomakoil_faq_settings'] = 1;
    $this->submit_action = '';
  }

  private function getListFaqs()
  {
      $tpl = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/admin/faqs-table.tpl');
      $tpl->assign([
          'faqs' => faqsPost::getAllFaqs($this->context->language->id, $this->context->shop->id, 'id_gomakoil_faq'),
          'selected' => Configuration::get('FAQS_CART_SELECTED_QUESTIONS') ? json_decode(Configuration::get('FAQS_CART_SELECTED_QUESTIONS'), true) : [],
      ]);
      return $tpl->fetch();
  }

  private function getListCategoriesFaq()
  {
      $tpl = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/admin/categories-faq-table.tpl');
      $tpl->assign([
          'categories' => faqsCategory::getCategoriesFaq($this->context->language->id, $this->context->shop->id),
          'selected' => Configuration::get('FAQS_CART_SELECTED_CATEGORIES') ? json_decode(Configuration::get('FAQS_CART_SELECTED_CATEGORIES'), true) : [],
      ]);
      return $tpl->fetch();
  }

  public function renderForm()
  {

      $hooks = array(
          array(
              'id'   => 'displayWrapperTop',
              'val'  => 'displayWrapperTop',
              'name' => $this->l('displayWrapperTop')
          ),
          array(
              'id'   => 'displayWrapperBottom',
              'val'  => 'displayWrapperBottom',
              'name' => $this->l('displayWrapperBottom')
          ),
          array(
              'id'   => 'displayFooterBefore',
              'val'  => 'displayFooterBefore',
              'name' => $this->l('displayFooterBefore')
          ),
          array(
              'id'   => 'displayTop',
              'val'  => 'displayTop',
              'name' => $this->l('displayTop')
          ),
          array(
              'id'   => 'displayHome',
              'val'  => 'displayHome',
              'name' => $this->l('displayHome')
          ),
          array(
              'id'   => 'displayContentWrapperTop',
              'val'  => 'displayContentWrapperTop',
              'name' => $this->l('displayContentWrapperTop')
          ),
          array(
              'id'   => 'displayContentWrapperBottom',
              'val'  => 'displayContentWrapperBottom',
              'name' => $this->l('displayContentWrapperBottom')
          ),
      );

    $this->fields_form = array(
      'legend' => array(
        'title' => $this->l('Settings'),
        'icon' => 'icon-AdminTools'
      ),
      'tabs' => array(
          'general' => $this->l('General'),
          'left_column' => $this->l('Left/Right Column'),
          'home_faq_page' => $this->l('Home FAQs Page'),
          'faq_page' => $this->l('Faq Page'),
          'product_page' => $this->l('Product Page'),
          'cart_page' => $this->l('Shopping Cart Page'),
          'home_page' => $this->l('Home Page'),
          'footer_page' => $this->l('Footer'),
          'code_mirror' => $this->l('Advanced Styles (CSS)'),
      ),
      'input' => array(
        array(
          'type' => 'switch',
          'label' => $this->l('Show FAQs categories block in left/right column'),
          'name' => 'categories',
          'is_bool' => true,
          'tab' => 'left_column',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show just on FAQs page'),
          'name' => 'categories_faq',
          'form_group_class' => 'categories_faq',
          'is_bool' => true,
          'tab' => 'left_column',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'type' => 'html',
          'name' => '',
          'tab' => 'left_column',
          'form_group_class' => 'line',
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show featured questions block in left/right column'),
          'name' => 'featured',
          'is_bool' => true,
          'tab' => 'left_column',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show just on FAQs page'),
          'name' => 'featured_faq',
          'form_group_class' => 'featured_faq',
          'is_bool' => true,
          'tab' => 'left_column',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'type' => 'html',
          'name' => '',
          'tab' => 'left_column',
          'form_group_class' => 'line',
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show button "Ask a question" in left/right column'),
          'name' => 'button',
          'is_bool' => true,
          'tab' => 'left_column',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
          array(
              'type' => 'switch',
              'label' => $this->l('Show just on FAQs page'),
              'name' => 'button_faqs',
              'form_group_class' => 'button_faqs',
              'is_bool' => true,
              'tab' => 'left_column',
              'values' => array(
                  array(
                      'id' => 'display_on',
                      'value' => 1,
                      'label' => $this->l('Yes')),
                  array(
                      'id' => 'display_off',
                      'value' => 0,
                      'label' => $this->l('No')),
              ),
          ),
          array(
              'type' => 'html',
              'name' => '',
              'tab' => 'left_column',
              'form_group_class' => 'line',
          ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show FAQs associated to product category in left/right column'),
          'name' => 'product_category_assoc_faqs',
          'is_bool' => true,
          'tab' => 'left_column',
          'form_group_class' => 'product_category_assoc_left_right',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'label' => $this->l('Number of associated to product category FAQs to display'),
          'type' => 'text',
          'name' => 'product_category_assoc_faqs_limit',
          'tab' => 'left_column',
          'form_group_class' => 'product_category_assoc_faqs_limit',
        ),


        array(
          'type' => 'switch',
          'label' => $this->l('Show related products in FAQ page'),
          'name' => 'show_related_products',
          'is_bool' => true,
          'tab' => 'faq_page',
          'form_group_class' => 'show_related_products',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'label' => $this->l('Number of products to display'),
          'type' => 'text',
          'name' => 'related_products_limit',
          'tab' => 'faq_page',
          'form_group_class' => 'related_products_limit',
        ),
          array(
              'type' => 'html',
              'name' => '',
              'tab' => 'faq_page',
              'form_group_class' => 'line',
          ),
          array(
              'type' => 'switch',
              'label' => $this->l('Show FAQs from same category'),
              'name' => 'show_faqs_same_category',
              'is_bool' => true,
              'tab' => 'faq_page',
              'form_group_class' => 'show_faqs_same_category',
              'values' => array(
                  array(
                      'id' => 'display_on',
                      'value' => 1,
                      'label' => $this->l('Yes')),
                  array(
                      'id' => 'display_off',
                      'value' => 0,
                      'label' => $this->l('No')),
              ),
          ),
          array(
              'label' => $this->l('Number of FAQs from same category to display'),
              'type' => 'text',
              'name' => 'faqs_same_category_limit',
              'tab' => 'faq_page',
              'form_group_class' => 'faqs_same_category_limit',
          ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show button "Ask a question" on product page'),
          'name' => 'button_on_product_page',
          'is_bool' => true,
          'tab' => 'product_page',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),

          array(
              'type' => 'switch',
              'label' => $this->l('Show FAQs in shopping cart'),
              'name' => 'show_faqs_cart_page',
              'is_bool' => true,
              'tab' => 'cart_page',
              'form_group_class' => 'show_faqs_cart_page',
              'values' => array(
                  array(
                      'id' => 'display_on',
                      'value' => 1,
                      'label' => $this->l('Yes')),
                  array(
                      'id' => 'display_off',
                      'value' => 0,
                      'label' => $this->l('No')),
              ),
          ),
          array(
              'label' => $this->l('Number of FAQs to display'),
              'type' => 'text',
              'name' => 'faqs_cart_page_limit',
              'tab' => 'cart_page',
              'form_group_class' => 'faqs_cart_page_limit',
          ),
          array(
              'type' => 'html',
              'label' => $this->l('Select FAQs Categories to display'),
              'name' => $this->getListCategoriesFaq(),
              'tab' => 'cart_page',
          ),
          array(
              'type' => 'html',
              'label' => $this->l('Select FAQs to display'),
              'name' => $this->getListFaqs(),
              'tab' => 'cart_page',
          ),


          array(
              'type' => 'switch',
              'label' => $this->l('Show featured questions block in home page'),
              'name' => 'show_faqs_home_page',
              'is_bool' => true,
              'tab' => 'home_page',
              'form_group_class' => 'show_faqs_home_page',
              'values' => array(
                  array(
                      'id' => 'display_on',
                      'value' => 1,
                      'label' => $this->l('Yes')),
                  array(
                      'id' => 'display_off',
                      'value' => 0,
                      'label' => $this->l('No')),
              ),
          ),

          array(
              'label' => $this->l('Number featured questions in home page'),
              'type' => 'text',
              'name' => 'faqs_home_page_limit',
              'tab' => 'home_page',
              'form_group_class' => 'faqs_home_page_limit',
          ),

          array(
              'type'    => 'select',
              'label'   => $this->l('Display Hook'),
              'name'    => 'faqs_home_page_hook',
              'tab'     => 'home_page',
              'options' => array(
                  'query' => $hooks,
                  'id'    => 'id',
                  'name'  => 'name'
              )
          ),


        array(
          'type' => 'switch',
          'label' => $this->l('Show featured questions block in footer'),
          'name' => 'featured_footer',
          'is_bool' => true,
          'tab' => 'footer_page',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'label' => $this->l('Number featured questions in footer'),
          'type' => 'text',
          'tab' => 'footer_page',
          'name' => 'featured_footer_count',
          'form_group_class' => 'featured_footer_count',
        ),
          array(
              'label' => $this->l('Home Page URL Rewrite'),
              'type' => 'text',
              'tab' => 'home_faq_page',
              'name' => 'seo_home_page',
              'form_group_class' => 'seo-home-page',
          ),
          array(
              'type' => 'switch',
              'label' => $this->l('Enable reCAPTCHA'),
              'name' => 'enable_recaptcha',
              'is_bool' => true,
              'tab' => 'general',
              'values' => array(
                  array(
                      'id' => 'display_on',
                      'value' => 1,
                      'label' => $this->l('Yes')),
                  array(
                      'id' => 'display_off',
                      'value' => 0,
                      'label' => $this->l('No')),
              ),
          ),
          array(
              'label' => $this->l('reCAPTCHA Key'),
              'type' => 'text',
              'tab' => 'general',
              'name' => 'recaptcha_key',
          ),
          array(
              'type' => 'textarea',
              'label' => $this->l('Send notification for'),
              'name' => 'emails',
              'autoload_rte' => false,
              'rows' => 3,
              'cols' => 20,
              'tab' => 'general',
              'required' => true,
              'form_group_class' => 'field_width_50',
              'desc' => $this->l('Each email must be separated by a comma'),
          ),

          array(
              'type' => 'switch',
              'label' => $this->l('Ask customer for consent to process his personal data'),
              'name' => 'show_consent_checkbox',
              'is_bool' => true,
              'tab' => 'general',
              'values' => array(
                  array(
                      'id' => 'show_consent_checkbox_on',
                      'value' => 1,
                      'label' => $this->l('Yes')),
                  array(
                      'id' => 'show_consent_checkbox_off',
                      'value' => 0,
                      'label' => $this->l('No')),
              ),
          ),
          array(
              'type' => 'textarea',
              'label' => $this->l('Consent message'),
              'name' => 'consent_checkbox_message',
              'tab' => 'general',
              'autoload_rte' => true,
              'lang' => true,
              'form_group_class' => 'consent_checkbox_message_textarea',
              'rows' => 10,
              'cols' => 100,
              'value' => 'wefwefew'
          ),
          array(
              'type' => 'switch',
              'label' => $this->l('Show Usefulness block'),
              'name' => 'show_usefulness',
              'is_bool' => true,
              'tab' => 'general',
              'values' => array(
                  array(
                      'id' => 'display_on',
                      'value' => 1,
                      'label' => $this->l('Yes')),
                  array(
                      'id' => 'display_off',
                      'value' => 0,
                      'label' => $this->l('No')),
              ),
          ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show a distinct icon for questions sent by customers'),
          'name' => 'icon_for_sent_by_customer',
          'is_bool' => true,
          'tab' => 'general',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show popup with customer name and date on icon hover'),
          'name' => 'popup_for_sent_by_customer',
          'is_bool' => true,
          'tab' => 'general',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),

        array(
          'type' => 'switch',
          'label' => $this->l('Send email notification to customer when his question is answered'),
          'name' => 'send_email_for_customer_on_answer',
          'is_bool' => true,
          'tab' => 'general',
          'values' => array(
            array(
              'id' => 'display_on',
              'value' => 1,
              'label' => $this->l('Yes')),
            array(
              'id' => 'display_off',
              'value' => 0,
              'label' => $this->l('No')),
          ),
        ),

          array(
              'label' => $this->l('Number of question to show on main page category block'),
              'type' => 'text',
              'tab' => 'home_faq_page',
              'name' => 'num_of_faq_in_cat_block',
              'form_group_class' => 'num-of-faq-in-cat-block',
          ),

        array(
          'type' => 'textarea',
          'label' => $this->l('Advanced Styles (CSS)'),
          'name' => 'css_code',
          'class' => 'css_code',
          'form_group_class' => 'codeMirror',
          'height' => 300,
          'tab' => 'code_mirror',
        ),
      ),
      'buttons' => array(
        'save-and-stay' => array(
          'title' => $this->l('Save'),
          'name' => 'save_settings',
          'type' => 'submit',
          'class' => 'btn btn-default pull-right',
          'icon' => 'process-icon-save'
        ),
      ),
    );

    $this->tpl_form_vars['PS_ALLOW_ACCENTED_CHARS_URL'] = (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL');
    $this->fields_value['submitAddgomakoil_faq_settings'] = (int)0;
    $this->fields_value['categories'] = Configuration::get('FAQS_CATEGORIES');
    $this->fields_value['categories_faq'] = Configuration::get('FAQS_CATEGORIES_FAQ');
    $this->fields_value['featured'] = Configuration::get('FAQS_FEATURED');
    $this->fields_value['featured_faq'] = Configuration::get('FAQS_FEATURED_FAQ');
    $this->fields_value['button'] = Configuration::get('FAQS_SHOW_BUTTON');
    $this->fields_value['emails'] = Configuration::get('FAQS_EMAILS');
    $this->fields_value['button_faqs'] = Configuration::get('FAQS_SHOW_BUTTON_FAQ');
    $this->fields_value['button_on_product_page'] = Configuration::get('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE');
    $this->fields_value['enable_recaptcha'] = Configuration::get('FAQS_ENABLE_RECAPTCHA');
    $this->fields_value['recaptcha_key'] = Configuration::get('FAQS_RECAPTCHA_KEY');
    $this->fields_value['icon_for_sent_by_customer'] = Configuration::get('FAQS_CUSTOMER_QUESTION_ICON');
    $this->fields_value['popup_for_sent_by_customer'] = Configuration::get('FAQS_CUSTOMER_QUESTION_POPUP');
    $this->fields_value['product_category_assoc_faqs'] = Configuration::get('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ');
    $this->fields_value['product_category_assoc_faqs_limit'] = Configuration::get('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT');
    $this->fields_value['css_code'] = Configuration::get('FAQS_CSS_CODE');
    $this->fields_value['seo_home_page'] = Configuration::get('FAQS_SEO_HOME_PAGE');
    $this->fields_value['num_of_faq_in_cat_block'] = Configuration::get('FAQS_NUM_OF_FAQ_IN_CAT_BLOCK');
    $this->fields_value['send_email_for_customer_on_answer'] = Configuration::get('FAQS_SEND_EMAIL_TO_CUSTOMER_ON_ANSWER');
    $this->fields_value['show_consent_checkbox'] = Configuration::get('FAQS_SHOW_CONSENT_CHECKBOX');

   $this->fields_value['show_related_products'] = Configuration::get('FAQS_SHOW_RELATED_PRODUCTS');
   $this->fields_value['related_products_limit'] = Configuration::get('FAQS_RELATED_PRODUCTS_LIMIT');
   $this->fields_value['show_usefulness'] = Configuration::get('FAQS_SHOW_USEFULNESS');

   $this->fields_value['show_faqs_same_category'] = Configuration::get('FAQS_SHOW_QUESTION_SAME_CATEGORY');
   $this->fields_value['faqs_same_category_limit'] = Configuration::get('FAQS_SAME_CATEGORY_LIMIT');

   $this->fields_value['show_faqs_cart_page'] = Configuration::get('FAQS_SHOW_QUESTION_CART_PAGE');
   $this->fields_value['faqs_cart_page_limit'] = Configuration::get('FAQS_CART_PAGE_LIMIT');

   $this->fields_value['show_faqs_home_page'] = Configuration::get('FAQS_SHOW_QUESTION_HOME_PAGE');
   $this->fields_value['faqs_home_page_limit'] = Configuration::get('FAQS_HOME_PAGE_LIMIT');
   $this->fields_value['faqs_home_page_hook'] = Configuration::get('FAQS_HOME_PAGE_HOOK');

    $languages = Language::getLanguages(false);
    $consent_checkbox_message = array();
    foreach ($languages as $lang) {
      $consent_checkbox_message[$lang['id_lang']] = Configuration::get('FAQS_CONSENT_CHECKBOX_MESSAGE', $lang['id_lang']);
    }
    $this->fields_value['consent_checkbox_message'] = $consent_checkbox_message;
    unset($consent_checkbox_message);

    $footer = Configuration::get('FAQS_FEATURED_FOOTER');
    $footer_count = Configuration::get('FAQS_FEATURED_FOOTER_COUNT');

    if($footer){
      $this->fields_value['featured_footer'] = $footer;
    }
    else{
      $this->fields_value['featured_footer'] = 0;
    }

    if($footer_count || $footer_count == 0){
      $this->fields_value['featured_footer_count'] = $footer_count;
    }
    else{
      $this->fields_value['featured_footer_count'] = 3;
    }

    return parent::renderForm();
  }

  public function getCodemirrorCssForm()
  {
    $codemirror_css_template = Context::getContext()->smarty->createTemplate(_PS_MODULE_DIR_ . 'faqs/views/templates/admin/codemirror_custom.tpl');

    $css_code = Configuration::get('FAQS_CSS_CODE');

    $codemirror_css_template->assign(
      array(
        'css_code' => $css_code,
      )
    );

    return $codemirror_css_template->fetch();
  }

  public function postProcess()
  {
    if( Tools::getValue('save_settings') !== false ){

      $email_admin = Tools::getValue('emails');
      $email_admin = explode(",", $email_admin);
      $error = false;
      foreach ($email_admin as $email){
        if(!Validate::isEmail(trim($email))){
          $error = $this->l('Invalid values "Email"');
          break;
        }
      }

      if(!Validate::isInt(Tools::getValue('featured_footer_count')) || $error){

        if($error){
          $this->errors[] = $error;
        }
        else{
        $this->errors[] = $this->l('Invalid values "Number featured questions"');

        }
      } else if (!Validate::isInt(Tools::getValue('product_category_assoc_faqs_limit'))) {
        $this->errors[] = $this->l('Invalid values "Number of associated to product category FAQs to display"');
        return false;
      } else {
        Configuration::updateValue('FAQS_EMAILS', Tools::getValue('emails'));
        Configuration::updateValue('FAQS_SHOW_BUTTON', Tools::getValue('button'));
        Configuration::updateValue('FAQS_SHOW_BUTTON_FAQ', Tools::getValue('button_faqs'));
        Configuration::updateValue('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE', Tools::getValue('button_on_product_page'));
        Configuration::updateValue('FAQS_CATEGORIES', Tools::getValue('categories'));
        Configuration::updateValue('FAQS_CATEGORIES_FAQ', Tools::getValue('categories_faq'));
        Configuration::updateValue('FAQS_FEATURED', Tools::getValue('featured'));
        Configuration::updateValue('FAQS_FEATURED_FAQ', Tools::getValue('featured_faq'));
        Configuration::updateValue('FAQS_FEATURED_FOOTER', Tools::getValue('featured_footer'));
        Configuration::updateValue('FAQS_FEATURED_FOOTER_COUNT', Tools::getValue('featured_footer_count'));
        Configuration::updateValue('FAQS_ENABLE_RECAPTCHA', Tools::getValue('enable_recaptcha'));
        Configuration::updateValue('FAQS_RECAPTCHA_KEY', Tools::getValue('recaptcha_key'));
        Configuration::updateValue('FAQS_CUSTOMER_QUESTION_ICON', Tools::getValue('icon_for_sent_by_customer'));
        Configuration::updateValue('FAQS_CUSTOMER_QUESTION_POPUP', Tools::getValue('popup_for_sent_by_customer'));
        Configuration::updateValue('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ', Tools::getValue('product_category_assoc_faqs'));
        Configuration::updateValue('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT', Tools::getValue('product_category_assoc_faqs_limit'));
        Configuration::updateValue('FAQS_CSS_CODE', Tools::getValue('css_code'));
        Configuration::updateValue('FAQS_SEO_HOME_PAGE', Tools::getValue('seo_home_page'));

        Configuration::updateValue('FAQS_SHOW_RELATED_PRODUCTS', Tools::getValue('show_related_products'));
        Configuration::updateValue('FAQS_RELATED_PRODUCTS_LIMIT', Tools::getValue('related_products_limit'));
        Configuration::updateValue('FAQS_SHOW_USEFULNESS', Tools::getValue('show_usefulness'));

        Configuration::updateValue('FAQS_SHOW_QUESTION_SAME_CATEGORY', Tools::getValue('show_faqs_same_category'));
        Configuration::updateValue('FAQS_SAME_CATEGORY_LIMIT', Tools::getValue('faqs_same_category_limit'));

        Configuration::updateValue('FAQS_SHOW_QUESTION_CART_PAGE', Tools::getValue('show_faqs_cart_page'));
        Configuration::updateValue('FAQS_CART_PAGE_LIMIT', Tools::getValue('faqs_cart_page_limit'));

        Configuration::updateValue('FAQS_SHOW_QUESTION_HOME_PAGE', Tools::getValue('show_faqs_home_page'));
        Configuration::updateValue('FAQS_HOME_PAGE_LIMIT', Tools::getValue('faqs_home_page_limit'));
        Configuration::updateValue('FAQS_HOME_PAGE_HOOK', Tools::getValue('faqs_home_page_hook'));


        $cart_faqs = Tools::getValue('cart_faqs') ? json_encode(Tools::getValue('cart_faqs')) : '';
        $cart_faq_categories = Tools::getValue('cart_faq_categories') ? json_encode(Tools::getValue('cart_faq_categories')) : '';

        Configuration::updateValue('FAQS_CART_SELECTED_QUESTIONS', $cart_faqs);
        Configuration::updateValue('FAQS_CART_SELECTED_CATEGORIES', $cart_faq_categories);

        $default_num_of_faq_in_cat_block = 3;
        $num_of_faq_in_cat_block = Tools::getValue('num_of_faq_in_cat_block');

        if (!is_numeric($num_of_faq_in_cat_block) || empty($num_of_faq_in_cat_block)) {
            $num_of_faq_in_cat_block = $default_num_of_faq_in_cat_block;
        }

        Configuration::updateValue('FAQS_NUM_OF_FAQ_IN_CAT_BLOCK', (int)$num_of_faq_in_cat_block);
        Configuration::updateValue('FAQS_SEND_EMAIL_TO_CUSTOMER_ON_ANSWER', Tools::getValue('send_email_for_customer_on_answer'));
        Configuration::updateValue('FAQS_SHOW_CONSENT_CHECKBOX', Tools::getValue('show_consent_checkbox'));
        Configuration::updateValue('FAQS_CONSENT_CHECKBOX_MESSAGE', Tools::getValue('consent_checkbox_message'), true);

        $languages = Language::getLanguages(false);
        $consent_checkbox_message = array();
        foreach ($languages as $lang) {
          $consent_checkbox_message['FAQS_CONSENT_CHECKBOX_MESSAGE'][$lang['id_lang']] = Tools::getValue('consent_checkbox_message_' . $lang['id_lang']);
        }

        Configuration::updateValue('FAQS_CONSENT_CHECKBOX_MESSAGE', $consent_checkbox_message['FAQS_CONSENT_CHECKBOX_MESSAGE'], true);
        unset($consent_checkbox_message);
      }
    }
    
    $res = parent::postProcess();

    $codemirror_css = $this->getCodemirrorCssForm();
    file_put_contents(_PS_MODULE_DIR_ . 'faqs/views/css/codemirror_custom.css', $codemirror_css);

    return $res;
  }
}