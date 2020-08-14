<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from C:\xampp2\htdocs\drupal\sites\default\files\civicrm\ext\com.joineryhq.mdash\xml/schema/CRM/Mdash/Mdash.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:52ab400f11a8f4f20a916d73efd8f477)
 */

/**
 * Database access object for the Mdash entity.
 */
class CRM_Mdash_DAO_Mdash extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_mdash';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Unique Mdash ID
   *
   * @var int
   */
  public $id;

  /**
   * @var string
   */
  public $title;

  /**
   * FK to Contact
   *
   * @var int
   */
  public $created_by;

  /**
   * @var bool
   */
  public $is_active;

  /**
   * Permission for the dashlet
   *
   * @var string
   */
  public $permission;

  /**
   * Permission Operator
   *
   * @var string
   */
  public $permission_operator;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_mdash';
    parent::__construct();
  }

  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  public static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'created_by', 'civicrm_contact', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => CRM_Mdash_ExtensionUtil::ts('Unique Mdash ID'),
          'required' => TRUE,
          'where' => 'civicrm_mdash.id',
          'table_name' => 'civicrm_mdash',
          'entity' => 'Mdash',
          'bao' => 'CRM_Mdash_DAO_Mdash',
          'localizable' => 0,
        ],
        'title' => [
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => CRM_Mdash_ExtensionUtil::ts('Title'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_mdash.title',
          'table_name' => 'civicrm_mdash',
          'entity' => 'Mdash',
          'bao' => 'CRM_Mdash_DAO_Mdash',
          'localizable' => 0,
        ],
        'created_by' => [
          'name' => 'created_by',
          'type' => CRM_Utils_Type::T_INT,
          'title' => CRM_Mdash_ExtensionUtil::ts('Created By'),
          'description' => CRM_Mdash_ExtensionUtil::ts('FK to Contact'),
          'where' => 'civicrm_mdash.created_by',
          'table_name' => 'civicrm_mdash',
          'entity' => 'Mdash',
          'bao' => 'CRM_Mdash_DAO_Mdash',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'where' => 'civicrm_mdash.is_active',
          'default' => '0',
          'table_name' => 'civicrm_mdash',
          'entity' => 'Mdash',
          'bao' => 'CRM_Mdash_DAO_Mdash',
          'localizable' => 0,
        ],
        'permission' => [
          'name' => 'permission',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => CRM_Mdash_ExtensionUtil::ts('Dashlet Permission'),
          'description' => CRM_Mdash_ExtensionUtil::ts('Permission for the dashlet'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_mdash.permission',
          'table_name' => 'civicrm_mdash',
          'entity' => 'Mdash',
          'bao' => 'CRM_Mdash_DAO_Mdash',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_COMMA,
        ],
        'permission_operator' => [
          'name' => 'permission_operator',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => CRM_Mdash_ExtensionUtil::ts('Dashlet Permission Operator'),
          'description' => CRM_Mdash_ExtensionUtil::ts('Permission Operator'),
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'where' => 'civicrm_mdash.permission_operator',
          'table_name' => 'civicrm_mdash',
          'entity' => 'Mdash',
          'bao' => 'CRM_Mdash_DAO_Mdash',
          'localizable' => 0,
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  public static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }

  /**
   * Returns the names of this table
   *
   * @return string
   */
  public static function getTableName() {
    return self::$_tableName;
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'mdash', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'mdash', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}