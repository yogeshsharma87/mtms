<?php

class Mtms_Model extends \RedBeanPHP\SimpleModel
{
    protected static $_instance;
    protected $table;
    private $data;
 
    public function __get($varName){
 
        if (!array_key_exists($varName,$this->data)){
            //this attribute is not defined!
            throw new Exception('.....');
        }
        else return $this->data[$varName];
 
    }

    public function __set($varName,$value){
        $this->data[$varName] = $value;
    }

    public function load($id)
    {
    	$this->data = R::load($this->table, $id);
    	return $this;
    }

    public function getData()
    {
    	return $this->data;
    }

    public function update($data)
    {
    	foreach ($data as $key => $value) {
    		$this->data[$key] = $value;
    	}
    	$this->save();
    }

    public function save()
    {
    	R::store($this->data);
    }

    public function delete()
    {
    	R::trash($this->data);
    }

}