<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from C:\xampp2\htdocs\drupal\sites\default\files\civicrm\ext\com.joineryhq.mdash\xml/schema/CRM/Mdash/MdashDashboard.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:d39916951471817f599e65a7e43e2b48)
 */

/**
 * Database access object for the MdashDashboard entity.
 */
class CRM_Mdash_DAO_MdashDashboard extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_mdash_dashboard';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Unique MdashDashboard ID
   *
   * @var int
   */
  public $id;

  /**
   * Mdash ID
   *
   * @var int
   */
  public $mdash_id;

  /**
   * Dashboard ID
   *
   * @var int
   */
  public $dashboard_id;

  /**
   * column no for this widget
   *
   * @var int
   */
  public $column_no;

  /**
   * Is this widget active?
   *
   * @var bool
   */
  public $is_active;

  /**
   * Ordering of the widgets.
   *
   * @var int
   */
  public $weight;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_mdash_dashboard';
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'mdash_id', 'civicrm_mdash', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'dashboard_id', 'civicrm_dashboard', 'id');
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
          'description' => CRM_Mdash_ExtensionUtil::ts('Unique MdashDashboard ID'),
          'required' => TRUE,
          'where' => 'civicrm_mdash_dashboard.id',
          'table_name' => 'civicrm_mdash_dashboard',
          'entity' => 'MdashDashboard',
          'bao' => 'CRM_Mdash_DAO_MdashDashboard',
          'localizable' => 0,
        ],
        'mdash_id' => [
          'name' => 'mdash_id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => CRM_Mdash_ExtensionUtil::ts('Mdash ID'),
          'where' => 'civicrm_mdash_dashboard.mdash_id',
          'table_name' => 'civicrm_mdash_dashboard',
          'entity' => 'MdashDashboard',
          'bao' => 'CRM_Mdash_DAO_MdashDashboard',
          'localizable' => 0,
          'FKClassName' => 'CRM_Mdash_DAO_Mdash',
        ],
        'dashboard_id' => [
          'name' => 'dashboard_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => CRM_Mdash_ExtensionUtil::ts('Dashboard'),
          'description' => CRM_Mdash_ExtensionUtil::ts('Dashboard ID'),
          'required' => TRUE,
          'where' => 'civicrm_mdash_dashboard.dashboard_id',
          'table_name' => 'civicrm_mdash_dashboard',
          'entity' => 'MdashDashboard',
          'bao' => 'CRM_Mdash_DAO_MdashDashboard',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_Dashboard',
        ],
        'column_no' => [
          'name' => 'column_no',
          'type' => CRM_Utils_Type::T_INT,
          'title' => CRM_Mdash_ExtensionUtil::ts('Column No'),
          'description' => CRM_Mdash_ExtensionUtil::ts('column no for this widget'),
          'where' => 'civicrm_mdash_dashboard.column_no',
          'default' => '0',
          'table_name' => 'civicrm_mdash_dashboard',
          'entity' => 'MdashDashboard',
          'bao' => 'CRM_Mdash_DAO_MdashDashboard',
          'localizable' => 0,
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => CRM_Mdash_ExtensionUtil::ts('Dashlet is Active?'),
          'description' => CRM_Mdash_ExtensionUtil::ts('Is this widget active?'),
          'where' => 'civicrm_mdash_dashboard.is_active',
          'default' => '0',
          'table_name' => 'civicrm_mdash_dashboard',
          'entity' => 'MdashDashboard',
          'bao' => 'CRM_Mdash_DAO_MdashDashboard',
          'localizable' => 0,
        ],
        'weight' => [
          'name' => 'weight',
          'type' => CRM_Utils_Type::T_INT,
          'title' => CRM_Mdash_ExtensionUtil::ts('Order'),
          'description' => CRM_Mdash_ExtensionUtil::ts('Ordering of the widgets.'),
          'where' => 'civicrm_mdash_dashboard.weight',
          'default' => '0',
          'table_name' => 'civicrm_mdash_dashboard',
          'entity' => 'MdashDashboard',
          'bao' => 'CRM_Mdash_DAO_MdashDashboard',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'mdash_dashboard', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'mdash_dashboard', $prefix, []);
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