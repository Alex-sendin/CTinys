<?php
if (!defined('_PS_VERSION_')) {
  exit;
}
require_once(dirname(__FILE__) . '/classes/faqsPost.php');
require_once(dirname(__FILE__) . '/classes/faqsCategory.php');
require_once(dirname(__FILE__) . '/classes/FaqsDb.php');

class faqs extends Module
{
  private $_currentIndex;
  private $pathToFrontTemplatesFromModuleCore;
  public $absolutePathToFrontTemplates;
  private static $rewriteSettings;
  private static $SEOHomePageId;

  public function __construct()
  {
    $this->_currentIndex = 'index.php?controller=AdminModules';
    $this->name = 'faqs';
    $this->tab = 'front_office_features';
    $this->version = '3.3.1';
    $this->author = 'MyPrestaModules';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    $this->bootstrap = true;
    $this->module_key = "0eaaa558691f09287322895c8abd26f4";
    $this->author_address = '0x289929BB6B765f9668Dc1BC709E5949fEB83455e';
    $this->controllers = [
        'display'
    ];

    parent::__construct();

    $this->displayName = $this->l('Frequently Asked Questions(FAQs) Page');
    $this->description = $this->l('Create a FAQs page for your PrestaShop website and answer all the popular questions your users ask. Make necessary information accessible.');
    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    self::$rewriteSettings = (int)Configuration::get('PS_REWRITING_SETTINGS');
    self::$SEOHomePageId = Configuration::get('FAQS_SEO_HOME_PAGE') != false ? Configuration::get('FAQS_SEO_HOME_PAGE') : 'faqs';

    if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
      $this->pathToFrontTemplatesFromModuleCore = 'views/templates/front/1.7/';
      $this->absolutePathToFrontTemplates = _PS_MODULE_DIR_ . 'faqs/views/templates/front/1.7/';
    } else {
      $this->pathToFrontTemplatesFromModuleCore = 'views/templates/front/1.6/';
      $this->absolutePathToFrontTemplates = _PS_MODULE_DIR_ . 'faqs/views/templates/front/1.6/';
    }

