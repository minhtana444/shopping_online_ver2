<?php
/**
 *
 * PHP 5
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?= $this->Html->docType($this->request->sp ? 'html5' : 'xhtml-trans') ?>

<html class="md_js md_no-touch">

<head>

	<?= $this->Html->meta(['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=Edge,chrome=1']) ?>

<?php if ($this->request->sp) { ?>

	<?= $this->Html->meta(['charset' => 'utf-8']) ?>

<?php } else { ?>

	<?= $this->Html->meta(['http-equiv' => 'Content-Type', 'content' => 'text/html; charset=utf-8']) ?>

	<?= $this->Html->meta(['http-equiv' => 'Content-Style-Type', 'content' => 'text/css']) ?>

	<?= $this->Html->meta(['http-equiv' => 'Content-Script-Type', 'content' => 'text/javascript']) ?>

<?php } ?>


	<?= $this->Html->meta('description', @$description_for_layout ?: '') ?>

	<?= $this->Html->meta('keywords', @$keywords_for_layout ?: '') ?>


	<?= $this->fetch('meta') ?>

	<?= $this->fetch('css') ?>

	<?= $this->fetch('script') ?>


</head>

<?= $this->fetch('content') ?>

</html>
