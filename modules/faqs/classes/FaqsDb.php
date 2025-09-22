<?php
if (!defined('_PS_VERSION_')) { exit; }
class FaqsDb
{
  private static $tables = array('gomakoil_faq_category',
                          'gomakoil_faq_category_lang',
                          'gomakoil_faq_category_lang_backup',
                          'gomakoil_faq_category_shop',
                          'gomakoil_faq_category_shop_backup',
                          'gomakoil_faq',
                          'gomakoil_faq_lang',
                          'gomakoil_faq_lang_backup',
                          'gomakoil_faq_shop',
                          'gomakoil_faq_shop_backup',
                          'faq_association_product',
                          'faq_association_category'
                  );

  /**
   * @return bool
   */
  public static function createTables()
  {
    if (!self::dropTables()) {
      return false;
    }

    $createTableQueries = array();

    //gomakoil_faq_category
    $createTableQueries[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category(
				id_gomakoil_faq_category int(11) NOT NULL AUTO_INCREMENT,
				active boolean NULL,
                `position` INT(11)  NOT NULL,
                date_add datetime NULL,
                `color` TEXT  NOT NULL,
				PRIMARY KEY (`id_gomakoil_faq_category`)
				)';

    //gomakoil_faq_category_lang
    $createTableQueries[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang(
				id_gomakoil_faq_category int(11) NOT NULL AUTO_INCREMENT,
				id_lang int(11) NOT NULL,
				`name` nvarchar(500) NOT NULL,
				description nvarchar(2000) NULL,
				link_rewrite nvarchar(1000) NOT NULL,
				meta_title nvarchar(500) NULL,
				meta_description nvarchar(1000) NULL,
				meta_keywords nvarchar(1000) NULL,
				PRIMARY KEY(id_gomakoil_faq_category, id_lang)
				)
				CHARACTER SET utf8 COLLATE utf8_general_ci';

    //gomakoil_faq_category_shop
    $createTableQueries[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop(
				id_gomakoil_faq_category int(11) NOT NULL AUTO_INCREMENT,
				`id_shop` INT(11) NOT NULL,
				active boolean NULL,
				PRIMARY KEY(id_gomakoil_faq_category, id_shop)
				)
				CHARACTER SET utf8 COLLATE utf8_general_ci';


    //gomakoil_faq
    $createTableQueries[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq(
				id_gomakoil_faq int(11) NOT NULL AUTO_INCREMENT,
				id_gomakoil_faq_category int(11) NOT NULL,
				`most` INT(11)  NOT NULL,
				`association` INT(11)  NOT NULL,
				`hide_faq` INT(11)  NOT NULL,
				`like` INT(11)  NOT NULL,
				`dislike` INT(11)  NOT NULL,
				name nvarchar(500) NULL,
				email nvarchar(500) NULL,
				by_customer boolean NULL,
				position int(11) NULL,
				active boolean NULL,
				date_add datetime NULL,
				as_url int(1) NULL,
				PRIMARY KEY(id_gomakoil_faq)
				)';

    //gomakoil_faq_lang
    $createTableQueries[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_lang(
        id_gomakoil_faq int(11) NOT NULL AUTO_INCREMENT,
        id_lang int(11) NOT NULL,
        question text NULL,
        answer text NULL,
        link_rewrite nvarchar(1000) NOT NULL,
        meta_title nvarchar(500) NULL,
        meta_description nvarchar(1000) NULL,
        meta_keywords nvarchar(1000) NULL,
        tags nvarchar(2000) NULL,

        PRIMARY KEY(id_gomakoil_faq,id_lang),
        FULLTEXT INDEX `search` (`question`, `tags`))
        CHARACTER SET utf8 COLLATE utf8_general_ci
        ENGINE = MyISAM
        ';

    //gomakoil_faq_shop
    $createTableQueries[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_shop(
				id_gomakoil_faq int(11) NOT NULL AUTO_INCREMENT,
				`id_shop` INT(11) NOT NULL,
				active boolean NULL,
				PRIMARY KEY(id_gomakoil_faq, id_shop)
				)
				CHARACTER SET utf8 COLLATE utf8_general_ci';



    //faq_association_product
    $createTableQueries[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'faq_association_product(
				id_faq_association_product int(11) NOT NULL AUTO_INCREMENT,
				id_faq int(11) NOT NULL,
				id_product int(11) NOT NULL,
				PRIMARY KEY(id_faq_association_product)
				)';

    //faq_association_category
    $createTableQueries[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'faq_association_category(
				id_faq_association_category int(11) NOT NULL AUTO_INCREMENT,
				id_faq int(11) NOT NULL,
				id_category int(11) NOT NULL,
				PRIMARY KEY(id_faq_association_category)
				)';



    //Execute sql queries
    foreach ($createTableQueries as $query) {
      if (!Db::getInstance()->execute($query)) {
        return false;
      }
    }

    return true;
  }

  /**
   * @return bool
   */
  public static function dropTables()
  {
    foreach (self::$tables as $table_name) {
      $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . pSQL($table_name);

      if (!Db::getInstance()->execute($sql)) {
        return false;
      }
    }

    return true;
  }

  /**
   * @return bool
   */
  private static function isBackupTablesAlreadyExists()
  {
    $tables = array('gomakoil_faq_category_lang_backup', 'gomakoil_faq_category_shop_backup', 'gomakoil_faq_lang_backup', 'gomakoil_faq_shop_backup');

    foreach ($tables as $table) {
      if (!self::isTableExists($table)) {
        return false;
      }
    }

    return true;
  }

  /**
   * @return bool
   */
  public static function createShopAndLangBackupTables()
  {
    if (self::isBackupTablesAlreadyExists()) {
      return false;
    }

    $create_category_lang_backup_query = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang_backup(
				id_gomakoil_faq_category int(11) NOT NULL AUTO_INCREMENT,
				id_lang int(11) NOT NULL,
				`name` nvarchar(500) NOT NULL,
				description nvarchar(2000) NULL,
				link_rewrite nvarchar(1000) NOT NULL,
				meta_title nvarchar(500) NULL,
				meta_description nvarchar(1000) NULL,
				meta_keywords nvarchar(1000) NULL,
				PRIMARY KEY(id_gomakoil_faq_category, id_lang)
				)
				CHARACTER SET utf8 COLLATE utf8_general_ci';

    $create_category_shop_backup_query = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop_backup(
				id_gomakoil_faq_category int(11) NOT NULL AUTO_INCREMENT,
				`id_shop` INT(11) NOT NULL,
				PRIMARY KEY(id_gomakoil_faq_category, id_shop)
				)
				CHARACTER SET utf8 COLLATE utf8_general_ci';

    $create_faq_lang_backup_query = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_lang_backup(
				id_gomakoil_faq int(11) NOT NULL AUTO_INCREMENT,
				id_lang int(11) NOT NULL,
				question text NULL,
				answer text NULL,
				link_rewrite nvarchar(1000) NOT NULL,
				meta_title nvarchar(500) NULL,
				meta_description nvarchar(1000) NULL,
				meta_keywords nvarchar(1000) NULL,
				tags nvarchar(2000) NULL,

				PRIMARY KEY(id_gomakoil_faq,id_lang),
				FULLTEXT INDEX `search` (`question` ASC, `tags` ASC))
				CHARACTER SET utf8 COLLATE utf8_general_ci
				ENGINE = MyISAM
				';

    $create_faq_shop_backup_query = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_shop_backup(
				id_gomakoil_faq int(11) NOT NULL AUTO_INCREMENT,
				`id_shop` INT(11) NOT NULL,
				PRIMARY KEY(id_gomakoil_faq, id_shop)
				)
				CHARACTER SET utf8 COLLATE utf8_general_ci';

    $create_backup_table_queries = array($create_category_lang_backup_query, $create_category_shop_backup_query, $create_faq_lang_backup_query, $create_faq_shop_backup_query);

    foreach ($create_backup_table_queries as $query) {
      if (!Db::getInstance()->execute($query)) {
        return false;
      }
    }

    return true;
  }

  /**
   * @param array $category_lang_data_table
   * @param array $category_shop_data_table
   * @param array $faq_lang_data_table
   * @param array $faq_shop_data_table
   * @return bool
   */
  public static function backupLangAndShopTables($category_lang_data_table, $category_shop_data_table, $faq_lang_data_table, $faq_shop_data_table)
  {
    Db::getInstance()->execute('TRUNCATE TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop_backup');
    Db::getInstance()->execute('TRUNCATE TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_category_lang_backup');
    Db::getInstance()->execute('TRUNCATE TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_shop_backup');
    Db::getInstance()->execute('TRUNCATE TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_lang_backup');

    if (!Db::getInstance()->insert('gomakoil_faq_shop_backup', $faq_shop_data_table) ||
      !Db::getInstance()->insert('gomakoil_faq_lang_backup', $faq_lang_data_table) ||
      !Db::getInstance()->insert('gomakoil_faq_category_shop_backup', $category_shop_data_table) ||
      !Db::getInstance()->insert('gomakoil_faq_category_lang_backup', $category_lang_data_table)
    ) {
      return false;
    }

    return true;
  }

  /**
   * @param array $old_faqs
   * @param string $type
   * @return array|bool
   */
  public static function getFaqShopTablesFromLangTables(array $old_faqs, $type)
  {
    if ($type == 'faq') {
      $id_key = 'id_gomakoil_faq';
    } elseif ($type == 'category') {
      $id_key = 'id_gomakoil_faq_category';
    } else {
      return false;
    }

    if (empty($old_faqs) || !$old_faqs) {
      return array('shop' => '', 'lang' => '');
    }

    $faq_shop_tmp = array();
    $faq_lang_tmp = array();

    $faq_shop_table = array();
    $faq_lang_table = $old_faqs;

    foreach ($old_faqs as $key => $oldFaq) {
      $id_faq = $oldFaq[$id_key];
      $id_shop = $oldFaq['id_shop'];
      $id_lang = $oldFaq['id_lang'];

      if (!in_array(($id_faq . ':' . $id_shop), $faq_shop_tmp)) {
        array_push($faq_shop_tmp, ($id_faq . ':' . $id_shop));
      }

      if (in_array(($id_faq . ':' . $id_lang), $faq_lang_tmp)) {
        unset($faq_lang_table[$key]);
      } else {
        array_push($faq_lang_tmp, ($id_faq . ':' . $id_lang));
      }

      unset($faq_lang_table[$key]['id_shop']);
    }

    foreach ($faq_shop_tmp as $faq_shop_row) {
      $id_faq = (int)explode(':', $faq_shop_row)[0];
      $id_shop = (int)explode(':', $faq_shop_row)[1];

      if (is_int($id_faq) && is_int($id_shop)) {
        array_push($faq_shop_table, array($id_key => $id_faq, 'id_shop' => $id_shop));
      }
    }

    if (empty($faq_shop_table) && empty($faq_lang_table)) {
      return false;
    }

    foreach ($faq_lang_table as $faq_lang_row_key => $faq_lang_row) {
      foreach ($faq_lang_row as $key => $value) {
        if (!is_numeric($value)) {
          $faq_lang_table[$faq_lang_row_key][$key] = pSQL($value, true);
        }
      }
    }

    return array('shop' => $faq_shop_table, 'lang' => $faq_lang_table);
  }

  /**
   * @return bool
   */
  public static function copyDbDataForUpgrade2_5_0()
  {
    $oldCategories = self::getOldCategories();
    $oldFaqs = self::getOldFaqs();
    $res = self::uninstallOldDb();
    $res = FaqsDb::createTables();

    foreach ($oldCategories as $value) {
      $name = array();
      $meta_title = array();
      $meta_description = array();
      foreach (Language::getLanguages() as $language) {
        $name[$language['id_lang']] = $value['name'];
        $meta_title[$language['id_lang']] = $value['meta_title'];
        $meta_description[$language['id_lang']] = $value['meta_description'];

      }

      $obj_cat = new faqsCategory();
      $obj_cat->name = $name;
      $obj_cat->meta_title = $meta_title;
      $obj_cat->meta_description = $meta_description;
      $obj_cat->color = $value['color'];
      $obj_cat->position = $value['position'];
      $obj_cat->link_rewrite = $value['friendly_url'];
      $obj_cat->active = 1;
      $obj_cat->save();
    }

    foreach ($oldFaqs as $value) {
      $question = array();
      $answer = array();
      $tags = array();
      $meta_title = array();
      $meta_description = array();
      foreach (Language::getLanguages() as $language) {
        $question[$language['id_lang']] = $value['question'];
        $answer[$language['id_lang']] = $value['answer'];
        $tags[$language['id_lang']] = $value['tags_faq'];
        $meta_title[$language['id_lang']] = $value['meta_title_faq'];
        $meta_description[$language['id_lang']] = $value['meta_description_faq'];
      }

      $obj_faq = new faqsPost();
      $obj_faq->id_gomakoil_faq_category = (int)$value['id_category'];
      $obj_faq->question = $question;
      $obj_faq->answer = $answer;
      $obj_faq->meta_title = $meta_title;
      $obj_faq->meta_description = $meta_description;
      $obj_faq->color = $value['color'];
      $obj_faq->most = $value['most'];
      $obj_faq->position = $value['position_faq'];
      $obj_faq->link_rewrite = $value['friendly_url_question'];
      $obj_faq->active = 1;
      $obj_faq->tags = $tags;
      $obj_faq->save();
    }

    return $res;
  }

  /**
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getOldCategories()
  {
    $sql = 'SELECT *
        FROM ' . _DB_PREFIX_ . 'gomakoil_faq_category bc';
    return Db::getInstance()->ExecuteS($sql);
  }

  /**
   * @return array|false|mysqli_result|null|PDOStatement|resource
   */
  public static function getOldFaqs()
  {
    $sql = 'SELECT *
        FROM ' . _DB_PREFIX_ . 'gomakoil_faq bc';
    return Db::getInstance()->ExecuteS($sql);
  }

  /**
   * @return bool
   */
  public static function uninstallOldDb()
  {
    //     delete table category
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq_category';
    Db::getInstance()->execute($sql);

    //     delete table post
    $sql = 'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'gomakoil_faq';
    Db::getInstance()->execute($sql);

    return true;
  }

  /**
   * @param $table_name
   * @return bool
   */
  public static function isTableExists($table_name)
  {
    $sql = "SHOW TABLES LIKE '" . _DB_PREFIX_ . pSQL($table_name) . "'";

    if (!Db::getInstance()->executeS($sql)) {
      return false;
    }

    return true;
  }

  /**
   * @param $table_name
   * @param $column_name
   * @return bool
   */
  public static function isColumnExists($table_name, $column_name)
  {
    $sql = 'SELECT NULL
       FROM INFORMATION_SCHEMA.COLUMNS
       WHERE table_name = "' . _DB_PREFIX_ . pSQL($table_name) .'"
       AND table_schema = "' . _DB_NAME_ . '"
       AND column_name = "' . pSQL($column_name) . '"';

    if (!Db::getInstance()->executeS($sql)) {
      return false;
    }

    return true;
  }

  /**
   * @return bool
   */
  private static function createStatusColumnsInShopTables()
  {
    if (!self::isColumnExists('gomakoil_faq_shop', 'active')) {
      $add_column_active_to_faq_shop_table = 'ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_shop
                                              ADD COLUMN `active` boolean NULL AFTER `id_shop`';

      if (!Db::getInstance()->execute($add_column_active_to_faq_shop_table)) {
        return false;
      }
    }

    if (!self::isColumnExists('gomakoil_faq_category_shop', 'active')) {
      $add_column_active_to_faq_category_shop_table = 'ALTER TABLE ' . _DB_PREFIX_ . 'gomakoil_faq_category_shop
                                              ADD COLUMN `active` boolean NULL AFTER `id_shop`';

      if (!Db::getInstance()->execute($add_column_active_to_faq_category_shop_table)) {
        return false;
      }
    }

    return true;
  }

  /**
   * @return bool
   */
  public static function migrateStatusColumnsValuesToShopTable()
  {
    if (!self::createStatusColumnsInShopTables()) {
      return false;
    }

    $all_categories = Db::getInstance()->executeS("SELECT * FROM " . _DB_PREFIX_ . "gomakoil_faq_category");

    foreach ($all_categories as $category) {
      $category_id = $category['id_gomakoil_faq_category'];
      $is_active_cat = $category['active'];

      $where = '`id_gomakoil_faq_category` = ' . (int)$category_id;

      $update_categories = Db::getInstance()->update('gomakoil_faq_category_shop', array('active' => (bool) $is_active_cat), $where);

      if (!$update_categories) {
        return false;
      }
    }

    $all_questions = Db::getInstance()->executeS("SELECT * FROM " . _DB_PREFIX_ . "gomakoil_faq");

    foreach ($all_questions as $question) {
      $question_id = $question['id_gomakoil_faq'];
      $is_active_question = $question['active'];

      $where = '`id_gomakoil_faq` = ' . (int)$question_id;

      $update_questions = Db::getInstance()->update('gomakoil_faq_shop', array('active' => (bool) $is_active_question), $where);

      if (!$update_questions) {
        return false;
      }
    }

    return true;
  }
}