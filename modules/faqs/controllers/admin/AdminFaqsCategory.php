<?php
if (!defined('_PS_VERSION_')) {
  exit;
}
require_once(dirname(__FILE__) . '/../../faqs.php');
require_once(dirname(__FILE__) . '/../../classes/faqsCategory.php');

class AdminFaqsCategoryController extends ModuleAdminController
{
  private $_objFaqs;

  public function __construct()
  {
    $this->className = 'faqsCategory';
    $this->table = 'gomakoil_faq_category';
    $this->bootstrap = true;
    $this->lang = true;
    $this->edit = true;
    $this->delete = true;

    parent::__construct();

    $this->_objFaqs = new Faqs();
    $this->position_identifier = 'id_gomakoil_faq_category';
    $this->_defaultOrderBy = 'a!position';
    $this->orderBy = 'position';

    $this->bulk_actions = array(
      'delete' => array(
        'text' => $this->l('Delete selected'),
        'icon' => 'icon-trash',
        'confirm' => $this->l('Delete selected items?')
      )
    );

    $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'gomakoil_faq_category_shop` sa ON (a.`id_gomakoil_faq_category` = sa.`id_gomakoil_faq_category`)';
    $this->_select .= 'sa.*';
    $this->_where .= 'AND sa.id_shop IN(' . implode(',', Shop::getContextListShopID()) . ') GROUP BY sa.id_gomakoil_faq_category';

    $this->fields_list = array(
      'id_gomakoil_faq_category' => array(
        'title' => $this->l('ID'),
        'filter_key' => 'a!id_gomakoil_faq_category',
        'width' => 20
      ),
      'name' => array(
        'title' => $this->l('Title'),
        'width' =>100,
        'filter_key' => 'b!name',
        'orderby' => true
      ),
      'active' => array(
        'title' => $this->l('Displayed'),
        'active' => 'status',
        'filter_key' => 'sa!active',
        'type' => 'bool',
        'width' => 70,
        'orderby' => true
      ),
      'position' => array(
        'title' => $this->l('Position'),
        'width' => 40,
        'filter_key' => 'a!position',
        'align' => 'left',
        'position' => 'position'
      ),
      'date_add' => array(
        'title' => $this->l('Creation date'),
        'maxlength' => 190,
        'width' =>100
      ),
    );
  }

  public function init()
  {
    parent::init();
  }

  public function initContent()
  {
    $urlFaqs = trim(faqs::getBaseUrl(), ' /');
    $this->tpl_list_vars['urlFaqs'] = $urlFaqs;

    parent::initContent();
  }

  public function initProcess(){
    parent::initProcess();
  }

  /**
   * Must be overrided for correct work of multishop feature
   *
   * @param int $id_object
   * @return bool
   */
  protected function updateAssoShop($id_object)
  {
    return true;
  }

  public function initPageHeaderToolbar(){
    if ($this->display == 'view' || $this->display == 'edit')
    {
      $baseUrl = _PS_BASE_URL_SSL_.__PS_BASE_URI__;
      $page = new faqsCategory( Tools::getValue('id_gomakoil_faq_category'), Context::getContext()->language->id );

      if(!faqs::getRewriteSettings()){
        $faqUrl = $baseUrl.'index.php?fc=module&module=faqs&controller=display&category='.$page->link_rewrite;
      } else{
        $home_page_id = Configuration::get('FAQS_SEO_HOME_PAGE') ? Configuration::get('FAQS_SEO_HOME_PAGE') : 'faqs';
        $faqUrl = $baseUrl.$home_page_id.'/' . $page->link_rewrite . '.html';
      }

      $this->page_header_toolbar_btn['preview'] = array(
        'href' => $faqUrl,
        'desc' => $this->l('Preview', null, null, false),
        'short' => $this->l('Preview', null, null, false),
        'target' => true,
      );
    }
    parent::initPageHeaderToolbar();
  }


  public function renderForm()
  {
    $this->fields_form = array(
      'legend' => array(
        'title' => $this->l('Category'),
        'icon' => 'icon-plus-sign-alt'
      ),
      'input' => array(
          array(
              'type' => 'switch',
              'label' => $this->l('Active'),
              'name' => 'active',
              'shop' => true,
              'is_bool' => true,
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
          'type' => 'text',
          'label' => $this->l('Title'),
          'name' => 'name',
          'lang' => true,
          'required' => true,
          'class' => 'name',
          'form_group_class' => 'faqs-new-category-title-form-group'
        ),

        array(
          'type' => 'text',
          'label' => $this->l('Meta title'),
          'name' => 'meta_title',
          'lang' => true,
          'class' => 'meta_title',
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Meta description'),
          'name' => 'meta_description',
          'lang' => true,
          'class' => 'meta_description',
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Meta keywords'),
          'name' => 'meta_keywords',
          'lang' => true,
          'class' => 'meta_keywords',
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Friendly URL:'),
          'name' => 'link_rewrite',
          'lang' => true,
          'required' => true,
          'hint' => $this->l('Only letters and the minus (-) character are allowed.'),
          'form_group_class' => 'faqs-new-category-link-rewrite-form-group',
          'suffix' => '<button class="btn btn-default reset-link-rewrite-btn">Reset URL</button>',
        ),
        array(
          'type' => 'hidden',
          'name' => 'PS_ALLOW_ACCENTED_CHARS_URL',
        ),
          array(
              'type' => 'color',
              'label' => $this->l('Title color'),
              'name' => 'color',
              'hint' => $this->l('Choose a color with the color picker, or enter an HTML color (e.g. "lightblue", "#CC6600").')
          ),
      ),
      'buttons' => array(
        'save-and-stay' => array(
          'title' => $this->l('Save and stay'),
          'name' => 'submitAdd'.$this->table.'AndStay',
          'type' => 'submit',
          'class' => 'btn btn-default pull-right',
          'icon' => 'process-icon-save'
        )
      ),
      'submit' => array(
        'title' => $this->l('Save'),
      )
    );

    $this->fields_value['PS_ALLOW_ACCENTED_CHARS_URL'] = (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL');

    return parent::renderForm();
  }

  public function renderList()
  {
    $this->addRowAction('edit');
    $this->addRowAction('delete');
    return parent::renderList();
  }

  public function ajaxProcessUpdatePositions()
  {
    $category = Tools::getValue('gomakoil_faq_category');
    foreach($category as $key => $value){
      $value = explode('_', $value);
      Db::getInstance()->update('gomakoil_faq_category', array('position' => (int)$key), 'id_gomakoil_faq_category='.(int)$value[2]);
    }
  }

}