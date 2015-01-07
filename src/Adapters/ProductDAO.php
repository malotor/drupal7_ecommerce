<?php
/**
 * Created by PhpStorm.
 * User: manel
 * Date: 05/01/15
 * Time: 23:36
 */

namespace drupal_ecommerce\Adapters;

use malotor\ecommerce\ProductDAOInterface;
use malotor\ecommerce\Product;
use Symfony\Component\Config\Definition\Exception\Exception;

class ProductDAO implements ProductDAOInterface  {
  public function get($productID) {

    if (!$node = node_load($productID)) {
      throw new Exception(t('Doesn´t exists any Product with that id'));
    }

    /**
     * @todo Create a product factory
     */
    $product = new Product();
    $product->setName($node->title)
      ->setReference($this->getFieldValue('reference',$node))
      ->setPrice((float) $this->getFieldValue('price',$node))
      ->setDescription($this->getFieldValue('description',$node));

    return $product;
  }

  public function save($product) {
    return true;
  }


  protected function getFieldValue($fieldName,$node) {
    $field = field_get_items('node',$node, $fieldName);
    return $field[0]['value'];
  }
}