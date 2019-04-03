<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Kim Testa @https://github.com/TK-Works
 * @copyright 2019
 * @license MIT Open-source
 *  
 * Main class controller, will be loading pages under views/<class_name>
 */
class Main extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('vue_model','vue');
	}
	
	/**
	 * @method index()
	 * @return null
	 * Method will load under views/<class_name>/<method_name>.php
	 * All data handling should be passed under $this->view_data['key' => 'value']
	 * Data value will be accessed at view via @$key
	 * @ identifier denotes that the variable is a server variable
	 */
	
	public function index() {//function name should be same on target view file e.g.(application/views/pages/index.php)
		$this->view_data = [
			"title" => "CodeIgniter + VueJS!", //page title
			"styles" => [
				//"", //css to load while omitting .css file extension
			],
			"scripts" => [
				//"", //js to load while omitting .js file extension
			]
		];  
	}
	
}
