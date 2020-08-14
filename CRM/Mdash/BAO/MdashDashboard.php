<?php
use CRM_Mdash_ExtensionUtil as E;

class CRM_Mdash_BAO_MdashDashboard extends CRM_Mdash_DAO_MdashDashboard {

  /**
   * Create a new MdashDashboard based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_Mdash_DAO_MdashDashboard|NULL
   *
  public static function create($params) {
    $className = 'CRM_Mdash_DAO_MdashDashboard';
    $entityName = 'MdashDashboard';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */

}
