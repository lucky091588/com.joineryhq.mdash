<?php
use CRM_Mdash_ExtensionUtil as E;

class CRM_Mdash_Page_Mdashlet extends CRM_Core_Page {

  public function run() {
    CRM_Utils_System::setTitle(ts('Dashlets'));

    $this->assign('admin', CRM_Core_Permission::check('administer CiviCRM'));

    // get all dashlets
    $allDashlets = CRM_Core_BAO_Dashboard::getDashlets(FALSE);

    // get dashlets for logged in contact
    $currentDashlets = CRM_Core_BAO_Dashboard::getContactDashlets();
    $contactDashlets = $availableDashlets = [];

    foreach ($currentDashlets as $item) {
      $key = "{$item['dashboard_id']}-0";
      $contactDashlets[$item['column_no']][$key] = [
        'label' => $item['label'],
        'is_reserved' => $allDashlets[$item['dashboard_id']]['is_reserved'],
      ];
      unset($allDashlets[$item['dashboard_id']]);
    }

    foreach ($allDashlets as $dashletID => $values) {
      $key = "{$dashletID}-0";
      $availableDashlets[$key] = [
        'label' => $values['label'],
        'is_reserved' => $values['is_reserved'],
      ];
    }

    $this->assign('contactDashlets', $contactDashlets);
    $this->assign('availableDashlets', $availableDashlets);

    return parent::run();
  }

}
