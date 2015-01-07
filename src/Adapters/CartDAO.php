<?php
/**
 * Created by PhpStorm.
 * User: manel
 * Date: 05/01/15
 * Time: 23:37
 */

namespace drupal_ecommerce\Adapters;

use malotor\ecommerce\CartDAOInterface;
use malotor\ecommerce\Cart;

class CartDAO implements CartDAOInterface {
  public function get() {
    if (isset($_SESSION['shooping_cart'])) {
      return unserialize($_SESSION['shooping_cart']);
    }
    return new Cart();
  }
  public function save($cart) {
    $_SESSION['shooping_cart'] = serialize($cart);
    return true;
  }
} 