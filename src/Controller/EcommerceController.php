<?php
/**
 * Created by PhpStorm.
 * User: manel
 * Date: 05/01/15
 * Time: 16:31
 */

namespace drupal_ecommerce\Controller;

use drupal_ecommerce\Adapters\CartDAO;
use drupal_ecommerce\Adapters\ProductDAO;
use malotor\ecommerce\EcommerceManager;

class EcommerceController {

  static public function addProductToCart($productID) {

    $productDAO = new ProductDAO();
    $cartDAO = new CartDAO();

    $ecommerceManager = new EcommerceManager($productDAO, $cartDAO);

    $ecommerceManager->addProductToCart($productID, 1);

    drupal_set_message(t("Product is added to your shooping cart"));

    drupal_goto();

  }
} 