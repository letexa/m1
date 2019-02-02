<?php defined('FRTCFTYU') or die('No direct script access.');

/*
 * Audio model. 
 *
*/
class Model_Audio extends Model  {
    
    protected $_table = 'audio';

    public function __construct($dbname = null)
    {
        parent::__construct($this->_db);
    }
}