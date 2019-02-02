<?php defined('FRTCFTYU') or die('No direct script access.');

/**
 * Storage controller
 * 
 */

class Controller_Storage extends Controller {
    
    protected $_template = 'layouts/index';
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function action_index() 
    {
        $this->_content['content'] = View::factory('storage/main')
                                        ->set('storage', Model::factory('Storage')->get_all()->_data)
                                        ->execute();
    }
    
    public function action_add() 
    {
        $model = Model::factory('Storage');
        
        $data = [
            'room' => (int)Security::xss_clean($_POST['room']),
            'stand' => (int)Security::xss_clean($_POST['stand']),
            'shelf' => (int)Security::xss_clean($_POST['shelf'])
        ];
        
        if (!empty($_POST['id'])) {
            $model = $model->where('id', '=', (int)$_POST['id']);
            $data['id'] = (int)$_POST['id'];
            $model->_data = $data;
            $model->update();
        } else {
            $model->insert($data);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    public function action_drop()
    {
       if ($this->route->params['id']) {
           $model = Model::factory('Storage')->delete((int)$this->route->params['id']);
       }
       header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}