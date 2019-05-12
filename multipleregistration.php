<?php

require_once 'multipleregistration.civix.php';
use CRM_Multipleregistration_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function multipleregistration_civicrm_config(&$config) {
  _multipleregistration_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function multipleregistration_civicrm_xmlMenu(&$files) {
  _multipleregistration_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function multipleregistration_civicrm_install() {
  _multipleregistration_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function multipleregistration_civicrm_postInstall() {
  _multipleregistration_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function multipleregistration_civicrm_uninstall() {
  _multipleregistration_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function multipleregistration_civicrm_enable() {
  _multipleregistration_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function multipleregistration_civicrm_disable() {
  _multipleregistration_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function multipleregistration_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _multipleregistration_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function multipleregistration_civicrm_managed(&$entities) {
  _multipleregistration_civix_civicrm_managed($entities);
  $entities[] = [
    'module' => 'org.civicrm.multipleregistration',
    'name' => 'multipleregistration_customGroup',
    'entity' => 'CustomGroup',
    'update' => 'never',
    'params' => [
      'version' => 3,
      'name' => 'multipleregistration_customGroup',
      'title' => ts('Multiple registration'),
      'extends' => 'Event',
      'style' => 'Inline',
      'is_active' => 1,
      'is_reserved' => 1,
      'is_public' => 0,
    ],
  ];
  $entities[] = [
    'module' => 'org.civicrm.multipleregistration',
    'name' => 'multipleregistration_customField',
    'entity' => 'CustomField',
    'update' => 'never',
    'params' => [
      'version' => 3,
      'name' => 'multiple_registration',
      'label' => ts('Multiple registration from backoffice?'),
      'data_type' => 'Boolean',
      'html_type' => 'Radio',
      'is_active' => 1,
      'text_length' => 255,
      'default_value' => 0,
      'custom_group_id' => 'multipleregistration_customGroup',
      'help_post' => ts('If enabled, CiviCRM will allow to register participant for same contact from backoffice.'),
    ],
  ];
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function multipleregistration_civicrm_caseTypes(&$caseTypes) {
  _multipleregistration_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function multipleregistration_civicrm_angularModules(&$angularModules) {
  _multipleregistration_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function multipleregistration_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _multipleregistration_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function multipleregistration_civicrm_entityTypes(&$entityTypes) {
  _multipleregistration_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildForm
 */
function multipleregistration_civicrm_buildForm($formName, &$form) {
  if ('CRM_Custom_Form_CustomDataByType' == $formName
    && $form->getVar('_type') == 'Event'
  ) {
    CRM_Core_Resources::singleton()->addStyle(
      '.custom-group-multipleregistration_customGroup { display: none !important; }'
    );
  }

  if ('CRM_Event_Form_ManageEvent_Registration' == $formName) {
    $snippet = CRM_Utils_Request::retrieve('snippet', 'String');
    if (empty($snippet)) {
      return;
    }
    try {
      $customField = civicrm_api3('CustomField', 'getsingle', [
        'return' => ["id", 'label'],
        'custom_group_id' => "multipleregistration_customGroup",
        'name' => "multiple_registration",
      ]);
      $form->assign('multipleRegistration', "multiple_registration");
      $form->addYesNo(
        "multiple_registration",
        $customField['label']
      );
      CRM_Core_Region::instance('page-body')->add([
       'template' => 'CRM/MultipleRegistration/Form/common.tpl',
     ]);

     $default = [
       "multiple_registration" => 0,
     ];
     if ($form->getVar('_id')) {
       $default["multiple_registration"] = _multipleregistration_civicrm_mulitpleregistration(
         $form->getVar('_id'),
         $customField['id']
       );
     }
     $form->setDefaults($default);
    }
    catch (Exception $e) {
      //ignore exception.
    }
  }
}

/**
 * Get value of custom field multiple registration.
 */
function _multipleregistration_civicrm_mulitpleregistration($eventId, $customFieldId = NULL) {
  if (empty($customFieldId)) {
    $customFieldId = _multipleregistration_civicrm_getCustomFieldId();
  }
  if ($customFieldId) {
    try {
      return civicrm_api3('Event', 'getvalue', [
        'return' => "custom_{$customFieldId}",
        'id' => $eventId,
      ]);
    }
    catch (Exception $e) {
      // ignore exception
    }
  }
  return 0;
}

/**
 * Get custom field id of multiple registration.
 */
function _multipleregistration_civicrm_getCustomFieldId() {
  try {
    return civicrm_api3('CustomField', 'getvalue', [
      'return' => "id",
      'custom_group_id' => "multipleregistration_customGroup",
      'name' => "multiple_registration",
    ]);
  }
  catch (Exception $e) {
    // ignore exception
  }
  return;
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildForm
 */
function multipleRegistration_civicrm_postProcess($formName, &$form) {
  if ('CRM_Event_Form_ManageEvent_Registration' == $formName) {
    $submitValues = $form->_submitValues;
    if (isset($submitValues['multiple_registration'])) {
      $customFieldId = _multipleregistration_civicrm_getCustomFieldId();
      if (empty($customFieldId)) {
        return;
      }
      civicrm_api3('Event', 'create', [
        "custom_{$customFieldId}" => $submitValues['multiple_registration'],
        'id' => $form->getVar('_id'),
      ]);
      $form->ajaxResponse['updateTabs']['#tab_settings'] = 1;
    }
  }
}
