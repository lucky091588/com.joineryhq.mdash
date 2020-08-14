-- +--------------------------------------------------------------------+
-- | Copyright CiviCRM LLC. All rights reserved.                        |
-- |                                                                    |
-- | This work is published under the GNU AGPLv3 license with some      |
-- | permitted exceptions and without any warranty. For full license    |
-- | and copyright information, see https://civicrm.org/licensing       |
-- +--------------------------------------------------------------------+
--
-- Generated from schema.tpl
-- DO NOT EDIT.  Generated by CRM_Core_CodeGen
--


-- +--------------------------------------------------------------------+
-- | Copyright CiviCRM LLC. All rights reserved.                        |
-- |                                                                    |
-- | This work is published under the GNU AGPLv3 license with some      |
-- | permitted exceptions and without any warranty. For full license    |
-- | and copyright information, see https://civicrm.org/licensing       |
-- +--------------------------------------------------------------------+
--
-- Generated from drop.tpl
-- DO NOT EDIT.  Generated by CRM_Core_CodeGen
--
-- /*******************************************************
-- *
-- * Clean up the exisiting tables
-- *
-- *******************************************************/

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `civicrm_mdash_dashboard`;
DROP TABLE IF EXISTS `civicrm_mdash`;

SET FOREIGN_KEY_CHECKS=1;
-- /*******************************************************
-- *
-- * Create new tables
-- *
-- *******************************************************/

-- /*******************************************************
-- *
-- * civicrm_mdash
-- *
-- * Additional dashboards
-- *
-- *******************************************************/
CREATE TABLE `civicrm_mdash` (


     `id` int unsigned NOT NULL AUTO_INCREMENT  COMMENT 'Unique Mdash ID',
     `title` varchar(64)    ,
     `created_by` int unsigned    COMMENT 'FK to Contact',
     `is_active` tinyint   DEFAULT 0 ,
     `permission` varchar(255)    COMMENT 'Permission for the dashlet',
     `permission_operator` varchar(3)    COMMENT 'Permission Operator' 
,
        PRIMARY KEY (`id`)
 
 
,          CONSTRAINT FK_civicrm_mdash_created_by FOREIGN KEY (`created_by`) REFERENCES `civicrm_contact`(`id`) ON DELETE CASCADE  
)    ;

-- /*******************************************************
-- *
-- * civicrm_mdash_dashboard
-- *
-- * Which dashlets appear on which dashboard
-- *
-- *******************************************************/
CREATE TABLE `civicrm_mdash_dashboard` (


     `id` int unsigned NOT NULL AUTO_INCREMENT  COMMENT 'Unique MdashDashboard ID',
     `mdash_id` int unsigned    COMMENT 'Mdash ID',
     `dashboard_id` int unsigned NOT NULL   COMMENT 'Dashboard ID',
     `column_no` int   DEFAULT 0 COMMENT 'column no for this widget',
     `is_active` tinyint   DEFAULT 0 COMMENT 'Is this widget active?',
     `weight` int   DEFAULT 0 COMMENT 'Ordering of the widgets.' 
,
        PRIMARY KEY (`id`)
 
 
,          CONSTRAINT FK_civicrm_mdash_dashboard_mdash_id FOREIGN KEY (`mdash_id`) REFERENCES `civicrm_mdash`(`id`) ON DELETE CASCADE,          CONSTRAINT FK_civicrm_mdash_dashboard_dashboard_id FOREIGN KEY (`dashboard_id`) REFERENCES `civicrm_dashboard`(`id`) ON DELETE CASCADE  
)    ;

 