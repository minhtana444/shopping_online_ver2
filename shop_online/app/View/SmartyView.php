<?php
App::import('Vendor', 'Smarty', array('file' => 'smarty'.DS.'Smarty.class.php'));
/**
 * Smarty View
 *
 * @link https://github.com/mtakaaki/smartyview
 */
class SmartyView extends View {

	function __construct(Controller $controller = null) {

		parent::__construct($controller);

		if (is_object($controller)) {
			$count = count($this->_passedVars);
			for ($j = 0; $j < $count; $j++) {
				$var = $this->_passedVars[$j];
				$this->{$var} = $controller->{$var};
			}
		}

		$this->ext = '.tpl';

		$this->Smarty = new Smarty();
		$this->Smarty->compile_dir = TMP.'smarty'.DS.'compile'.DS;
		$this->Smarty->cache_dir = TMP.'smarty'.DS.'cache'.DS;
		$this->Smarty->error_reporting = Configure::read('Error.level');
		$this->Smarty->debugging = false;
		$this->Smarty->compile_check = true;

		$this->Helpers = new HelperCollection($this);

	}

	protected function _render($___viewFn, $___dataForView = array()) {

		if (substr($___viewFn, -4, 4) == '.ctp') {
			return parent::_render($___viewFn, $___dataForView);
		}

		$trace = debug_backtrace();
		$caller = array_shift($trace);
		if ($caller === "element") parent::_render($___viewFn, $___dataForView);

		if (empty($___dataForView)) {
			$___dataForView = $this->viewVars;
		}

		extract($___dataForView, EXTR_SKIP);

		foreach($___dataForView as $data => $value) {
			if(!is_object($data)) {
				$this->Smarty->assign($data, $value);
			}
		}

		$this->Smarty->assign('View', $this);

		ob_start();
		$this->Smarty->display($___viewFn);

		return ob_get_clean();

	}

	public function loadHelpers() {

		$helpers = HelperCollection::normalizeObjectArray($this->helpers);
		foreach ($helpers as $name => $properties) {
			list($plugin, $class) = pluginSplit($properties['class']);
			$this->{$class} = $this->Helpers->load($properties['class'], $properties['settings']);
			$this->Smarty->assign($name, $this->{$class});
		}

		$this->_helpersLoaded = true;

	}

}
