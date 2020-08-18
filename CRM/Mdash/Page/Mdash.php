<?php
use CRM_Mdash_ExtensionUtil as E;

class CRM_Mdash_Page_Mdash extends CRM_Core_Page {

  public function run() {
    // Add dashboard js and css
    $resources = CRM_Core_Resources::singleton();
    $resources->addScriptFile('civicrm', 'js/jquery/jquery.dashboard.js', 0, 'html-header', FALSE);
    $resources->addStyleFile('civicrm', 'css/dashboard.css');
    // $this->assign('contactDashlets', CRM_Core_BAO_Dashboard::getContactDashletsForJS());
    $mdashDetails = CRM_Mdash_BAO_MdashDashboard::getMdashDetails($_GET['mdid']);
    $this->assign('contactDashlets', CRM_Mdash_BAO_MdashDashboard::getMdashDashletForJS($_GET['mdid']));

    CRM_Utils_System::setTitle(ts($mdashDetails[$_GET['mdid']]['title']));
    $contactID = CRM_Core_Session::getLoggedInContactID();

    // call hook to get html from other modules
    // ignored but needed to prevent warnings
    $contentPlacement = CRM_Utils_Hook::DASHBOARD_BELOW;
    $html = CRM_Utils_Hook::dashboard($contactID, $contentPlacement);
    if (is_array($html)) {
      $this->assign_by_ref('hookContent', $html);
      $this->assign('hookContentPlacement', $contentPlacement);
    }

    $communityMessages = CRM_Core_CommunityMessages::create();
    if ($communityMessages->isEnabled()) {
      $message = $communityMessages->pick();
      if ($message) {
        $this->assign('communityMessages', $communityMessages->evalMarkup($message['markup']));
      }
    }

    return parent::run();
  }

}
