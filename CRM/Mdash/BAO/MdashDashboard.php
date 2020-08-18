<?php
use CRM_Mdash_ExtensionUtil as E;

class CRM_Mdash_BAO_MdashDashboard extends CRM_Mdash_DAO_MdashDashboard {

  public static function getMdashDetails($mdashID) {
    $results = civicrm_api3('Mdash', 'get', [
      'mdash_id' => $mdashID,
      'return' => [
        'id',
        'title',
        'created_by',
        'is_active',
        'permission',
      ],
    ]);

    return $results;
  }

  /**
   * @return array
   */
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
        'id',
        'weight',
        'column_no',
        'mdash_id',
        'mdash_id.title',
        'mdash_id.created_by',
        'mdash_id.is_active',
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
        $dashlets[] = array(
          'dashboard_id' => $item['dashboard_id'],
          'weight' => $item['weight'],
          'column_no' => $item['column_no'],
          'name' => $item['dashboard_id.name'],
          'label' => $item['dashboard_id.label'],
          'url' => $item['dashboard_id.url'],
          'cache_minutes' => $item['dashboard_id.cache_minutes'],
          'fullscreen_url' => $item['dashboard_id.fullscreen_url'] ?? NULL,
        );
      }
    }

    // If empty, then initialize default dashlets for this user.
    if (!$results['count']) {
      // They may just have disabled all their dashlets. Check if any records exist for this contact.
      if (!civicrm_api3('DashboardContact', 'getcount', ['contact_id' => $contactID, 'dashboard_id.domain_id' => CRM_Core_Config::domainID()])) {
        $dashlets = CRM_Core_BAO_Dashboard::initializeDashlets();
      }
    }

    return $dashlets;
  }

  public static function getMdashDashletForJS($mdashID) {
    $data = [[], []];
    foreach (self::getMdashDashboardDashlet($mdashID) as $item) {
      $data[$item['column_no']][] = [
        'id' => (int) $item['dashboard_id'],
        'name' => $item['name'],
        'title' => $item['label'],
        'url' => CRM_Core_BAO_Dashboard::parseUrl($item['url']),
        'cacheMinutes' => $item['cache_minutes'],
        'fullscreenUrl' => CRM_Core_BAO_Dashboard::parseUrl($item['fullscreen_url']),
      ];
    }

    return $data;
  }

}
