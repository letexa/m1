<?php defined('FRTCFTYU') or die('No direct script access.');

/**
 * Audio controller
 * 
 */

class Controller_Audio extends Controller {
    
    protected $_template = 'layouts/index';
    
    public function __construct() 
    {
        parent::__construct();
    }
	
    public function action_add() 
    {
        $model = Model::factory('Audio');
        
        $image = File::upload();
        echo $image;
        
        $data = [
            'image' => $image ?: (string)Security::xss_clean($_POST['image']),
            'title' => (string)Security::xss_clean($_POST['title']),
            'author' => (string)Security::xss_clean($_POST['author']),
            'release_year' => (int)Security::xss_clean($_POST['release_year']),
            'duration' => (int)Security::xss_clean($_POST['duration']),
            'buy_date' => (string)Security::xss_clean($_POST['buy_date']),
            'cost' => (string)Security::xss_clean($_POST['cost']),
            'storage_id' => (int)Security::xss_clean($_POST['storage_id'])
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
           $model = Model::factory('Audio')->delete((int)$this->route->params['id']);
       }
       header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}