<?php
class Config
{
    private $vars;
    private static $instance;

    private function __construct() {
        $this->vars = array();
    }
    public function set($name, $value) {
        if(!isset($this->vars[$name])) {
            $this->vars[$name] = $value;
        }
    }
    public function get($name) {
        if(isset($this->vars[$name])) {
            return $this->vars[$name];
        }
    }
    public static function getInstance(){
        if (!isset(self::$instance)) {
            $class = __CLASS__; //otra forma
            self::$instance = new $class();
        }
        return self::$instance;
    }
}
/*
 Uso:
 $config = Config::getInstance();
 $config->set('host', 'locahost');
 echo $config->get('host'); //localhost

 $config2 = Config::getInstance();
 echo $config2->get('host'); //localhost
*/