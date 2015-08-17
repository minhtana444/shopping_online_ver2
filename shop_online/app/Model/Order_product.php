<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP BaseApiModel
 * @author tanmp
 */
class Order_product extends AppModel {
  var $name = 'Order_product'; 
   var $belongsTo = array(
        'Category' => array(
            'className'     => 'Product',
            'foreignKey'    => 'product_id'
        )
    );
}
