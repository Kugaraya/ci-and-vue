<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    /**
     * The default view this is where the content view will yield
     * @var string
     */
    protected $layoutView = "application";

    /**
     * Sets a specific content view to be render
     * @var string
     */
    protected $contentView = "";

    /**
     * Data container this will hold any data that will be pass on the view
     * @var array
     */
    protected $view_data = array();


    /**
     * MY Controller class contructor
     */
    public function __construct()
    {
        parent::__construct();
        // Logic for determining log-in user account
    }
	
    public function _output($output)
    {
        $render = NULL;

		// Set the content view
		$this->contentView = ($this->contentView !== FALSE && empty($this->contentView))
			? $this->router->class . "/" . $this->router->method
			: $this->contentView;

		// Render the content view
		$yield = (file_exists(APPPATH . 'views/'. $this->contentView . '.php'))
			? $this->load->view($this->contentView, $this->view_data, TRUE)
			: FALSE;

		// Render the layout view
		if ($yield) {
			$render = $this->load->view('layout/' . $this->layoutView, ['yield' => $yield], TRUE);
		} else {
			$render = $output;
		}

		echo $render;


    }
}