    if (defined('_PS_ADMIN_DIR_')) {
      Configuration::updateValue('FAQS_PS_ADMIN_DIR', $this->getAdminDir(_PS_ADMIN_DIR_));
    }
  }

  private function getAdminDir($full_path_to_admin_dir)
  {
    $exploded_path = explode('/', $full_path_to_admin_dir);
    $admin_dir = end($exploded_path);
    return $admin_dir;
  }

  public function install()
  {
    $hooksForRegistration = $this->getHooksForRegistration(_PS_VERSION_);

    if (!parent::install() || !$this->registerHooks($hooksForRegistration)) {
      return false;
    }

    $this->installTabs(_PS_VERSION_);
    FaqsDb::createTables();

    $meta = new Meta();
    $pages = $meta->getPages();

    if (!isset($pages['faqs - display']) || !$pages['faqs - display']) {
      $meta->page = 'module-faqs-display';
      $meta->configurable = 1;
      $meta->save();
    }

    Configuration::updateValue('FAQS_SHOW_BUTTON', 1);
    Configuration::updateValue('FAQS_SHOW_BUTTON_FAQ', 0);
    Configuration::updateValue('FAQS_EMAILS', 'demo@demo.com');
    Configuration::updateValue('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE', 1);
    Configuration::updateValue('FAQS_ENABLE_RECAPTCHA', 0);
    Configuration::updateValue('FAQS_RECAPTCHA_KEY', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
    Configuration::updateValue('FAQS_CUSTOMER_QUESTION_ICON', 0);
    Configuration::updateValue('FAQS_CUSTOMER_QUESTION_POPUP', 0);
    Configuration::updateValue('FAQS_NOT_ANSWERED_CUSTOMER_QUESTIONS_IDS', json_encode(array()));
    Configuration::updateValue('FAQS_SEND_EMAIL_TO_CUSTOMER_ON_ANSWER', 0);
    Configuration::updateValue('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ', 1);
    Configuration::updateValue('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT', 5);
    Configuration::updateValue('FAQS_FEATURED_FOOTER_COUNT', 5);
    Configuration::updateValue('FAQS_SEO_HOME_PAGE', '');
    Configuration::updateValue('FAQS_NUM_OF_FAQ_IN_CAT_BLOCK', 3);
    Configuration::updateValue('FAQS_CSS_CODE', '');
    Configuration::updateValue('FAQS_PS_ADMIN_DIR', $this->getAdminDir(_PS_ADMIN_DIR_));
    Configuration::updateValue('FAQS_SHOW_CONSENT_CHECKBOX', 1);
    Configuration::updateValue('FAQS_SHOW_USEFULNESS', 1);
    Configuration::updateValue('FAQS_SHOW_RELATED_PRODUCTS', 1);
    Configuration::updateValue('FAQS_RELATED_PRODUCTS_LIMIT', 4);
    Configuration::updateValue('FAQS_SHOW_QUESTION_SAME_CATEGORY', 1);
    Configuration::updateValue('FAQS_SAME_CATEGORY_LIMIT', 4);
    Configuration::updateValue('FAQS_SHOW_QUESTION_CART_PAGE', 0);
    Configuration::updateValue('FAQS_CART_PAGE_LIMIT', 5);

    Configuration::updateValue('FAQS_CART_SELECTED_QUESTIONS', '');
    Configuration::updateValue('FAQS_CART_SELECTED_CATEGORIES', '');

    Configuration::updateValue('FAQS_SHOW_QUESTION_HOME_PAGE', 0);
    Configuration::updateValue('FAQS_HOME_PAGE_LIMIT', 5);
    Configuration::updateValue('FAQS_HOME_PAGE_HOOK', 'displayContentWrapperBottom');

    $languages = Language::getLanguages(false);
    $consent_checkbox_message = array();
    foreach ($languages as $lang) {
      $consent_checkbox_message['FAQS_CONSENT_CHECKBOX_MESSAGE'][$lang['id_lang']] = 'I agree to the terms and conditions and the privacy policy';
    }
    Configuration::updateValue('FAQS_CONSENT_CHECKBOX_MESSAGE', $consent_checkbox_message['FAQS_CONSENT_CHECKBOX_MESSAGE'], true);
    unset($consent_checkbox_message);

    return true;
  }

  public function uninstall()
  {
    $this->removeTab('AdminFaqs');
    $this->removeTab('AdminFaqsCategory');
    $this->removeTab('AdminFaqsPost');
    $this->removeTab('AdminFaqsSettings');

    Configuration::deleteByName('FAQS_EMAILS');
    Configuration::deleteByName('FAQS_SHOW_BUTTON');
    Configuration::deleteByName('FAQS_SHOW_BUTTON_FAQ');
    Configuration::deleteByName('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE');
    Configuration::deleteByName('FAQS_CATEGORIES');
    Configuration::deleteByName('FAQS_CATEGORIES_FAQ');
    Configuration::deleteByName('FAQS_FEATURED');
    Configuration::deleteByName('FAQS_FEATURED_FAQ');
    Configuration::deleteByName('FAQS_FEATURED_FOOTER');
    Configuration::deleteByName('FAQS_FEATURED_FOOTER_COUNT');
    Configuration::deleteByName('FAQS_ENABLE_RECAPTCHA');
    Configuration::deleteByName('FAQS_RECAPTCHA_KEY');
    Configuration::deleteByName('FAQS_CUSTOMER_QUESTION_ICON');
    Configuration::deleteByName('FAQS_CUSTOMER_QUESTION_POPUP');
    Configuration::deleteByName('FAQS_NOT_ANSWERED_CUSTOMER_QUESTIONS_IDS');
    Configuration::deleteByName('FAQS_SEND_EMAIL_TO_CUSTOMER_ON_ANSWER');
    Configuration::deleteByName('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ');
    Configuration::deleteByName('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT');
    Configuration::deleteByName('FAQS_CSS_CODE');
    Configuration::deleteByName('FAQS_SEO_HOME_PAGE');
    Configuration::deleteByName('FAQS_NUM_OF_FAQ_IN_CAT_BLOCK');
    Configuration::deleteByName('FAQS_PS_ADMIN_DIR');
    Configuration::deleteByName('FAQS_SHOW_CONSENT_CHECKBOX');
    Configuration::deleteByName('FAQS_CONSENT_CHECKBOX_MESSAGE');
    Configuration::deleteByName('FAQS_SHOW_USEFULNESS');
    Configuration::deleteByName('FAQS_SHOW_RELATED_PRODUCTS');
    Configuration::deleteByName('FAQS_RELATED_PRODUCTS_LIMIT');
    Configuration::deleteByName('FAQS_SHOW_QUESTION_SAME_CATEGORY');
    Configuration::deleteByName('FAQS_SAME_CATEGORY_LIMIT');
    Configuration::deleteByName('FAQS_SHOW_QUESTION_CART_PAGE');
    Configuration::deleteByName('FAQS_CART_PAGE_LIMIT');
    Configuration::deleteByName('FAQS_CART_SELECTED_QUESTIONS');
    Configuration::deleteByName('FAQS_CART_SELECTED_CATEGORIES');

    Configuration::deleteByName('FAQS_SHOW_QUESTION_HOME_PAGE');
    Configuration::deleteByName('FAQS_HOME_PAGE_LIMIT');
    Configuration::deleteByName('FAQS_HOME_PAGE_HOOK');

    if (!parent::uninstall() || !FaqsDb::dropTables()) {
      return false;
    }

    return true;
  }

  /**
   * @param $ps_version
   * @return array
   */
  private function getHooksForRegistration($ps_version)
  {
    $hooks = array(
        'displayHeader',
        'displayShoppingCartFooter',
        'moduleRoutes',
        'displayLeftColumn',
        'displayRightColumn',
        'footer',
        'actionAdminControllerSetMedia',
        'gSitemapAppendUrls',
        'displayWrapperTop',
        'displayWrapperBottom',
        'displayFooterBefore',
        'displayNavFullWidth',
        'displayTop',
        'displayHome',
        'displayContentWrapperTop',
        'displayContentWrapperBottom',
    );

    if ($ps_version < 1.7) {
      $hooksSpecificForPS16 = array('productFooter', 'displayTopColumn', 'displayBackOfficeHeader');
      $hooks = array_merge($hooks, $hooksSpecificForPS16);
    } else {
      $hooksSpecificForPS17 = array('displayNavFullWidth', 'displayProductExtraContent', 'displayFaqsRightColumn', 'displayFaqsLeftColumn');
      $hooks = array_merge($hooks, $hooksSpecificForPS17);
    }

    return $hooks;
  }

  /**
   * @param $hooks
   * @return bool
   */
  private function registerHooks($hooks)
  {
    if (!is_array($hooks)) {
      return false;
    }

    foreach ($hooks as $hook) {
      if (!$this->registerHook($hook)) {
        return false;
      }
    }

    return true;
  }

  /**
   * @param $ps_version
   * @return bool
   */
  private function installTabs($ps_version)
  {
    $tabs = array(
      array('tab_class' => 'AdminFaqs', 'tab_name' => 'Faqs'),
      array('tab_class' => 'AdminFaqsCategory', 'tab_name' => 'Categories'),
      array('tab_class' => 'AdminFaqsPost', 'tab_name' => 'Questions/Answers'),
      array('tab_class' => 'AdminFaqsSettings', 'tab_name' => 'Settings'),
    );

    if ($ps_version >= 1.7) {

      foreach ($tabs as $key => $tab) {
        if (!$this->existsTab($tab['tab_class'])) {
          if ($key === 0) {
            $tabIsAdded = $this->addTab($tab['tab_name'], $tab['tab_class'], $this->getIdTabFromClassName('CONFIGURE'), 'live_help');
          } else {
            $tabIsAdded = $this->addTab($tab['tab_name'], $tab['tab_class'], $this->getIdTabFromClassName('AdminFaqs'));
          }

          if (!$tabIsAdded) {
            return false;
          }
        }
      }

    } else {
      foreach ($tabs as $key => $tab) {

        if ($key === 0) {
          $tabIsAdded = $this->addTab('Faqs', 'AdminFaqs', 0);
        } else {
          $tabIsAdded = $this->addTab($tab['tab_name'], $tab['tab_class'], $this->getIdTabFromClassName('AdminFaqs'));
        }

        if (!$this->existsTab($tab['tab_class'])) {
          if (!$tabIsAdded) {
            return false;
          }
        }
      }
    }

    return true;
  }

  public function existsTab($tabClass)
  {
    $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
		SELECT id_tab AS id
		FROM `' . _DB_PREFIX_ . 'tab` t
		WHERE LOWER(t.`class_name`) = \'' . pSQL($tabClass) . '\'');
    if (count($result) == 0)
      return false;

    return true;
  }

  public function addTab($tabName, $tabClass, $id_parent, $icon = false)
  {
    $tab = new Tab();
    $langs = Language::getLanguages();
    foreach ($langs as $lang) {
      $tab->name[$lang['id_lang']] = $tabName;
    }
    $tab->class_name = $tabClass;
    $tab->module = $this->name;
    $tab->id_parent = $id_parent;
    if( $icon && _PS_VERSION_ >= 1.7 ){
      $tab->icon = $icon;
    }
    if (!$tab->save())
      return false;

    return true;
  }

  public function removeTab($tabClass)
  {
    $idTab = Tab::getIdFromClassName($tabClass);
    if ($idTab != 0) {
      $tab = new Tab($idTab);
      $tab->delete();
      return true;
    }
    return false;
  }

  public function getIdTabFromClassName($tabName)
  {
    $sql = 'SELECT id_tab FROM ' . _DB_PREFIX_ . 'tab WHERE class_name="' . pSQL($tabName) . '"';
    $tab = Db::getInstance()->getRow($sql);
    return (int)$tab['id_tab'];
  }

  /**
   * @return bool|string
   */
  private function getAssociatedFaqsTemplateForProductPage()
  {
    $id_product = Tools::getValue('id_product');
    $obj = new Product($id_product);
    $id_category = implode(",", $obj->getCategories());
    $faqs = array();
    $ids_cat = array();
    $ids_prod = array();

    $id_by_prod = faqsPost::getIdFaqsAssociatedToProduct($id_product);
    $id_by_cat = faqsPost::getIdFaqsAssociatedToProductCategories($id_category);

    foreach ($id_by_prod as $val) {
      $ids_prod[] = $val['id_faq'];
    }

    foreach ($id_by_cat as $val) {
      $ids_cat[] = $val['id_faq'];
    }

    $result = array_unique(array_merge($ids_cat, $ids_prod));

    if ($result) {
      $faqs = faqsPost::getFaqsByIds(implode(",", $result), Context::getContext()->shop->id, Context::getContext()->language->id);
    }

    $buttonOnProductPage = Configuration::get('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE');

    $this->context->smarty->assign(array(
      'path_tpl'          => _PS_MODULE_DIR_ . 'faqs/views/templates/front/',
      'usefulness'        => Configuration::get('FAQS_SHOW_USEFULNESS'),
      'faqs' => $faqs,
      'faqUrl' => self::getBaseUrl(),
      'basePath' => _PS_BASE_URL_SSL_ . __PS_BASE_URI__,
      'id_shop' => Context::getContext()->shop->id,
      'id_lang' => Context::getContext()->language->id,
      'button_on_product_page' => $buttonOnProductPage,
      'rewrite_settings' => self::$rewriteSettings,
      'id_product' => $id_product,
      'customer_questions_config' => array('icon' => Configuration::get('FAQS_CUSTOMER_QUESTION_ICON'), 'popup' => Configuration::get('FAQS_CUSTOMER_QUESTION_POPUP')),
    ));

    if ($buttonOnProductPage == false && $faqs == false) {
      return false;
    }

    return $this->display(__FILE__, $this->pathToFrontTemplatesFromModuleCore . 'tab.tpl');
  }

  public function hookModuleRoutes($params)
  {
    return array(
      'display-faq-cat' => array(
        'controller' => 'display',
        'rule' => self::$SEOHomePageId . '{/:category}.html',
        'keywords' => array(
          'category' => array(
            'regexp' => '[_a-zA-Z0-9-\pL]*',
            'param' => 'category',
          ),
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
      'display-faq-question' => array(
        'controller' => 'display',
        'rule' => self::$SEOHomePageId . '{/:category}{/:question}.html',
        'keywords' => array(
          'category' => array(
            'regexp' => '[_a-zA-Z0-9-\pL]*',
            'param' => 'category',
          ),
          'question' => array(
            'regexp' => '[_a-zA-Z0-9-\pL]*',
            'param' => 'question',
          ),
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
      'display-faq-search' => array(
        'controller' => 'display',
        'rule' => self::$SEOHomePageId . '/search{/:search}',
        'keywords' => array(
          'search' => array(
            'regexp' => '.*',
            'param' => 'search',
          ),
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
      'display-faq-home' => array(
        'controller' => 'display',
        'rule' => self::$SEOHomePageId . '/',
        'keywords' => array(
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
      'display-faq-home2' => array(
        'controller' => 'display',
        'rule' => self::$SEOHomePageId,
        'keywords' => array(
          'meta_keywords' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
          'meta_title' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
        ),
        'params' => array(
          'fc' => 'module',
          'module' => 'faqs'
        )
      ),
    );
  }

  public function upgradeFaqs3_0_5()
  {
    Configuration::updateValue('FAQS_SHOW_CONSENT_CHECKBOX', 1);

    $languages = Language::getLanguages(false);
    $consent_checkbox_message = array();
    foreach ($languages as $lang) {
      $consent_checkbox_message['FAQS_CONSENT_CHECKBOX_MESSAGE'][$lang['id_lang']] = 'I agree to the terms and conditions and the privacy policy';
    }
    Configuration::updateValue('FAQS_CONSENT_CHECKBOX_MESSAGE', $consent_checkbox_message['FAQS_CONSENT_CHECKBOX_MESSAGE'], true);
    unset($consent_checkbox_message);

    return true;
  }

  public function upgradeFaqs3_0_8()
  {
   $id_tab = $this->getIdTabFromClassName('AdminFaqs');
   $tab = new Tab($id_tab);

    if(_PS_VERSION_ >= 1.7 ){

     $tab->icon = 'live_help';
    
    }
    else{
      $this->registerHook('displayBackOfficeHeader');
    }

    $save = $tab->save();
	
	
	
    return true;
  }

  public function upgradeFaqs3_0_4()
  {
      Configuration::updateValue('FAQS_NOT_ANSWERED_CUSTOMER_QUESTIONS_IDS', json_encode(array()));
      Configuration::updateValue('FAQS_SEND_EMAIL_TO_CUSTOMER_ON_ANSWER', 0);
      Configuration::updateValue('FAQS_PS_ADMIN_DIR', $this->getAdminDir(_PS_ADMIN_DIR_));

      return true;
  }

  public function upgradeFaqs3_0_3()
  {
    Configuration::updateValue('FAQS_CUSTOMER_QUESTION_ICON', 0);
    Configuration::updateValue('FAQS_CUSTOMER_QUESTION_POPUP', 0);

    return true;
  }

  /**
   * @return bool
   */
  public function upgradeFaqs3_0_2()
  {
    if (!FaqsDb::migrateStatusColumnsValuesToShopTable()) {
      return false;
    }

    return true;
  }

  /**
   * @return bool
   */
  public function upgradeFaqs3_0_1()
  {
    $this->removeRedundantFrontTemplates();
    return true;
  }

  /**
   * @return bool
   */
  public function upgradeFaqs3_0_0()
  {
    $hooksForRegistration = $this->getHooksForRegistration(_PS_VERSION_);

    if (!$this->registerHooks($hooksForRegistration)) {
      return false;
    }

    return true;
  }

  /**
   * @return bool
   * @throws Exception
   */
  public function upgradeFaqs2_9_0()
  {
    $old_faqs = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'gomakoil_faq_lang');
    $old_categories = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang');
    $new_faq_tables = FaqsDb::getFaqShopTablesFromLangTables($old_faqs, 'faq');
    $new_faq_category_tables = FaqsDb::getFaqShopTablesFromLangTables($old_categories, 'category');

    $create_gomakoil_faq_shop_query = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_shop(
				`id_gomakoil_faq` int(11) NOT NULL,
				`id_shop` int(11) NOT NULL,
				PRIMARY KEY (`id_gomakoil_faq`, `id_shop`)
				)';

    $create_gomakoil_faq_category_shop_query = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop(
				`id_gomakoil_faq_category` int(11) NOT NULL,
				`id_shop` int(11) NOT NULL,
				PRIMARY KEY (`id_gomakoil_faq_category`, `id_shop`)
				)';

    if (!FaqsDb::createShopAndLangBackupTables()) {
      throw new Exception('Upgrade is failed. Can not create backup tables or they already created.');
    }

    if (!FaqsDb::backupLangAndShopTables($new_faq_category_tables['lang'], $new_faq_category_tables['shop'], $new_faq_tables['lang'], $new_faq_tables['shop'])) {
      throw new Exception('Upgrade is failed. Can not insert data into backup tables.');
    }

    $truncate_gomakoil_faq_lang_query = 'TRUNCATE TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_lang';
    $truncate_gomakoil_faq_category_lang_query = 'TRUNCATE TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang';
    $drop_shop_column_faq = 'ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_lang DROP COLUMN `id_shop`';
    $drop_shop_column_faq_category = 'ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang DROP COLUMN `id_shop`';

    $execute_queries = array($create_gomakoil_faq_shop_query,
      $create_gomakoil_faq_category_shop_query,
      $truncate_gomakoil_faq_lang_query,
      $truncate_gomakoil_faq_category_lang_query,
      $drop_shop_column_faq,
      $drop_shop_column_faq_category
    );

    foreach ($execute_queries as $query) {
      if (!Db::getInstance()->execute($query)) {
        return false;
      }
    }

    if (!Db::getInstance()->insert('gomakoil_faq_shop', $new_faq_tables['shop']) ||
      !Db::getInstance()->insert('gomakoil_faq_lang', $new_faq_tables['lang']) ||
      !Db::getInstance()->insert('gomakoil_faq_category_shop', $new_faq_category_tables['shop']) ||
      !Db::getInstance()->insert('gomakoil_faq_category_lang', $new_faq_category_tables['lang'])
    ) {
      return false;
    }

    return true;
  }

  public function upgradeFaqs2_8_7()
  {
    Configuration::updateValue('FAQS_CSS_CODE', '');

    return true;
  }

  public function upgradeFaqs2_8_6()
  {
    Configuration::updateValue('PS_ALLOW_ACCENTED_CHARS_URL', 1);

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq_lang'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'link_rewrite'
    ";

    if (!Db::getInstance()->executeS($sql)) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_lang
      ADD COLUMN `link_rewrite` VARCHAR(1000) AFTER `tags`;
    ';
      Db::getInstance()->execute($sql);
    }

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq_category_lang'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'link_rewrite'
    ";

    if (!Db::getInstance()->executeS($sql)) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang
      ADD COLUMN `link_rewrite` VARCHAR(1000) AFTER `name`;
    ';
      Db::getInstance()->execute($sql);
    }

    $oldCategories = FaqsDb::getOldCategories();

    foreach ($oldCategories as $value) {
      $link_rewrite_cat = array();

      if (isset($value['link_rewrite'])) {
        foreach (Language::getLanguages() as $language) {
          $link_rewrite_cat[$language['id_lang']] = $value['link_rewrite'];
        }

        $obj_faq_cat = new faqsCategory($value['id_gomakoil_faq_category']);
        $obj_faq_cat->link_rewrite = $link_rewrite_cat;

        if (!empty($obj_faq_cat->name)) {
          $obj_faq_cat->save();
        }
      }
    }


    $oldFaqs = FaqsDb::getOldFaqs();

    //Need to make answer field not required, for successful upgrade of unanswered questions
    faqsPost::setFieldParameter('answer', 'required', false);

    foreach ($oldFaqs as $value) {
      $link_rewrite = array();

      if (isset($value['link_rewrite'])) {
        foreach (Language::getLanguages() as $language) {
          $link_rewrite[$language['id_lang']] = $value['link_rewrite'];
        }

        $obj_faq = new faqsPost($value['id_gomakoil_faq']);

        $products = $obj_faq->getAssociatedProducts($value['id_gomakoil_faq']);
        $product_categories_result = $obj_faq->getAssociatedProductCategories($value['id_gomakoil_faq']);

        $obj_faq->link_rewrite = $link_rewrite;
        $obj_faq->save();

        if (!empty($products)) {
          if (is_array($products[0])) {
            $products_string = implode(',', array_map(function ($product) {
              return array_pop($product);
            }, $products));
          } else {
            $products_string = implode($products);
          }

          $obj_faq->setAssociation($value['id_gomakoil_faq'], $products_string, 'faq_association_product', 'id_product');
        }

        if (!empty($product_categories_result)) {
          $product_categories = array_map(function ($category) {
            return array_pop($category);
          }, $product_categories_result);

          $obj_faq->setAssociation($value['id_gomakoil_faq'], $product_categories, 'faq_association_category', 'id_category');
        }
      }
    }

    faqsPost::setFieldParameter('answer', 'required', true);

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'link_rewrite'
    ";

    $check = Db::getInstance()->executeS($sql);
    if ($check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      DROP COLUMN `link_rewrite`;

    ';
      Db::getInstance()->execute($sql);
    }


    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq_category'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'link_rewrite'
    ";

    $check = Db::getInstance()->executeS($sql);
    if ($check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_category
      DROP COLUMN `link_rewrite`;

    ';
      Db::getInstance()->execute($sql);
    }

    return true;
  }

    public function upgradeFaqs3_3_0()
    {
        Configuration::updateValue('FAQS_SHOW_QUESTION_HOME_PAGE', 0);
        Configuration::updateValue('FAQS_HOME_PAGE_LIMIT', 5);
        Configuration::updateValue('FAQS_HOME_PAGE_HOOK', 'displayContentWrapperBottom');

        $this->registerHook('displayWrapperTop');
        $this->registerHook('displayWrapperBottom');
        $this->registerHook('displayFooterBefore');
        $this->registerHook('displayNavFullWidth');
        $this->registerHook('displayTop');
        $this->registerHook('displayHome');
        $this->registerHook('displayContentWrapperTop');
        $this->registerHook('displayContentWrapperBottom');

        return true;
    }
    public function upgradeFaqs3_2_0()
    {
        $this->registerHook('displayShoppingCartFooter');
        Configuration::updateValue('FAQS_SHOW_USEFULNESS', 0);
        Configuration::updateValue('FAQS_SHOW_RELATED_PRODUCTS', 0);
        Configuration::updateValue('FAQS_RELATED_PRODUCTS_LIMIT', 4);

        Configuration::updateValue('FAQS_SHOW_QUESTION_SAME_CATEGORY', 0);
        Configuration::updateValue('FAQS_SAME_CATEGORY_LIMIT', 4);

        Configuration::updateValue('FAQS_SHOW_QUESTION_CART_PAGE', 0);
        Configuration::updateValue('FAQS_CART_PAGE_LIMIT', 5);

        Configuration::updateValue('FAQS_CART_SELECTED_QUESTIONS', '');
        Configuration::updateValue('FAQS_CART_SELECTED_CATEGORIES', '');

        $sql = "
               SELECT NULL
               FROM INFORMATION_SCHEMA.COLUMNS
               WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
               AND table_schema = '" . _DB_NAME_ . "'
               AND column_name = 'like'
            ";
        $check = Db::getInstance()->executeS($sql);
        if (!$check) {
            $sql = '
                  ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
                  ADD COLUMN `like` INT(11) AFTER `hide_faq`;
                ';
            Db::getInstance()->execute($sql);
        }

        $sql = "
               SELECT NULL
               FROM INFORMATION_SCHEMA.COLUMNS
               WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
               AND table_schema = '" . _DB_NAME_ . "'
               AND column_name = 'dislike'
            ";
        $check = Db::getInstance()->executeS($sql);
        if (!$check) {
            $sql = '
                  ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
                  ADD COLUMN `dislike` INT(11) AFTER `like`;
                ';
            Db::getInstance()->execute($sql);
        }

        return true;
    }

  public function upgradeFaqs3_1_8()
  {
    $this->installControllers();
    $this->registerHook('gSitemapAppendUrls');
    return true;
  }

  public function upgradeFaqs3_1_0()
  {
    Configuration::updateValue('FAQS_NUM_OF_FAQ_IN_CAT_BLOCK', 3);

    $this->registerHook('actionAdminControllerSetMedia');

    return true;
  }

  public function upgradeFaqs3_0_9()
  {
    Configuration::updateValue('FAQS_ENABLE_RECAPTCHA', 0);
    Configuration::updateValue('FAQS_RECAPTCHA_KEY', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

    return true;
  }

  public function upgradeFaqs2_8_3()
  {
    Configuration::updateValue('FAQS_SHOW_BUTTON_ON_PRODUCT_PAGE', 1);
    Configuration::updateValue('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ', 1);
    Configuration::updateValue('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT', 5);

    return true;
  }

  public function upgradeFaqs2_8_0()
  {
    Configuration::updateValue('FAQS_SHOW_BUTTON', 1);
    Configuration::updateValue('FAQS_SHOW_BUTTON_FAQ', 0);
    Configuration::updateValue('FAQS_EMAILS', 'demo@demo.com');

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'name'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `name` VARCHAR(500) AFTER `date_add`;

    ';
      Db::getInstance()->execute($sql);
    }

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'email'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `email` VARCHAR(500) AFTER `date_add`;

    ';
      Db::getInstance()->execute($sql);
    }

    $sql = "
       SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
       AND table_schema = '" . _DB_NAME_ . "'
       AND column_name = 'by_customer'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `by_customer` INT DEFAULT 0 AFTER `date_add`;

    ';
      Db::getInstance()->execute($sql);
    }

    return true;
  }

  public function upgradeFaqs2_6_0()
  {
    $this->registerHook('displayLeftColumn');
    $this->registerHook('moduleRoutes');
    Configuration::updateValue('FAQS_CATEGORIES', 1);
    Configuration::updateValue('FAQS_CATEGORIES_FAQ', 1);
    Configuration::updateValue('FAQS_FEATURED', 1);
    Configuration::updateValue('FAQS_FEATURED_FAQ', 1);

    if (!$this->existsTab('AdminFaqsSettings')) {
      if (!$this->addTab('Settings', 'AdminFaqsSettings', $this->getIdTabFromClassName('AdminFaqs')))
        return false;
    }

    $sql = "
         SELECT NULL
         FROM INFORMATION_SCHEMA.COLUMNS
         WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
         AND table_schema = '" . _DB_NAME_ . "'
         AND column_name = 'as_url'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
          ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
          ADD COLUMN `as_url` INT(1) NULL AFTER `date_add`;

    ';
      return Db::getInstance()->execute($sql);
    }
    return true;
  }

  public function upgradeFaqs2_6_2()
  {
    $sql = "
      ALTER TABLE `" . _DB_PREFIX_ . "gomakoil_faq_lang` 
      ADD FULLTEXT INDEX `search` (`question` ASC, `tags` ASC)
    ";
    Db::getInstance()->execute($sql);

    return true;
  }

  public function upgradeFaqs2_7_4()
  {
    $this->registerHook('footer');
    return true;
  }

  public function upgradeFaqs2_6_5()
  {
    $this->registerHook('productFooter');
    $sql = "
   SELECT NULL
            FROM INFORMATION_SCHEMA.COLUMNS
           WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
             AND table_schema = '" . _DB_NAME_ . "'
             AND column_name = 'association'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `association` INT(1) NULL AFTER `as_url`;

    ';
      Db::getInstance()->execute($sql);
    }

    $sql = "
   SELECT NULL
            FROM INFORMATION_SCHEMA.COLUMNS
           WHERE table_name = '" . _DB_PREFIX_ . "gomakoil_faq'
             AND table_schema = '" . _DB_NAME_ . "'
             AND column_name = 'hide_faq'
    ";

    $check = Db::getInstance()->executeS($sql);
    if (!$check) {
      $sql = '
      ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq
      ADD COLUMN `hide_faq` INT(1) NULL AFTER `association`;

    ';
      Db::getInstance()->execute($sql);
    }

    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'faq_association_product';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'faq_association_product(
				id_faq_association_product int(11) NOT NULL AUTO_INCREMENT,
				id_faq int(11) NOT NULL,
				id_product int(11) NOT NULL,
				PRIMARY KEY(id_faq_association_product)
				)';
    Db::getInstance()->execute($sql);

    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'faq_association_category';
    Db::getInstance()->execute($sql);

    $sql = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'faq_association_category(
				id_faq_association_category int(11) NOT NULL AUTO_INCREMENT,
				id_faq int(11) NOT NULL,
				id_category int(11) NOT NULL,
				PRIMARY KEY(id_faq_association_category)
				)';
    Db::getInstance()->execute($sql);

    return true;
  }

  public function upgradeFaqs2_5_0()
  {
    $this->registerHook('ActionAdminControllerSetMedia');

    if (!$this->existsTab('AdminFaqs')) {
      if (!$this->addTab('Faqs', 'AdminFaqs', 0, 'live_help'))
        return false;
    }

    if (!$this->existsTab('AdminFaqsCategory')) {
      if (!$this->addTab('Faqs Category', 'AdminFaqsCategory', $this->getIdTabFromClassName('AdminFaqs')))
        return false;
    }

    if (!$this->existsTab('AdminFaqsPost')) {
      if (!$this->addTab('Faqs Post', 'AdminFaqsPost', $this->getIdTabFromClassName('AdminFaqs')))
        return false;
    }

    return FaqsDb::copyDbDataForUpgrade2_5_0();
  }

  public function hookdisplayHeader()
  {
    if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
      $this->context->controller->registerStylesheet('faqs_myprestamodules_fonts', 'modules/faqs/views/css/myprestamodules_font.css', array('media' => 'all', 'priority' => 150));
      $this->context->controller->registerStylesheet('faqs_footer', 'modules/faqs/views/css/footer.css', array('media' => 'all', 'priority' => 150));
      $this->context->controller->registerStylesheet('faqs2', 'modules/faqs/views/css/faq.css', array('media' => 'all', 'priority' => 150));
      $this->context->controller->registerStylesheet('faqs3', 'modules/faqs/views/css/faqs_form.css', array('media' => 'all', 'priority' => 150));
      $this->context->controller->registerStylesheet('faqs5', 'modules/faqs/views/css/codemirror_custom.css', array('media' => 'all', 'priority' => 150));
      $this->context->controller->registerStylesheet('faqs6', '<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">', array('media' => 'all', 'priority' => 150, 'inline' => true));
      $this->context->controller->registerJavascript('faqs_front', 'modules/faqs/views/js/faq.js', array('media' => 'all', 'position' => 'bottom', 'priority' => 150));
      $this->context->controller->registerJavascript('faqs_form', 'modules/faqs/views/js/faqs_form.js', array('media' => 'all', 'position' => 'bottom', 'priority' => 150));

      //$this->context->controller->registerJavascript('faqs_slick_js', 'modules/faqs/libraries/slick/slick.js', array('media' => 'all', 'position' => 'bottom', 'priority' => 150));
      //$this->context->controller->registerStylesheet('faqs_slick_css', 'modules/faqs/libraries/slick/slick.css', array('media' => 'all', 'priority' => 150));
    }
    else {
      $this->context->controller->addJS($this->_path . 'views/js/faq.js');
      $this->context->controller->addJS($this->_path . 'views/js/faqs_form.js');
      $this->context->controller->addCSS($this->_path . 'views/css/myprestamodules_font.css');
      $this->context->controller->addCSS($this->_path . 'views/css/footer.css');
      $this->context->controller->addCSS($this->_path . 'views/css/faq.css');
      $this->context->controller->addCSS($this->_path . 'views/css/faqs_form.css');
      $this->context->controller->addCSS('https://fonts.googleapis.com/css?family=Open+Sans');
      $this->context->controller->addCSS($this->_path . 'views/css/codemirror_custom.css');

      $this->context->controller->addJS(_PS_MODULE_DIR_ . '/faqs/libraries/slick/slick.js');
      $this->context->controller->addCSS(_PS_MODULE_DIR_ . '/faqs/libraries/slick/slick.css');
    }
  }

    public function hookActionAdminControllerSetMedia()
    {
        $controller = Dispatcher::getInstance()->getController();
        $module_controllers = ['AdminFaqsSettings', 'AdminFaqsCategory', 'AdminFaqsPost'];

        if (in_array($controller, $module_controllers)) {
            $this->context->controller->addCSS(array(
                _PS_MODULE_DIR_ . 'faqs/views/css/faq_back.css',
            ));

            if(version_compare(_PS_VERSION_, '1.7.8.0', '>=')){
              $this->context->controller->addCSS(array(
                _PS_MODULE_DIR_ . 'faqs/views/css/faq_back_1780_more.css',
              ));
            }

            $this->context->controller->addjQueryPlugin(array(
                'select2',
            ));

            $this->context->controller->addJS(array(
                _PS_MODULE_DIR_ . 'faqs/views/js/faqs_admin.js',
                _PS_MODULE_DIR_ . 'faqs/views/js/faq.js',
            ));
        }

        if ($controller == 'AdminFaqsSettings') {
            $this->context->controller->addCSS(array(
                _PS_MODULE_DIR_ . 'faqs/libraries/codemirror/lib/codemirror.css',
            ));

            $this->context->controller->addJS(array(
                _PS_MODULE_DIR_ . 'faqs/libraries/codemirror/lib/codemirror.js',
                _PS_MODULE_DIR_ . 'faqs/libraries/codemirror/mode/css/css.js',
            ));
        } elseif ($controller == 'AdminFaqsPost') {
            $this->context->controller->addJqueryUi('ui.widget');

            $this->context->controller->addJqueryPlugin('tagify');
            $this->context->controller->addJS(array(
                _PS_JS_DIR_.'tiny_mce/tiny_mce.js',
                _PS_JS_DIR_.'admin/tinymce.inc.js',
            ));
        }
    }

  public function hookDisplayNavFullWidth()
  {
    if ($this->isFaqsModulePage()) {
      $this->smarty->assign($this->getTemplateVariables('displayNavFullWidth'));
      return $this->display(__FILE__, $this->pathToFrontTemplatesFromModuleCore . 'search_block.tpl');
    }

    return '';
  }

  /**
   * For 1.6
   * @return string
   */
  public function hookDisplayTopColumn()
  {
    return $this->hookDisplayNavFullWidth();
  }

  /**
   * Custom hook for left/right columns
   * @return string
   */
  public function hookDisplayFaqsLeftColumn()
  {
    $this->smarty->assign($this->getTemplateVariables('displayFaqsLeftColumn'));

    return $this->display(__FILE__, $this->pathToFrontTemplatesFromModuleCore . 'left-column.tpl');
  }

  /**
   * @return string
   */
  public function hookDisplayFaqsRightColumn()
  {
      return $this->hookDisplayFaqsLeftColumn();
  }

  /**
   * @return string
   */
  public function hookDisplayLeftColumn()
  {
      return $this->hookDisplayFaqsLeftColumn();
  }

  /**
   * @return string
   */
  public function hookDisplayRightColumn()
  {
    return $this->hookDisplayFaqsLeftColumn();
  }

  /**
   * @return array
   */
  public function hookDisplayProductExtraContent()
  {
    $array = array();
    $tpl = $this->getAssociatedFaqsTemplateForProductPage();

    if ($tpl !== false) {
      $array[] = (new PrestaShop\PrestaShop\Core\Product\ProductExtraContent())
        ->setTitle($this->l('Questions(FAQs)'))
        ->setContent($tpl);
    }

    return $array;
  }

  /**
   * @param $params
   * @return bool|string
   */
  public function hookProductFooter($params)
  {
    return $this->getAssociatedFaqsTemplateForProductPage();
  }

  /**
   * @param null $hookName
   * @param array $configuration
   * @return array
   */
  public function getTemplateVariables($hookName = null, array $configuration = array())
  {
    if ($hookName == null && isset($configuration['hook'])) {
      $hookName = $configuration['hook'];
    }

    $faqCategories = array();
    $mostFaq = array();
    $button = false;

    if (Tools::getValue('id_category') && Configuration::get('FAQS_SHOW_PRODUCT_CAT_ASSOC_FAQ') == 1) {
      $product_category_id = Tools::getValue('id_category');

      $product_category_assoc_faqs_limit = Configuration::get('FAQS_PRODUCT_CAT_ASSOC_FAQ_LIMIT');
      $product_category_assoc_faqs_ids = faqsPost::getIdFaqsAssociatedToProductCategories($product_category_id);

      //Slice result array to set limit
      $product_category_assoc_faqs_ids = array_slice($product_category_assoc_faqs_ids, 0, $product_category_assoc_faqs_limit);

      //Reduce array to string of ids
      $product_category_assoc_faqs = implode(',', array_map(function ($item) {
        return array_pop($item);
      }, $product_category_assoc_faqs_ids));


      if (Tools::strlen($product_category_assoc_faqs) < 1 || empty($product_category_assoc_faqs)) {
        $product_category_assoc_faqs = false;
      } else {
        $product_category_assoc_faqs = faqsPost::getFaqsByIds($product_category_assoc_faqs, Context::getContext()->shop->id, Context::getContext()->language->id);
      }
    } else {
      $product_category_assoc_faqs = false;
    }

    if (Configuration::get('FAQS_SHOW_BUTTON')) {
      if (!Configuration::get('FAQS_SHOW_BUTTON_FAQ') || Context::getContext()->controller->php_self == 'module-faqs-display') {
        $button = true;
        if (Context::getContext()->controller->php_self == 'product') {
          $button = false;
        }
      }
    }

    if (Configuration::get('FAQS_CATEGORIES')) {
      if (!Configuration::get('FAQS_CATEGORIES_FAQ') || Context::getContext()->controller->php_self == 'module-faqs-display') {
        $faqCategories = faqsCategory::getCategoriesFaq(Context::getContext()->shop->id, Context::getContext()->language->id);

        foreach ($faqCategories as $key => $category) {
          $num_of_questions_in_category = faqsCategory::getNumberOfQuestionsInCategory($category['id_gomakoil_faq_category']);

          if ($num_of_questions_in_category <= 0) {
            unset($faqCategories[$key]);
          } else {
            $faqCategories[$key]['number_of_questions'] = $num_of_questions_in_category;
          }
        }
      }
    }

    if (Configuration::get('FAQS_FEATURED')) {
      if (!Configuration::get('FAQS_FEATURED_FAQ') || Context::getContext()->controller->php_self == 'module-faqs-display') {
        $mostFaq = faqsPost::getFeaturedFaqs(Context::getContext()->shop->id, Context::getContext()->language->id);
      }
    }

    $infos = array(
      'faqCategories' => $faqCategories,
      'mostFaq' => $mostFaq,
      'faqUrl' => self::getBaseUrl(),
      'hookName' => $hookName,
      'button' => $button,
    );

    return array(
      'infos' => $infos,
      'basePath' => _PS_BASE_URL_SSL_ . __PS_BASE_URI__,
      'id_shop' => Context::getContext()->shop->id,
      'id_lang' => Context::getContext()->language->id,
      'product_category_assoc_faqs' => $product_category_assoc_faqs,
      'rewrite_settings' => self::$rewriteSettings,
      'img_dir' => _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . 'modules/faqs/views/img/',
      'customer_questions_config' => array('icon' => Configuration::get('FAQS_CUSTOMER_QUESTION_ICON'), 'popup' => Configuration::get('FAQS_CUSTOMER_QUESTION_POPUP')),
    );
  }

  /**
   * @param $params
   * @return bool|string
   */
  public function hookFooter($params)
  {
    $active = Configuration::get('FAQS_FEATURED_FOOTER');
    $count = Configuration::get('FAQS_FEATURED_FOOTER_COUNT');

    if (!$active) {
      return false;
    }

    $link = new Link();
    $baseUrl = $link->getPageLink('display-faq-home', true);
    $faqs = faqsPost::getFeaturedFaqs(Context::getContext()->shop->id, Context::getContext()->language->id, $count);

    $this->context->smarty->assign(array(
      'faqs' => $faqs,
      'blogUrl' => $baseUrl,
      'rewrite_settings' => self::$rewriteSettings,
    ));

    return $this->display(__FILE__, $this->pathToFrontTemplatesFromModuleCore . 'footer.tpl');
  }

  /**
   * Check if we on one of main module pages
   * @return bool
   */
  private function isFaqsModulePage()
  {
    $faqs_url = trim(self::getBaseUrl(), ' /');
    $current_url = trim(Tools::getShopDomainSsl(true, true) . $_SERVER['REQUEST_URI'], ' /');
      
    if (strpos($current_url, $faqs_url) === false) {
      return false;
    }

    return true;
  }

  /**
   * Full support for multishop was added only from version 2.9.0
   * @return bool
   */
  public static function isModuleVersionCompliantWithMultishopFeature()
  {
    $is_compliant = (FaqsDb::isTableExists('gomakoil_faq_shop') && FaqsDb::isTableExists('gomakoil_faq_category_shop'));

    return $is_compliant;
  }

  /**
   * @return int
   */
  public static function getRewriteSettings()
  {
    return self::$rewriteSettings;
  }


  /**
   * @return string
   */
  public static function getBaseUrl()
  {
    if (!self::$rewriteSettings) {
      if (Language::isMultiLanguageActivated()) {
        $baseUrl = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . 'index.php?fc=module&module=faqs&controller=display&id_lang=' . Context::getContext()->language->id;
      } else {
        $baseUrl = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . 'index.php?fc=module&module=faqs&controller=display';
      }
    } else {
      if (Language::isMultiLanguageActivated()) {
        $baseUrl = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . Context::getContext()->language->iso_code . '/'.self::$SEOHomePageId.'/';
      } else {
        $baseUrl = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . self::$SEOHomePageId.'/';
      }
    }

    return $baseUrl;
  }

  /**
   * Remove redundant tpl files that was left after merging of module versions for PS 1.6 and 1.7
   * @return array
   */
  private function removeRedundantFrontTemplates()
  {
    return array_map('unlink', glob(_PS_MODULE_DIR_ . 'faqs/views/templates/front/*.tpl'));
  }

  public function getFaqsPostControllerData()
  {
    $super_admins = $this->getSuperAdmins();
    $first_super_admin = array_pop($super_admins);
    $ssl = $this->isSslEnabled();

    $data = array(
      'base_url' => $this->getLinkToFaqsPostController($ssl),
      'token' => $this->getFaqsPostControllerToken($first_super_admin['id_employee'])
    );

    return $data;
  }

  private function isSslEnabled()
  {
    return (Configuration::get('PS_SSL_ENABLED') || (!empty($_SERVER['HTTPS']) && Tools::strtolower($_SERVER['HTTPS']) != 'off'));
  }

  private function getLinkToFaqsPostController($ssl)
  {
    return Context::getContext()->link->getBaseLink(null, $ssl) . Configuration::get('FAQS_PS_ADMIN_DIR') . '/index.php?controller=AdminFaqsPost';
  }

  private function getFaqsPostControllerToken($super_admin_id)
  {
    return Tools::getAdminToken('AdminFaqsPost'.(int)Tab::getIdFromClassName('AdminFaqsPost').$super_admin_id);
  }

  private function getSuperAdmins()
  {
    $all_employees = Employee::getEmployees();

    $super_admins = array_filter($all_employees, function($employee) {
      $employee_obj = new Employee($employee['id_employee']);

      if (!$employee_obj->isSuperAdmin()) {
        return false;
      }


      return true;
    });


    return $super_admins;
  }


  public function hookDisplayBackOfficeHeader()
  {
    $this->context->controller->addCSS($this->_path . 'views/css/admin_faqs.css');
  }

    public function hookGSitemapAppendUrls($params)
    {
        $faqCategoriesLinks = [];
        $faqLinks = [];
        $baseUrl = self::getBaseUrl();
        $data = $params['lang'];
        $idLang = (int) $data['id_lang'];
        $idShop = (int) $data['id_shop'];
        $categories = faqsCategory::getCategoriesFaq($idShop, $idLang);
        $faqs = faqsPost::getAllFaqs($idShop, $idLang);

        if ($categories) {
            foreach ($categories as $category) {
                $faqCategoriesLinks[] = [
                    'type' => 'module',
                    'page' => $category['name'],
                    'link' => $baseUrl . $category['link_rewrite'] . '.html',
                    'image' => false,
                    'lastmod' => $category['date_add'],
                ];
            }
        }

        if ($faqs) {
            foreach ($faqs as $faq) {
                $faqLinks[] = [
                    'type' => 'module',
                    'page' => $faq['name'],
                    'link' => $baseUrl . $faq['link_rewrite_cat'] . '/' . $faq['link_rewrite']. '.html',
                    'image' => false,
                    'lastmod' => $category['date_add'],
                ];
            }
        }

        return array_merge($faqCategoriesLinks, $faqLinks);
    }

    public function hookDisplayShoppingCartFooter($params)
    {
        $faq_categories = Configuration::get('FAQS_CART_SELECTED_CATEGORIES') ? json_decode(Configuration::get('FAQS_CART_SELECTED_CATEGORIES'), true) : [];
        $faqs = Configuration::get('FAQS_CART_SELECTED_QUESTIONS') ? json_decode(Configuration::get('FAQS_CART_SELECTED_QUESTIONS'), true) : [];
        $faqs_from_categories = [];

        if ($faq_categories) {
            $faqs_from_categories = faqsPost::getFaqsIdFromCategories($faq_categories);
        }

        if ($faqs_from_categories) {
            $faqs_from_categories = array_map(function ($item){return $item['id_gomakoil_faq'];}, $faqs_from_categories);
        }
        $ids = $faqs_from_categories;
        if ($faqs) {
            $ids = array_merge($ids, $faqs);
        }

        if (!$ids) {
            return false;
        }
        $ids = array_unique($ids);

        $limit = Configuration::get('FAQS_CART_PAGE_LIMIT');
        $faqs = faqsPost::getFaqsByIds(implode(",", $ids), Context::getContext()->shop->id, Context::getContext()->language->id, false, $limit);

        $baseUrl = faqs::getBaseUrl();
        $this->smarty->assign([
            'basePath'  => _PS_BASE_URL_SSL_ . __PS_BASE_URI__,
            'faqs'      => $faqs,
            'usefulness'        => Configuration::get('FAQS_SHOW_USEFULNESS'),
            'rewrite_settings'  => faqs::getRewriteSettings(),
            'faqUrl'            => $baseUrl,
            'path_tpl'  => _PS_MODULE_DIR_ . 'faqs/views/templates/front/',
            'customer_questions_config' => array('icon' => Configuration::get('FAQS_CUSTOMER_QUESTION_ICON'), 'popup' => Configuration::get('FAQS_CUSTOMER_QUESTION_POPUP')),
        ]);

        return $this->display(__FILE__, $this->pathToFrontTemplatesFromModuleCore . 'cart-faqs.tpl');
    }


    public function hookDisplayWrapperTop()
    {
        return $this->getHomeFaqs('displayWrapperTop');
    }

    public function hookDisplayWrapperBottom()
    {
        return $this->getHomeFaqs('displayWrapperBottom');
    }

    public function hookDisplayFooterBefore()
    {
        return $this->getHomeFaqs('displayFooterBefore');
    }

    public function hookDisplayTop()
    {
        return $this->getHomeFaqs('displayTop');
    }

    public function hookDisplayContentWrapperTop()
    {
        return $this->getHomeFaqs('displayContentWrapperTop');
    }

    public function hookDisplayContentWrapperBottom()
    {
        return $this->getHomeFaqs('displayContentWrapperBottom');
    }

    public function hookDisplayHome()
    {
        return $this->getHomeFaqs('displayHome');
    }

    private function getCurrentPageType()
    {
        if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            $current_page_id = Context::getContext()->controller->getPageName();
        } else {
            $current_page_id = Context::getContext()->controller->php_self;
        }

        switch ($current_page_id) {
            case 'index':
                return 'home';
            case 'category':
                return 'category';
            case 'product':
                return 'product';
        }
    }
    public function getHomeFaqs($hook)
    {
        $page_type = $this->getCurrentPageType();
        $show = Configuration::get('FAQS_SHOW_QUESTION_HOME_PAGE');
        $selected_hook = Configuration::get('FAQS_HOME_PAGE_HOOK');


        if (!$show || !$selected_hook || $selected_hook != $hook || $page_type != 'home') {
            return false;
        }

        $limit = Configuration::get('FAQS_HOME_PAGE_LIMIT');

        $link = new Link();
        $baseUrl = $link->getPageLink('display-faq-home', true);
        $faqs = faqsPost::getFeaturedFaqs(Context::getContext()->shop->id, Context::getContext()->language->id, $limit);

        $this->smarty->assign([
            'basePath'  => _PS_BASE_URL_SSL_ . __PS_BASE_URI__,
            'faqs'      => $faqs,
            'usefulness'        => Configuration::get('FAQS_SHOW_USEFULNESS'),
            'rewrite_settings'  => faqs::getRewriteSettings(),
            'faqUrl'            => $baseUrl,
            'path_tpl'  => _PS_MODULE_DIR_ . 'faqs/views/templates/front/',
            'customer_questions_config' => array('icon' => Configuration::get('FAQS_CUSTOMER_QUESTION_ICON'), 'popup' => Configuration::get('FAQS_CUSTOMER_QUESTION_POPUP')),
        ]);

        return $this->display(__FILE__, $this->pathToFrontTemplatesFromModuleCore . 'home-faqs.tpl');

        return 111111111111111111;
    }



}

