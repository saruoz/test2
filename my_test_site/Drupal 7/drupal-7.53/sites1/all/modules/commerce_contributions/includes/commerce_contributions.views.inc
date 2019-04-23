<?php

/**
 * Implementation of hook_views_api()
 */
function commerce_contributions_views_api() {
  return array(
      'api' => 3.0,
      'path' => drupal_get_path('module', 'commerce_contributions'),
  );
}

/**
 * Implementation of hook_views_data()
 */
function commerce_contributions_views_data() {
  $data = array();

  $data['commerce_contributions']['table'] = array(
      'group' => t("Commerce Contributions"),
  );


  $data['commerce_contributions']['table']['base'] = array(
      'field' => 'uid',
      'title' => 'Commerce Contributions',
  );

  $data['commerce_contributions']['uid'] = array(
      'title' => t('Contribution User Uid'),
      'help' => t('The User ID.'),
      'relationship' => array(
          'base' => 'users',
          'field' => 'uid',
          'handler' => 'views_handler_relationship',
          'label' => t('User Reference'),
      ),
      'field' => array(
          'handler' => 'views_handler_field',
          'click sortable' => TRUE,
      ),
      'filter' => array(
          'handler' => 'views_handler_filter_user_current',
      ),
      'sort' => array(
          'handler' => 'views_handler_sort',
      ),
      'argument' => array(
          'handler' => 'views_handler_argument',
      ),
  );

  $data['commerce_contributions']['entity_id'] = array(
      'title' => t('Contribution Entity ID'),
      'help' => t('Contribution Entity ID.'),
      'relationship' => array(
          'base' => 'node',
          'field' => 'entity_id',
          'handler' => 'views_handler_relationship',
          'label' => t('Entity Reference'),
      ),
      'field' => array(
          'handler' => 'views_handler_field',
          'click sortable' => TRUE,
      ),
      'filter' => array(
          'handler' => 'views_handler_field',
      ),
      'sort' => array(
          'handler' => 'views_handler_sort',
      ),
      'argument' => array(
          'handler' => 'views_handler_argument',
      ),
  );

  $data['commerce_contributions']['order_id'] = array(
      'title' => t('Contribution order id'),
      'help' => t('Contribution order id.'),
      'relationship' => array(
          'base' => 'commerce_order',
          'field' => 'order_id',
          'handler' => 'views_handler_relationship',
          'label' => t('Order Reference'),
      ),
      'field' => array(
          'handler' => 'views_handler_field',
          'click sortable' => TRUE,
      ),
      'filter' => array(
          'handler' => 'views_handler_field',
      ),
      'sort' => array(
          'handler' => 'views_handler_sort',
      ),
      'argument' => array(
          'handler' => 'views_handler_argument',
      ),
  );

  return $data;
}
