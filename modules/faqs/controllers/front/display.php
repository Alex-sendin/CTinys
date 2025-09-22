<?php
if (!defined('_PS_VERSION_')) {
  exit;
}
require_once _PS_MODULE_DIR_ . 'faqs/faqs.php';

class FaqsDisplayModuleFrontController extends ModuleFrontControllerCore
{
  private $_objFaqs;
  private $_shopId;
  private $_langId;

  public function __construct()
  {
    require_once(_PS_MODULE_DIR_.'faqs/classes/faqsCategory.php');
    require_once(_PS_MODULE_DIR_.'faqs/classes/faqsPost.php');
    require_once(_PS_MODULE_DIR_.'faqs/faqs.php');

    $this->_objFaqs = new Faqs();
    $this->_shopId = Context::getContext()->shop->id;
    $this->_langId = Context::getContext()->language->id;

    $this->php_self = 'module-faqs-display';

    $this->display_column_right = false;
	$this->display_column_left = false;
    
    if( Tools::getValue('content_only')){
      $this->display_header = false;
      $this->display_footer = false;
    }

    parent::__construct();
  }

  public function init()
  {
    parent::init();

    if (Tools::getValue('category')) {
      $faqCategoryId = Tools::getValue("category");
      $faqId = Tools::getValue("question");
      $cat = faqsCategory::getCategoryByName($this->_shopId, $this->_langId, $faqCategoryId);
      $faq = faqsPost::getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId, $faqId, false);

      if (empty($cat) || empty($faq)) {
          $this->redirect_after = $this->context->link->getPageLink('404');
            $this->redirect();
          return false;
      }

    }
  }

  public function canonicalRedirection($canonical_url = '')
  {
      return false;
  }

  public function getTemplateVarPage()
  {
      $page = parent::getTemplateVarPage();
      $meta_title = $this->_objFaqs->l('FAQs', 'display');
      $meta_description = $this->_objFaqs->l('FAQs', 'display');
      $meta_keywords = $this->_objFaqs->l('FAQs', 'display');
      $faqCategoryId = Tools::getValue("category");
      $faqId = Tools::getValue("question");
      $search = trim(Tools::getValue("search"));

      if( !$faqCategoryId ){
          $faqCategoryId = false;
      }

      if( $faqCategoryId !== false ){

          $cat = faqsCategory::getCategoryByName($this->_shopId, $this->_langId, $faqCategoryId);
          if($cat){
              if($cat[0]['meta_title']){
                  $meta_title = $cat[0]['meta_title'];
              }
              else{
                  $meta_title = $cat[0]['name'];
              }
              if($cat[0]['meta_description']){
                  $meta_description = $cat[0]['meta_description'];
              }
              if($cat[0]['meta_keywords']){
                  $meta_keywords = $cat[0]['meta_keywords'];
              }
          }

          if( $faqId !== false ){
              $faq = faqsPost::getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId, $faqId, false);
              if(isset($faq[0]['meta_title']) && $faq[0]['meta_title']){
                  $meta_title = $faq[0]['meta_title'];
              }
              else{
                  $meta_title = strip_tags($faq[0]['question']);
              }
              if($faq[0]['meta_description']){
                  $meta_description = $faq[0]['meta_description'];
              }
              if($faq[0]['meta_keywords']){
                  $meta_keywords = $faq[0]['meta_keywords'];
              }
          }
      }

      if($search){
          $meta_title = $this->_objFaqs->l('Search:', 'display').' '.$search;
          $meta_description = $this->_objFaqs->l('Search:', 'display').' '.$search;
          $meta_keywords = $this->_objFaqs->l('Search:', 'display').' '.$search;
      }

      $page['meta'] = array(
          'title' => $meta_title,
          'description' => $meta_description,
          'keywords' => $meta_keywords,
          'robots' => 'index',
      );

    return $page;
  }

  public function initContent()
  {
    parent::initContent();

    $mostFaq = faqsPost::getFeaturedFaqs($this->_shopId, $this->_langId);
    $faqCategories = faqsCategory::getCategoriesFaq($this->_shopId, $this->_langId);

    if(!$faqCategories) {
      $faqCategories = array();
    }

    foreach($faqCategories as $key => $category) {
      $num_of_questions_in_category = faqsCategory::getNumberOfQuestionsInCategory($category['id_gomakoil_faq_category']);

      if ($num_of_questions_in_category <= 0) {
        unset($faqCategories[$key]);
        continue;
      }

      $faqsFromCategory = faqsPost::getAllActiveFaqsFromCategory($category['id_gomakoil_faq_category'], $this->_shopId, $this->_langId);

      $faqCategories[$key]['count'] = count($faqsFromCategory);
      $faqCategories[$key]['faqs'] = ($faqsFromCategory);
    }

    $faqCategoryId = Tools::getValue("category");

    if( !$faqCategoryId ){
      $faqCategoryId = false;
    }

    $faqId = Tools::getValue("question");
    $search = trim(Tools::getValue("search"));
    $search_val = '';
    $baseUrl = faqs::getBaseUrl();

    $faq = false;
    $questions = false;

    if ($faqCategoryId !== false) {
      if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
          Context::getContext()->shop->theme->setPageLayouts(array("module-faqs-display" => "layout-left-column"));
      }

      $questions['content'] = faqsPost::getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId, false, true);
      $cat = faqsCategory::getCategoryByName($this->_shopId, $this->_langId, $faqCategoryId);

      if (!empty($questions) && !empty($cat)) {
        $questions['name'] = $cat[0]['name'];
        $questions['color'] = $cat[0]['color'];

        if( $faqId !== false ){
          $faq = faqsPost::getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId, $faqId, false);
          $faq = $faq[0] ? $faq[0] : false;
          $questions = false;
        }
      }
    }

    if ($search) {
      if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
        Context::getContext()->shop->theme->setPageLayouts(array("module-faqs-display" => "layout-left-column"));
      }

     $search_val = $search;
     $search = faqsPost::searchFaqs($this->_shopId, $this->_langId, $search);
    }


      $show_related_products = Configuration::get('FAQS_SHOW_RELATED_PRODUCTS');
      if ($faq && $show_related_products) {
          $faq['related_products'] = $this->getRelatedProducts($faq['id_gomakoil_faq']);
      }


      $show_faqs_from_same_category = Configuration::get('FAQS_SHOW_QUESTION_SAME_CATEGORY');
      if ($faq && $show_faqs_from_same_category) {
          $faq['faqs_same_category'] = $this->getFaqsSameCategory($faq['id_gomakoil_faq'], $faq['link_rewrite_cat']);
      }

      $template_vars = array(
        'basePath'          => _PS_BASE_URL_SSL_ . __PS_BASE_URI__,
        'path_tpl'          => _PS_MODULE_DIR_ . 'faqs/views/templates/front/',
        'faqCategories'     => $faqCategories,
        'usefulness'        => Configuration::get('FAQS_SHOW_USEFULNESS'),
        'faq'               => $faq,
        'mostFaq'           => $mostFaq,
        'questions'         => $questions,
        'faqUrl'            => $baseUrl,
        'search'            => $search,
        'img_dir' 			=> _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . 'modules/faqs/views/img/',
        'search_val'        => $search_val,
        'rewrite_settings'  => faqs::getRewriteSettings(),
        'customer_questions_config' => array('icon' => Configuration::get('FAQS_CUSTOMER_QUESTION_ICON'), 'popup' => Configuration::get('FAQS_CUSTOMER_QUESTION_POPUP')),
        'num_of_faq_in_cat_block' => Configuration::get('FAQS_NUM_OF_FAQ_IN_CAT_BLOCK')
    );

    if (version_compare(_PS_VERSION_, '1.7.0.0', '<')) {
      if ($faq || $questions || $search_val) {
        $template_vars['hide_left_column'] = true;
        //$template_vars['HOOK_LEFT_COLUMN'] = Module::getInstanceByName('faqs')->hookDisplayLeftColumn();

        $category_name = null;

        if (isset($cat) && isset($cat[0]['name'])) {
          $category_name = $cat[0]['name'];
        }

        $template_vars['path'] = $this->getBreadcrumbsPath16($faqCategoryId, $category_name, $faq, trim(Tools::getValue("search")));
      } elseif (!$faq && !$questions && !$search_val) {
        $template_vars['hide_left_column'] = true;
        $this->display_column_left = false;
        $template_vars['path'] = $this->getBreadcrumbsPath16();
      }
    }


    $this->context->smarty->assign($template_vars);

    $template_path = version_compare(_PS_VERSION_, '1.7.0.0', '>=') ? 'module:faqs/views/templates/front/1.7/display.tpl' : '1.6/display.tpl';
    $this->setTemplate($template_path);
  }

  private function getFaqsSameCategory($id_faq, $link_rewrite_cat)
  {
      $limit = Configuration::get('FAQS_SAME_CATEGORY_LIMIT');
      return faqsPost::getFaqsByUrl($this->_shopId, $this->_langId, $link_rewrite_cat, false, true, $limit, $id_faq);
  }

  private function getRelatedProducts($id_faq)
  {
      $products = [];
      $show_related_products = Configuration::get('FAQS_SHOW_RELATED_PRODUCTS');

      if ($id_faq && $show_related_products) {
          $limit = Configuration::get('FAQS_RELATED_PRODUCTS_LIMIT');
          if ($related_products = faqsPost::getAssociatedProducts($id_faq, $limit)) {
              $products = $this->getPresentedForProducts($related_products, 'date_add', $limit);
          }
      }

      return $products;
  }


    private function getPresentedForProducts($product_ids, $order_by, $limit)
    {
        $products = $this->getProductsByIds($product_ids, $order_by, $limit);

        if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            $assembler = new ProductAssembler($this->context);
            $presenterFactory = new ProductPresenterFactory($this->context);
            $presentationSettings = $presenterFactory->getPresentationSettings();
            $presenter = new PrestaShop\PrestaShop\Core\Product\ProductListingPresenter(
                new PrestaShop\PrestaShop\Adapter\Image\ImageRetriever(
                    $this->context->link
                ),
                $this->context->link,
                new PrestaShop\PrestaShop\Adapter\Product\PriceFormatter(),
                new PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever(),
                $this->context->getTranslator()
            );

            $array_result = array();
            foreach ($products as $prow) {
                $array_result[] = $presenter->present(
                    $presentationSettings,
                    $assembler->assembleProduct($prow),
                    $this->context->language
                );
            }

            return $array_result;
        } else {
            $products_properties = Product::getProductsProperties($this->context->language->id, $products);

            foreach ($products_properties as $product_key => $product) {
                $product_data_obj = new Product($product['id_product'], true);
                $products_properties[$product_key]['new'] = $product_data_obj->new;
            }

            $front_controller = new FrontController();
            $front_controller->addColorsToProductList($products_properties);

            return $products_properties;
        }
    }

    private function getProductsByIds($ids, $order, $limit)
    {
        $ids = $this->getIdsAsString($ids);
        $order_by = '';
        if ($order == 'random') {
            $order_by = 'RAND()';
        } elseif ($order == 'name') {
            $order_by = 'pl.name';
        } elseif ($order == 'date_add') {
            $order_by = 'p.date_add';
        }

        $sql = '
			SELECT p.*, pl.`description`, pl.`description_short`, pl.`available_now`,
					pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, IFNULL(pa.id_product_attribute, 0) AS id_product_attribute,pa.minimal_quantity AS product_attribute_minimal_quantity
					, i.id_image
                  FROM ' . _DB_PREFIX_ . 'product_lang as pl
                  INNER JOIN ' . _DB_PREFIX_ . 'product as p
                  ON p.id_product = pl.id_product
                  LEFT JOIN ' . _DB_PREFIX_ . 'product_attribute as pa
                  ON p.id_product = pa.id_product AND pa.default_on = 1
                  LEFT JOIN ' . _DB_PREFIX_ . 'image as i
                  ON p.id_product = i.id_product AND i.cover = 1
                  LEFT JOIN ' . _DB_PREFIX_ . 'category_product as c
                  ON p.id_product = c.id_product
                  WHERE pl.id_lang = ' . (int)Context::getContext()->language->id . '
                  AND pl.id_shop = ' . (int)Context::getContext()->shop->id . '
                  AND p.active = 1
                  AND p.id_product IN(' . pSQL($ids) . ')
                  GROUP BY p.id_product
                   ORDER BY ' . pSQL($order_by) . ' LIMIT ' . (int)$limit. '
			';

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

    private function getIdsAsString($array) {
        $ids = array();

        foreach ($array as $item) {
            $ids[] = (int)$item['id_product'];
        }

        return implode(',', $ids);
    }

  /**
   * Generates Faqs Breadcrumbs for PS 1.6
   *
   * @param integer $category_id
   * @param string $category_title
   * @param string $question_title
   * @param bool $search
   * @return string
   */
  private function getBreadcrumbsPath16($category_id = null, $category_title = null, $faq = null, $search = null)
  {
    $question_title = false;
    $base_url = faqs::getBaseUrl();
    $root_name = $this->_objFaqs->l('FAQs', 'display');
      $breadcrumbs_path = '<span itemprop="title">'.$root_name.'</span>';


      if(isset($faq['question']) && $faq['question']){
        $question_title = $faq['question'];
      }


      $category_title = Tools::substr($category_title, 0, 150);
      $question_title = Tools::substr($question_title, 0, 150);

      if ($category_id && $category_title) {
        $breadcrumbs_path = '<a itemprop="url" href="'.$base_url.'" ><span itemprop="title">'.
          $root_name.'</span></a><span class="navigation-pipe"></span><span itemprop="title">'.
          $category_title.'</span>';

        if($question_title){
          if (!faqs::getRewriteSettings()) {
            $category_link = '<a itemprop="url" href="'.$base_url.'&category='.$category_id.'" title=""><span itemprop="title">'.$category_title.'</span></a>';
          } else {
            $category_link = '<a itemprop="url" href="'.$base_url.$category_id.'.html" title=""><span itemprop="title">'.$category_title.'</span></a>';
          }

          $breadcrumbs_path = '<a itemprop="url" href="'.$base_url.'" ><span itemprop="title">'.
            $root_name.'</span></a><span class="navigation-pipe"></span>'.$category_link.'<span class="navigation-pipe"></span><span itemprop="title">'.
            strip_tags($question_title).'</span>';
        }
      }

      if ($search) {
        $breadcrumbs_path = '<a itemprop="url" href="'.$base_url.'" ><span itemprop="title">'.$root_name.
          '</span></a><span class="navigation-pipe"></span><span itemprop="title">'.$this->_objFaqs->l('Search', 'display').'</span>';
      }

      return $breadcrumbs_path;
  }

  /**
   * Generates Faqs Breadcrumbs for PS 1.7
   * @return array
   */
  public function getBreadcrumbLinks()
  {
    $question = false;
    $category = false;
    $search_br = false;
    $breadcrumb = parent::getBreadcrumbLinks();
    $baseUrl = faqs::getBaseUrl();

    $home =  array(
      'title' => $this->_objFaqs->l('FAQs', 'display'),
      'url' => $baseUrl,
    );

    $faqCategoryId = Tools::getValue("category");
    $faqId = Tools::getValue("question");
    $search = trim(Tools::getValue("search"));

    if( !$faqCategoryId ) {
      $faqCategoryId = false;
    }

    if( $faqCategoryId !== false ){
      $cat = faqsCategory::getCategoryByName($this->_shopId, $this->_langId, $faqCategoryId);


      if(!empty($cat) && isset($cat[0]['name'])){
        if(!faqs::getRewriteSettings()){
          $url = $baseUrl.'&category='.$cat[0]['link_rewrite'];
        } else{
          $url = $baseUrl.$cat[0]['link_rewrite'].'.html';
        }

        $category =  array(
          'title' => $cat[0]['name'],
          'url' => $url,
        );
      }

      if( $faqId !== false ){
        $faq = faqsPost::getFaqsByUrl($this->_shopId, $this->_langId, $faqCategoryId, $faqId, false);
        if($faq[0]['question']){
          $question =  array(
            'title' => strip_tags($faq[0]['question']),
            'url' => '',
          );
        }
      }
    }

    if($search){
      $search_br =  array(
        'title' => $this->_objFaqs->l('Search', 'display').' "'.$search.'"',
        'url' => '',
      );
    }

    $breadcrumb['links'][] = $home;

    if($category){

	  $explode_title = explode(" | ",$category['title']);	
	  $category['title'] = $explode_title[0];
      $breadcrumb['links'][] = $category;
    }

    if($question){
    
      $breadcrumb['links'][] = $question;
    }

    if($search_br){
      $breadcrumb['links'][] = $search_br;
    }
		
    return $breadcrumb;
  }
}
