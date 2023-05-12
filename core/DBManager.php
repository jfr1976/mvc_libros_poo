<?php
class DBManager
{
  // Contenedor de la instancia de la Clase
  private static $instance;
  private $db;
  //Previene creacion de objetos via new
  private function __construct() { }
  // Única forma para obtener el objeto singleton
  public static function getInstance ()
  {
    if ( is_null ( self::$instance) ) {
       self::$instance = new self();
    }
    return self::$instance;
  }
  public function getConnection () {
    if (is_null($this->db)) {
      $config = Config::getInstance();
      $host = $config->get('dbhost');
      $dbname = $config->get('dbname');
      $dbuser = $config->get('dbuser');
      $dbpass = $config->get('dbpass');
      $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
                         $dbuser, $dbpass);
      $this->db->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);
      $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
                        PDO::FETCH_ASSOC);
    }
    return $this->db;
 }
}