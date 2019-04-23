<?php

/**
 * Contribution field form without the meter
 */
function commerce_contributions_contribute_only_form($form, &$form_state, $target_amount, $entity_id, $button_text, $contribute_text) {

  $form['amount'] = array(
      '#type' => 'textfield',
      '#title' => t('Amount'),
      '#default_value' => '',
      '#description' => t('Amount in ' . commerce_default_currency()),
      '#size' => 15,
      '#maxlength' => 15,
      '#required' => TRUE,
  );

  $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $button_text
  );

  $form['#contribute_text'] = $contribute_text;
  $form['#entity_id'] = $entity_id;

  return $form;
}

/**
 * Submit handler for the contribution form for the contribution without meter display format
 *
 * @see commerce_contributions_contribute_only_form()
 */
function commerce_contributions_contribute_only_form_submit($form, &$form_state) {

  global $user;

  commerce_contributions_create_order($form['#entity_id'], $form['#contribute_text'], $form_state['values']['amount'], $user);
}

/**
 * Contribution field form with a meter to show contributions
 */
function commerce_contributions_meter_contribute_form($form, &$form_state, $target_amount, $entity_id, $button_text, $contribute_text) {

  $contributions = commerce_contributions_calculate_contributions($entity_id);

  $form['#prefix'] = theme('commerce_contributions_meter', array('target_amount' => $target_amount, 'contributions' => $contributions));

  $form['amount'] = array(
      '#type' => 'textfield',
      '#title' => t('Amount'),
      '#default_value' => '',
      '#description' => t('Amount in ' . commerce_default_currency()),
      '#size' => 15,
      '#maxlength' => 15,
      '#required' => TRUE,
  );

  $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $button_text
  );

  $form['#contribute_text'] = $contribute_text;

  $form['#entity_id'] = $entity_id;

  return $form;
}

/**
 * Submit handler for the contribution form for the contribution meter display format
 *
 * @see commerce_contributions_meter_contribute_form()
 */
function commerce_contributions_meter_contribute_form_submit($form, &$form_state) {

  global $user;

  commerce_contributions_create_order($form['#entity_id'], $form['#contribute_text'], $form_state['values']['amount'], $user);
}

/**
 * Creates an order and adds a contribution line item to it and the contribution amount
 *
 * @param $entity_id
 * ID of the entity the user is contribution to
 *
 * @param $contribute_text
 * Contribute text entered when configuring the commerce contributions field
 *
 * @param $amount
 * Contribution amount
 *
 * @param $user
 * Contributing user
 */
function commerce_contributions_create_order($entity_id, $contribute_text, $amount, $user) {

  $order = ($user->uid) ? commerce_order_new($user->uid, 'checkout_checkout') : commerce_cart_order_new();

  commerce_order_save($order);

  $new_product = commerce_product_load_by_sku("contribution_do_not_delete");

  $line_item = commerce_product_line_item_new($new_product, 1, $order->order_id);

  commerce_line_item_save($line_item);

  $order_wrapper = entity_metadata_wrapper('commerce_order', $order);

  $order_wrapper->commerce_line_items[] = $line_item;

  $order_wrapper->save();

  $order->data['entity_id'] = $entity_id;

  $order->data['contribution_text'] = $contribute_text;

  $order->data['contribution_amount'] = $amount;

  $order->status = 'checkout_checkout';

  commerce_order_save($order);

  drupal_goto('checkout/' . $order->order_id);
}