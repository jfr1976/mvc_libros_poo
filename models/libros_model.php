<?php
class Libros_Model
{
   protected $db;

   public function __construct() {
      $this->db = DBManager::getInstance()->getConnection();
   }

   function getLibros()  {
      
      
      $result = $this->db->query('SELECT portada, id, titulo, precio, isbn, descripcion, editorial, n_pags FROM libros');
      $libros = array();
      $libros = $result->fetchAll();
      return $libros;
      
      
   }

   function getLibro($id) {
      $query = 'SELECT * FROM libros WHERE id = ?';
      $stmt = $this->db->prepare($query);
      $stmt->execute(array($id));
      $libro = $stmt->fetch();
      return $libro;
   }

   function deleteLibro($id)
{

      $query = 'DELETE FROM libros WHERE id = ?';
      $stmt = $this->db->prepare($query);
      $stmt->execute(array($id));

}

function saveLibro($datos)
{
    
   

   /*$isbn = isset($datos['isbn']) ? $datos['isbn'] : null;
   $titulo = isset($datos['titulo']) ? $datos['titulo'] : null;
   $descripcion = isset($datos['descripcion']) ? $datos['descripcion'] : null;
   $editorial = isset($datos['editorial']) ? $datos['editorial'] : null;
   $n_pags = isset($datos['n_pags']) ? $datos['n_pags'] : null;
   $precio = isset($datos['precio']) ? $datos['precio'] : null;
   $portada = isset($datos['portada']) ? $datos['portada'] : null;*/

   if (!isset($datos['codigo'])){

      $nombre_temp = $_FILES["file_upload"]["tmp_name"];
      

      if ($nombre_temp != ""){

         $nuevo_nombre = $datos['isbn'].".jpg";
         $config2 = Config::getInstance();
         $destino = $config2->get('IMAGES_FOLDER') . $nuevo_nombre;

          if (move_uploaded_file($nombre_temp, $destino)){

              $mensaje = "Archivo subido correctamente";
              echo '<span>'. $mensaje . '</span>';
          
          }else {

              $msg = $err_msg[$_FILES['file_upload']['error']];
              echo '<span>'. $msg . '</span>';
          }
          $datos['portada'] = $nuevo_nombre;
      }
   

       
       $query = 'INSERT INTO libros (isbn, titulo, descripcion, editorial, n_pags, precio, portada) VALUES (:isbn, :titulo, :descripcion, :editorial, :n_pags, :precio, :portada)';
       $stmt = $this->db->prepare($query);
       $stmt->execute(

   [

       
       'isbn' => $datos['isbn'],
       'titulo' => $datos['titulo'],
       'descripcion' => $datos['descripcion'],
       'editorial'=>$datos['editorial'],
       'n_pags' => $datos['n_pags'],
       'precio' => $datos['precio'],
       'portada' => $datos['portada'],

   ]
   );



}else if ($_SERVER['REQUEST_METHOD']=='POST'){

   
   
   $nombre_temp = $_FILES["file_upload"]["tmp_name"];

   if ($nombre_temp != ""){

       $nuevo_nombre = $datos['isbn'].".jpg";
       $config2 = Config::getInstance();
       $destino = $config2->get('IMAGES_FOLDER') . $nuevo_nombre;

       if (move_uploaded_file($nombre_temp, $destino)){

           $mensaje = "Archivo subido correctamente";
           echo '<span>'. $mensaje . '</span>';
            
       }else {

           $msg = $err_msg[$_FILES['file_upload']['error']];
           echo '<span>'. $msg . '</span>';
       }

       $datos['portada'] = $nuevo_nombre;
   }
       
       $query = 'UPDATE libros SET isbn = :isbn, titulo = :titulo, descripcion = :descripcion, editorial = :editorial, n_pags = :n_pags, precio = :precio, portada = :portada WHERE id = :codigo';
       $stmt = $this->db->prepare($query);
       $stmt->execute(
       
   [

       'codigo' => $datos['codigo'],
       'isbn' => $datos['isbn'],
       'titulo' => $datos['titulo'],
       'descripcion' => $datos['descripcion'],
       'editorial'=>$datos['editorial'],
       'n_pags' => $datos['n_pags'],
       'precio' => $datos['precio'],
       'portada' => $datos['portada'],

   ]
   );

   
  
  
   }
 }
}
?>