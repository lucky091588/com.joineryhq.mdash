<?php
use CRM_Mdash_ExtensionUtil as E;

class CRM_Mdash_BAO_MdashDashboard extends CRM_Mdash_DAO_MdashDashboard {

  /**
   * @return array
   */
  public static function getContactDashletsForJS($mdashID) {
    // Get contact dashboard dashlets.
    $results = civicrm_api3('MdashDashboard', 'get', [
      'mdash_id' => $mdashID,
      'return' => [
        'id',
        'column_no',
        'is_active',
        'weight',
        'mdash_id',
        'mdash_id.title',
        'mdash_id.created_by',
        'mdash_id.is_active',
        'mdash_id.permission',
      ],
    ]);

    return $results;
  }

}
