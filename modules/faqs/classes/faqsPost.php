<?php
if (!defined('_PS_VERSION_')) {
  exit;
}
require_once _PS_MODULE_DIR_ . 'faqs/faqs.php';
require_once _PS_MODULE_DIR_ . 'faqs/classes/FaqsMailer.php';

class faqsPost extends ObjectModel
{
  public $id_gomakoil_faq;
  public $id_gomakoil_faq_category;
  public $date_add;
  public $active = 1;
  public $most = 0;
  public $association = 0;
  public $hide_faq = 0;
  public $as_url = 0;
  public $position;
  public $tags;
  public $question;
  public $answer;
  public $meta_title;
  public $meta_description;
  public $meta_keywords;
  public $link_rewrite;
  public $name = 'Admin';
  public $email = 'no';
  public $by_customer = 0;

  public static $definition = array(
    'table'     => 'gomakoil_faq',
    'primary'   => 'id_gomakoil_faq',
    'multilang' => true,
    'fields'    => array(
      //basic fields

      'date_add'                 => array('type' => self::TYPE_DATE, 'validate' => 'isString'),
      'id_gomakoil_faq_category' => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
      'most'                     => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
      'association'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
      'hide_faq'                 => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
      'position'                 => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
      'as_url'                   => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
      'link_rewrite'             => array('type' => self::TYPE_STRING, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128, 'lang' => true),
      'by_customer'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
      'name'                     => array('type' => self::TYPE_HTML, 'validate' => 'isString'),
      'email'                    => array('type' => self::TYPE_HTML, 'validate' => 'isString'),

      // Lang fields
      'question'                 => array('type' => self::TYPE_HTML, 'lang' => true, 'required' => true, 'validate' => 'isString'),
      'answer'                   => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString', 'required' => true),
      'tags'                     => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
      'meta_title'               => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
      'meta_description'         => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
      'meta_keywords'            => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),

      //Shop fields
      'active'                   => array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool'),

    )
  );

  public function __construct($id_gomakoil_faq = null, $id_lang = null, $id_shop = null)
  {
    if (faqs::isModuleVersionCompliantWithMultishopFeature()) {
      Shop::addTableAssociation('gomakoil_faq', array('type' => 'shop'));
    }

    parent::__construct($id_gomakoil_faq, $id_lang, $id_shop);

    /**
     * When shop context is - 'ALL_SHOPS', we need to manually set id_shop
     * for the items that is associated with not default shop.
     */
    if (!isset($this->active)) {
      foreach (Shop::getContextListShopID() as $shop_id) {
        parent::__construct($id_gomakoil_faq, $id_lang, $shop_id);

        if (isset($this->active)) {
          break;
        }
      }
    }

  }

  public static function setFieldParameter($field_name, $field_parameter, $value)
  {
    self::$definition['fields'][$field_name][$field_parameter] = $value;
  }

  public function add($autodate = true, $null_values = false)
  {
    $cat = Tools::getValue('categoryBox');
    $categories = Tools::getValue('categoriesBox');
    $products = Tools::getValue('productIds');

    if (isset($cat) && $cat) {
      $this->id_gomakoil_faq_category = $cat;
    }

    $this->position = (int)self::getLastPostPosition($cat) + 1;
    $res = parent::add($autodate, $null_values);

    $this->setAssociation($this->id, $categories, 'faq_association_category', 'id_category');
    $this->setAssociation($this->id, $products, 'faq_association_product', 'id_product');

    return $res;
  }

  /**
   * Associate question with product or category
   */
  public function setAssociation($id, $values, $table, $field)
  {
    if ($field == 'id_product') {
      $values = explode(",", $values);
    }

    Db::getInstance()->delete($table, 'id_faq = ' . (int)$id);
    if ($values) {
      foreach ($values as $value) {
        Db::getInstance()->insert($table, array('id_faq' => (int)$id, $field => (int)$value));
      }
    }
  }


  public function update($null_values = false)
  {
    //When changing status in list we don't need to set any associations, therefore we just call parent update function
    if (Tools::getValue('statusgomakoil_faq') !== false) {
      return parent::update();
    }

    $cat = Tools::getValue('categoryBox');
    $categories = Tools::getValue('categoriesBox');
    $products = Tools::getValue('productIds');

    if (!$this->id_gomakoil_faq && $this->id_gomakoil_faq_category !== $cat && $cat) {
      $this->position = (int)self::getLastPostPosition($cat) + 1;
    }

    if ($cat) {
      $this->id_gomakoil_faq_category = $cat;
    }

    $rez = parent::update($null_values);

    if ($rez) {
      if (isset($categories)) {
        $this->setAssociation($this->id_gomakoil_faq, $categories, 'faq_association_category', 'id_category');
      }

      if (isset($products)) {
        $this->setAssociation($this->id_gomakoil_faq, $products, 'faq_association_product', 'id_product');
      }

      if ($this->isUnansweredQuestion() && !empty($this->answer[Context::getContext()->language->id])) {
        $send_notification_to_customer = Configuration::get('FAQS_SEND_EMAIL_TO_CUSTOMER_ON_ANSWER');

        if ($send_notification_to_customer) {
          FaqsMailer::sendAnsweredQuestionNotificationToCustomer($this);
        }

        $this->removeIdFromListOfUnansweredQuestions();
      }
    }

    return $rez;
  }


  public function delete()
  {
    Db::getInstance()->delete('faq_association_category', 'id_faq = ' . (int)$this->id_gomakoil_faq);
    Db::getInstance()->delete('faq_association_product', 'id_faq = ' . (int)$this->id_gomakoil_faq);

    return parent::delete();
  }

  private function isUnansweredQuestion()
  {
    if (!$this->by_customer || !$this->email) {
      return false;
    }

    $unanswered_questions_list = $this->getListOfUnansweredQuestionsIds();

    if (!in_array($this->id, $unanswered_questions_list) || !array_key_exists($this->id, $unanswered_questions_list)) {
      return false;
    }

    return true;
  }

  private function getListOfUnansweredQuestionsIds()
  {
    if (!Configuration::hasKey('FAQS_NOT_ANSWERED_CUSTOMER_QUESTIONS_IDS')) {
      return array();
    }

    return json_decode(Configuration::get('FAQS_NOT_ANSWERED_CUSTOMER_QUESTIONS_IDS'), true);
  }

  public function addIdToListOfUnansweredQuestions()
  {
    $unanswered_questions_list = $this->getListOfUnansweredQuestionsIds();

    if (empty($this->id) || !is_array($unanswered_questions_list)) {
      return false;
    }

    $unanswered_questions_list[$this->id] = $this->id;
    Configuration::updateValue('FAQS_NOT_ANSWERED_CUSTOMER_QUESTIONS_IDS', json_encode($unanswered_questions_list));

    return true;
  }

  public function removeIdFromListOfUnansweredQuestions()
  {
    $unanswered_questions_list = $this->getListOfUnansweredQuestionsIds();

    if (empty($this->id) || !is_array($unanswered_questions_list)) {
      return false;
    }

    if (!empty($unanswered_questions_list[$this->id])) {
      unset($unanswered_questions_list[$this->id]);
    }

    Configuration::updateValue('FAQS_NOT_ANSWERED_CUSTOMER_QUESTIONS_IDS', json_encode($unanswered_questions_list));

    return true;
  }

  /**
   * @param bool $category
   * @return int
   */
  public static function getLastPostPosition($category = false)
  {
    return (int)(Db::getInstance()->getValue('
      SELECT MAX(bp.`position`)
      FROM `' . _DB_PREFIX_ . 'gomakoil_faq` bp
      WHERE  bp.`id_gomakoil_faq_category` = ' . (int)$category
    )
    );
  }


  /**
   * @param bool $id_shop
   * @param bool $id_lang
   * @param bool $limit
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getFeaturedFaqs($id_shop, $id_lang, $limit = null)
  {
    $where = '';

    if ($limit) {
      $where = ' LIMIT ' . (int)$limit;
    }

    $sql = "
			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfs.active = 1
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gfc.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = " . (int)($id_shop) . "
      AND gfcs.id_shop = " . (int)($id_shop) . "
      AND gfl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "
      AND gf.most = 1
      AND gfs.active = 1
      AND gfcs.active = 1
      ORDER BY gf.position
			" . $where;

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

    public static function getFaqsIdFromCategories($categories)
    {
        $ids = implode(',', array_map('intval', $categories));
        $sql = "SELECT gf.id_gomakoil_faq
          FROM " . _DB_PREFIX_ . "gomakoil_faq gf
          INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
          ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
          INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
          ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfs.active = 1
          INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
          ON gfc.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
          WHERE gfs.active = 1
          AND gfcs.active = 1
          AND gf.id_gomakoil_faq_category IN(" . $ids . ")
        ";
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

  public static function getAllFaqs($id_shop, $id_lang, $order = false)
  {

    $sql = "
			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfs.active = 1
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gfc.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gfc.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = " . (int)($id_shop) . "
      AND gfcs.id_shop = " . (int)($id_shop) . "
      AND gfl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "

      AND gfs.active = 1
      AND gfcs.active = 1
      ";

    if ($order) {
        $sql .= " ORDER BY gf.".$order;
    }
    else {
        $sql .= " ORDER BY gf.position";
    }
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }


  /**
   * @param $id_category
   * @param bool $id_shop
   * @param bool $id_lang
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getAllActiveFaqsFromCategory($id_category, $id_shop = false, $id_lang = false)
  {
    $sql = "
        			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfs.active = 1
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gf.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gf.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = " . (int)$id_shop . "
      AND gfcs.id_shop = " . (int)$id_shop . "
      AND gfl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "
      AND gf.id_gomakoil_faq_category = " . (int)$id_category . "
      AND gfs.active = 1
      AND gfcs.active = 1
      ORDER BY gf.position
			";

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }


  /**
   * @param null $id_shop
   * @param null $id_lang
   * @param $category
   * @param string $linkRewriteOfFaq
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getFaqsByUrl($id_shop = null, $id_lang = null, $category, $linkRewriteOfFaq = '', $faq_active = false, $limit = false , $withoutFaq = false)
  {
    $where = '';
    $active = '';
    if ($linkRewriteOfFaq) {
      $where = " AND gfl.link_rewrite = '" . pSQL($linkRewriteOfFaq) . "'";
    }

    if($faq_active){
      $active = " AND gfs.active = 1";
    }

    $results_limit = $limit ? ' LIMIT ' . (int)$limit : '';

    if ($withoutFaq) {
      $where .= " AND gf.id_gomakoil_faq != " . (int)$withoutFaq;
    }

    $sql = "
      SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM " . _DB_PREFIX_ . "gomakoil_faq gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category  ".$active."
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gf.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gf.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = " . (int)$id_shop . "
      AND gfcs.id_shop = " . (int)$id_shop . "
      AND gfl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "
      AND gfcl.link_rewrite = '" . pSQL($category) . "'
  
      ".$active."
      AND gfcs.active = 1
      $where
      ORDER BY gf.position
			" . $results_limit;

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }


  public static function searchFaqs($id_shop = false, $id_lang = false, $search = false, $limit = false)
  {
    $where = '';

    if ($search) {
      $where = ' AND ( MATCH (gfl.question, gfl.tags) AGAINST ("' . pSQL($search) . '") OR gfl.question LIKE "%' . pSQL($search) . '%" OR gfl.tags LIKE "%' . pSQL($search) . '%" ) ';
    }

    $results_limit = $limit ? ' LIMIT ' . (int)$limit : '';

    $sql = '
       			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat, MATCH (gfl.question, gfl.tags) AGAINST
      ("' . pSQL($search) . '") AS score
      FROM ' . _DB_PREFIX_ . 'gomakoil_faq gf
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfs.active = 1
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang as gfcl
      ON gf.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = ' . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . '
      INNER JOIN ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop as gfcs
      ON gf.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gfs.id_shop = ' . (int)$id_shop . '
      AND gfcs.id_shop = ' . (int)$id_shop . '
      AND gfl.id_lang = ' . ($id_lang ? (int)$id_lang : (int)Configuration::get('PS_LANG_DEFAULT')) . '
      AND gfs.active = 1
      AND gfcs.active = 1
      ' . $where . '
      ORDER BY score DESC
		' . $results_limit;


    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  /**
   * @param $id_faq
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getAssociatedProductCategories($id_faq)
  {
    $sql = '
       			SELECT ac.id_category
      FROM ' . _DB_PREFIX_ . 'faq_association_category ac
      WHERE ac.id_faq = ' . (int)$id_faq . '

			';

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }


  /**
   * @param $id_faq
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getAssociatedProducts($id_faq, $limit = false)
  {
    $limit = $limit ? ' LIMIT ' . (int)$limit : '';
    $sql = '
       			SELECT ac.id_product
      FROM ' . _DB_PREFIX_ . 'faq_association_product ac
      WHERE ac.id_faq = ' . (int)$id_faq . '
      ' . $limit . '
	 ';
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  /**
   * @param $ids
   * @param $id_shop
   * @param $id_lang
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getFaqsByIds($ids, $id_shop = false, $id_lang = false, $association = true, $limit = false)
  {

    $ids = implode(',', array_map('intval', explode(',',$ids)));
    $results_limit = $limit ? ' LIMIT ' . (int)$limit : '';
    $sql = "
       			SELECT gf.*, gfl.*, gfs.*, gfcl.link_rewrite as link_rewrite_cat
      FROM  " . _DB_PREFIX_ . "gomakoil_faq as gf
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_lang as gfl
      ON gf.id_gomakoil_faq = gfl.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_shop as gfs
      ON gf.id_gomakoil_faq = gfs.id_gomakoil_faq
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category as gfc
      ON gf.id_gomakoil_faq_category = gfc.id_gomakoil_faq_category AND gfs.active = 1
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_lang as gfcl
      ON gf.id_gomakoil_faq_category = gfcl.id_gomakoil_faq_category AND gfcl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "
      INNER JOIN " . _DB_PREFIX_ . "gomakoil_faq_category_shop as gfcs
      ON gf.id_gomakoil_faq_category = gfcs.id_gomakoil_faq_category
      WHERE gf.id_gomakoil_faq IN(" . $ids . ")
      AND gfs.id_shop = " . (int)$id_shop . "
      AND gfcs.id_shop = " . (int)$id_shop . "
      AND gfl.id_lang = " . (int)($id_lang ? (int)$id_lang : Configuration::get('PS_LANG_DEFAULT')) . "
      AND gfs.active = 1
      AND gfcs.active = 1
			" . $results_limit;

    if ($association) {
        $sql .= " AND gf.association = 1";
    }

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }


  /**
   * @param $productCategoriesIds
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getIdFaqsAssociatedToProductCategories($productCategoriesIds)
  {
    $productCategoriesIds = implode(',', array_map('intval', explode(',',$productCategoriesIds)));

    $sql = 'SELECT ac.id_faq
            FROM ' . _DB_PREFIX_ . 'faq_association_category ac
            WHERE ac.id_category IN( ' . $productCategoriesIds . ')';

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }

  /**
   * @param $productId
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getIdFaqsAssociatedToProduct($productId)
  {
    $sql = 'SELECT ac.id_faq
            FROM ' . _DB_PREFIX_ . 'faq_association_product ac
            WHERE ac.id_product = ' . (int)$productId;

    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }
}