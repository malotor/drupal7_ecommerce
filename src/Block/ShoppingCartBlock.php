<?php
/**
 * Created by PhpStorm.
 * User: manel
 * Date: 05/01/15
 * Time: 23:52
 */
namespace drupal_ecommerce\Block;

use drupal_ecommerce\Adapters\CartDAO;
use drupal_ecommerce\Adapters\ProductDAO;
use malotor\ecommerce\EcommerceManager;

class ShoppingCartBlock {

  public function build() {

    $productDAO = new ProductDAO();
    $cartDAO = new CartDAO();

    $ecommerceManager = new EcommerceManager($productDAO, $cartDAO);
    $shoppingCart = $ecommerceManager->getCart();

    $chartIterator = $shoppingCart->getIterator();
    foreach ($chartIterator as $key => $cartline) {
      $items[] = $cartline->getQuantity() . ' x ' . $cartline->getItem()->getName();
    }

    return array(
      '#items' => $items,
      '#theme' => 'item_list',
    );

  }
} 