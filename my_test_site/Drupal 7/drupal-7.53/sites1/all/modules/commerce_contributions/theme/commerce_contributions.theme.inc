<?php

/**
 * Implementation of hook_theme()
 */
function commerce_contributions_theme() {
  return array(
      'commerce_contributions_meter' => array(
          'variables' => array('target_amount' => NULL, 'contributions' => NULL),
      ),
      'commerce_contributions_view_contributions' => array(
          'variables' => array(),
      ),
      'commerce_contributions_view_user_contributions' => array(
          'variables' => array('user' => NULL),
      ),
  );
}

function theme_commerce_contributions_meter($variables) {
  $target_amount = $variables['target_amount'];
  $contributions = $variables['contributions'];

  //height of the dynamic meter area
  $height = 324;

  $current_height = ($contributions * $height) / $target_amount;

  $current_amount_height = $current_height + 73;

  $html = '<div id="commerce_contributions_meter">
    <div id="commerce_contributions_contributions" style="height: ' . $current_height . 'px;"></div>
    <span id="amount1">' . commerce_currency_format($target_amount / 10, commerce_default_currency()) . '</span>
    <span id="amount2">' . commerce_currency_format(2 * $target_amount / 10, commerce_default_currency()) . '</span>
    <span id="amount3">' . commerce_currency_format(3 * $target_amount / 10, commerce_default_currency()) . '</span>
    <span id="amount4">' . commerce_currency_format(4 * $target_amount / 10, commerce_default_currency()) . '</span>
    <span id="amount5">' . commerce_currency_format(5 * $target_amount / 10, commerce_default_currency()) . '</span>
    <span id="amount6">' . commerce_currency_format(6 * $target_amount / 10, commerce_default_currency()) . '</span>
    <span id="amount7">' . commerce_currency_format(7 * $target_amount / 10, commerce_default_currency()) . '</span>
    <span id="amount8">' . commerce_currency_format(8 * $target_amount / 10, commerce_default_currency()) . '</span>
    <span id="amount9">' . commerce_currency_format(9 * $target_amount / 10, commerce_default_currency()) . '</span>
    <span id="amount10">' . commerce_currency_format($target_amount, commerce_default_currency()) . '</span>
    <span id="current_amount" style="bottom: ' . $current_amount_height . 'px;">' . commerce_currency_format($contributions, commerce_default_currency()) . '</span>
    </div>';

  return $html;
}

function theme_commerce_contributions_view_contributions($variables) {

  $header = array(t("Date"), t("Contribute To"), t("Amount"));

  $rows = array();

  $result = db_query("SELECT * FROM {commerce_contributions}");

  foreach ($result as $row) {
    $order = commerce_order_load($row->order_id);
    if (isset($order->data['entity_id'])) {
      $node = node_load($order->data['entity_id']);
      $rows[] = array(
          date('d:m:Y g:i:s A', $order->changed),
          $node->title,
          commerce_currency_format($order->commerce_order_total['und'][0]['amount'], commerce_default_currency())
      );
    }
  }

  return theme('table', array('header' => $header, 'rows' => $rows));
}

function theme_commerce_contributions_view_user_contributions($variables) {

  $edit_user = $variables['user'];

  global $user;

  if ($user->uid == 1 || user_access('access all contributions', $user) || $edit_user->uid == $user->uid) {

    $header = array(t("Date"), t("Contribute To"), t("Amount"));

    $rows = array();

    $result = db_query("SELECT * FROM {commerce_contributions}");

    foreach ($result as $row) {
      $order = commerce_order_load($row->order_id);
      if (isset($order->uid) && $order->uid == $edit_user->uid) {
        if (array_key_exists('entity_id', $order->data)) {
          $node = node_load($order->data['entity_id']);
          $rows[] = array(
              date('d:m:Y g:i:s A', $order->changed),
              $node->title,
              commerce_currency_format($order->commerce_order_total['und'][0]['amount'], commerce_default_currency())
          );
        }
      }
    }

    return theme('table', array('header' => $header, 'rows' => $rows));
  }
}