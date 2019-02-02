<?php defined('FRTCFTYU') or die('No direct script access.');

/*
 * Storage model. 
 *
*/
class Model_Storage extends Model  {
    
    protected $_table = 'storage';

    public function __construct($dbname = null)
    {
        parent::__construct($this->_db);
    }
}