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
class PagesController extends AppController {

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

        debug($this->Product->find('all'));
        debug($this->Order_product->find('all'));
        $data = [];
        if ($this->request->is('post')) {
            if (isset($this->request->data['captcha_text'])) {
                if ($this->request->data['captcha_text'] == $this->Session->read('captcha')) {
                    $data['errorCaptcha'] = "true";
                } else {
                    $data['errorCaptcha'] = "false";
                }
            }
        }
        $this->set('data', $data);
    }

    function captcha_image() {
        //import the captcha from vendor folder
        App::import('Vendor', 'captcha/captcha');
        //render captcha to view
        $captcha = new captcha();
        //generate text 
        $captcha->generateText();
        //save this text to session
        $this->Session->write('captcha', $captcha->getText());
        //Clean (erase) the output buffer
        ob_clean();
        //render captcha to view
        $captcha->show_captcha();
        //not show view of captcha_image action
        $this->autoRender = false;
    }

}
