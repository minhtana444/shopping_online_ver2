<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP BaseApiModel
 * @author tanmp
 */
class Product extends AppModel {
  var $name = 'Product'; 
   public $hasMany = array('Order_product' => array(
    'className' => 'Order_product',
    'foreignKey' => 'product_id',
    'conditions' => '',
    'fields' => '',
    'order' => '')
    );
}
