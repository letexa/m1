<?php defined('FRTCFTYU') or die('No direct script access.');

/*
 * Default controller
 *
*/

class Controller_Index extends Controller {
    
    protected $_template = 'layouts/index';
    
    public function __construct() 
    {
        parent::__construct();
    }
	
    /**
     * Index URL
     *
    */
    public function action_index() 
    {
        $this->_content['content'] = View::factory('index/main')
                                        ->set('storage', Model::factory('Storage')->get_all()->_data)
                                        ->set('audio', Model::factory('Audio')->get_all()->_data)
                                        ->execute();
    }
    
}