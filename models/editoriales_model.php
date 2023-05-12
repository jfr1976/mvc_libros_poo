<?php

class Editoriales_Model
{
   protected $db;

   public function __construct() {
      $this->db = DBManager::getInstance()->getConnection();

   }
   
   function getEditoriales() {
      
      $result = $this->db->query('SELECT id, nombre FROM editoriales');
      $editoriales = $result->fetchAll();
      return $editoriales;

   }
   function listEditoriales(){
   
      $result = $this->db->query('SELECT logo, nombre, direccion, telefono FROM editoriales');
      $libros = array();
      $editoriales = $result->fetchAll();
      return $editoriales;
   }
}

?>