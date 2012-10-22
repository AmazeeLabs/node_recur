<?php

/**
 * Implements hook_node_recur_access_alter().
 *
 * Alter the access control for the node recur form
 * 
 * @param &$access
 *   Boolean status of access for the current user.
 * @param $node
 *   The node being recurred.
 */
function hook_node_recur_access_alter(&$access, $node) {
  if ($node->type == 'story') {
    $access = TRUE;
  }
}

/**
 * Implements hook_node_recur_batch_redirect_alter().
 *
 * Alter redirect path after a batch operation. This is only invoked
 * when recurring existing nodes, not new nodes.
 * 
 * @param &$path
 *   The path that the user will be redirected to after recurring a node.
 * @param $nid
 *    The nid of the node being recurred.
 */
function hook_node_recur_batch_redirect_alter(&$path, $nid = NULL) {
  $path = 'node/' . $nid . '/edit';
}

/**
 * Implements hook_node_recur_validate_dates().
 *
 * This hook is invoked when validating the node recur date form. It will
 * only be called if there are no recorded validation errors found by
 * this module.
 *
 * @param $node
 *   The node being recurred.
 * @param $form_state
 *   The form's form state array.
 * @return
 *   An array of errors to be printed to the screen. Each error is an 
 *   array with the keys 'field' (the name of the field) and 'error'
 *   (the message to print to the screen).
 */
function hook_node_recur_validate_dates($node, $form_state) {
  $errors = array();
  if ($node->type == 'class') {
    if ($form_state['values']['option'] == 'days') {
      if (isset($form_state['values']['days']['monday'])) {
        $errors[] = array(
          'field' => 'days',
          'message' => t('Classes cannot occur on Monday.'),
        );
      }
      if (isset($form_state['values']['days']['tuesday'])) {
        $errors[] = array(
          'field' => 'days',
          'message' => t('Classes cannot occur on Tuesday.'),
        );
      }
    }
  }
  return $errors;
}
