<?php

/**
 * Implementation of hook_default_rules_configuration()
 */
function commerce_contributions_default_rules_configuration() {

  $rules = array();
  $rule = rules_reaction_rule();

  $rule->label = t('Adds contributed amount when order is completed');
  $rule->active = TRUE;

  $rule->event('commerce_checkout_complete')
          ->action('commerce_contributions_update_contributed_amount', array(
              'commerce_order:select' => 'commerce-order',
  ));

  $rules['commerce_contributions_update_contributed_amount'] = $rule;

  $rule = rules_reaction_rule();
  $rule->label = t('update the line item price');
  $rule->active = TRUE;

  $rule->event('commerce_product_calculate_sell_price')
          ->action('commerce_contributions_update_sell_price', array(
              'commerce_line_item:select' => 'commerce-line-item',
  ));

  $rules['commerce_contributions_update_sell_price'] = $rule;

  return $rules;
}

/**
 * Implementation of hook_rules_action_info()
 */
function commerce_contributions_rules_action_info() {
  $actions = array();

  $actions['commerce_contributions_update_contributed_amount'] = array(
      'label' => t('Update contributed amount'),
      'parameter' => array(
          'commerce_order' => array(
              'type' => 'commerce_order',
              'label' => t('Contribute Order'),
          ),
      ),
      'group' => t('Commerce Contributions'),
      'callbacks' => array(
          'execute' => 'commerce_contributions_rules_update_contributed_amount',
      ),
  );

  $actions['commerce_contributions_update_sell_price'] = array(
      'label' => t('Update sell Price'),
      'parameter' => array(
          'commerce_line_item' => array(
              'type' => 'commerce_line_item',
              'label' => t('Line Item'),
          ),
      ),
      'group' => t('Commerce Contributions'),
      'callbacks' => array(
          'execute' => 'commerce_contributions_rules_update_sell_price',
      ),
  );

  return $actions;
}

function commerce_contributions_rules_update_contributed_amount($order) {

  if (array_key_exists('contribution_amount', $order->data)) {

    global $user;

    $contribution = new stdClass();

    $contribution->uid = $order->uid;

    $contribution->entity_id = $order->data['entity_id'];

    $contribution->order_id = $order->order_id;

    drupal_write_record('commerce_contributions', $contribution);
  }
}

function commerce_contributions_rules_update_sell_price($line_item) {
  if (!function_exists("commerce_line_item_unit_price_amount")) {
    include_once(drupal_get_path('module', 'commerce') . '/modules/line_item/commerce_line_item.rules.inc');
  }
  $order = commerce_order_load($line_item->order_id);
  if (isset($order->data['contribution_amount'])) {
    commerce_line_item_unit_price_amount($line_item, ($order->data['contribution_amount'] * 100), 'base_price', 0);
  }
}