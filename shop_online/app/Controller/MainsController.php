<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class MainsController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    public function beforeFilter() {
        //parent::__construct($collection, $settings);
        //define log for logging API
        $this->Product = ClassRegistry::init('Product');
        $this->Order_product = ClassRegistry::init('Order_product');
    }

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function index() {
        $max_items = 8;

        $data = [];
        // danh sach san pham hot    
        $data['list_hot'] = $this->convertToVND($this->Product->find('all', array('conditions' => array('available !=' => 0, 
            'hour(TIMEDIFF(NOW(), `Product`.`update_date`))/24 <=' => 7),'order' => array('Product.order_count' => "DESC"), 'limit' => $max_items)));
        
        // danh sach san pham moi nhat
        $data['list_newest']  = $this->convertToVND($this->Product->find('all', array('conditions' => array('available !=' => 0 ) ,
            'order' => array('CURTIME() - Product.update_date' => "ASC"), 'limit' => $max_items))); 
        
        // danh sach san pham giam gia
        $data['list_discount'] = $this->convertToVND($this->Product->find('all', array('conditions' => array('available !=' => 0 ) ,
            'order' => array('Product.old_price - Product.new_price' => "DESC"), 'limit' => $max_items))); 
        
        // danh sach san pham yeu thich nhat
        $data['list_most_love'] = $this->convertToVND($this->Product->find('all',array('conditions' => array('available !=' => 0 ) ,
            'order' => array('Product.love' => "DESC"), 'limit' => $max_items))); 
        
        // danh sach san pham ban chay nhat
        $data['list_best_seller'] = $this->convertToVND($this->Product->find('all', array('conditions' => array('available !=' => 0 ) ,
            'order' => array('Product.order_count' => "DESC"), 'limit' => $max_items)));

      //  debug($data['list_hot']);
        $data['link_product'] = "/common_pc/img/Products/Clothes/";
        // set variable to view      
        $this->set('data', $data);
    }
    
    public function convertToVND($list_product){
       // debug($list_product);
        foreach( $list_product as $index => $product ) {
            $list_product[$index]['Product']['new_price_string'] = number_format($product['Product']['new_price'], 0,"",",");
            $list_product[$index]['Product']['new_price_string'] .= " VNĐ";
        }
        return $list_product;
    }
}
