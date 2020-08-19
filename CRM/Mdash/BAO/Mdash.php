<?php
use CRM_Mdash_ExtensionUtil as E;

class CRM_Mdash_BAO_Mdash extends CRM_Mdash_DAO_Mdash {

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

}
