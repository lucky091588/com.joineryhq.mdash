<?php
use CRM_Mdash_ExtensionUtil as E;

class CRM_Mdash_BAO_MdashDashboard extends CRM_Mdash_DAO_MdashDashboard {

  public static function getMdashDashboardDashlet($mdashID) {
    // Get contact dashboard dashlets.
    $dashlets = [];

    $results = civicrm_api3('MdashDashboard', 'get', [
      'mdash_id' => $mdashID,
      'is_active' => 1,
      'mdash_id.is_active' => 1,
      'dashboard_id.is_active' => 1,
      'dashboard_id.domain_id' => CRM_Core_Config::domainID(),
      'options' => ['sort' => 'weight', 'limit' => 0],
      'return' => [
        'column_no',
        'mdash_id',
        'mdash_id.permission',
        'mdash_id.permission_operator',
        'dashboard_id',
        'dashboard_id.name',
        'dashboard_id.label',
        'dashboard_id.url',
        'dashboard_id.fullscreen_url',
        'dashboard_id.cache_minutes',
        'dashboard_id.permission',
        'dashboard_id.permission_operator',
      ],
    ]);

    foreach ($results as $item) {
      if (
        CRM_Core_BAO_Dashboard::checkPermission(CRM_Utils_Array::value('dashboard_id.permission', $item), CRM_Utils_Array::value('dashboard_id.permission_operator', $item))
        && CRM_Core_BAO_Dashboard::checkPermission(CRM_Utils_Array::value('mdash_id.permission', $item), CRM_Utils_Array::value('mdash_id.permission_operator', $item))
      ) {
        $dashlets[$item['column_no']][] = array(
          'id' => $item['dashboard_id'],
          'name' => $item['dashboard_id.name'],
          'title' => $item['dashboard_id.label'],
          'url' => $item['dashboard_id.url'],
          'cacheMinutes' => $item['dashboard_id.cache_minutes'],
          'fullscreenUrl' => $item['dashboard_id.fullscreen_url'] ?? NULL,
        );
      }
    }

    return $dashlets;
  }

}
