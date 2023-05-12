<?php
class Libros_Controller
{
   function __construct()
   {
      //Creamos una instancia de nuestro mini motor de plantillas
      $this->view = new View();
   }

   public function listar()
   {
      //Incluye el modelo que corresponde
      require 'models/Libros_Model.php';

      //Creamos una instancia de nuestro "modelo"
      $Libros_model = new Libros_Model();

      //Le pedimos al modelo todos los libros
      $libros = $Libros_model->getLibros();

      //Pasamos a la vista toda la información que se desea representar
      $variables = array();
      $variables['libros'] = $libros;
      $config2 = Config::getInstance();
      $variables['ruta'] = $config2->get('IMAGES_FOLDER');

      //Finalmente presentamos nuestra plantilla
      $this->view->show("libros_listar.php", $variables);
   }

   public function listarEditoriales()
   {
      //Incluye el modelo que corresponde
      require 'models/Editoriales_Model.php';

      //Creamos una instancia de nuestro "modelo"
      $Editoriales_model = new Editoriales_Model();

      //Le pedimos al modelo todos los libros
      $editoriales = $Editoriales_model->listEditoriales();

      //Pasamos a la vista toda la información que se desea representar
      $variables = array();
      $variables['editoriales'] = $editoriales;
      $config2 = Config::getInstance();
      $variables['ruta'] = $config2->get('IMAGES_FOLDER');

      //Finalmente presentamos nuestra plantilla
      $this->view->show("editoriales_listar.php", $variables);
   }

   public function ver ()
   {
      if ( !isset ( $_GET [ 'id' ] ) )
         die("No has especificado un identificador de libro.");

      $id = $_GET [ 'id' ];

      //Incluimos el modelo correspondiente
      require 'models/Libros_Model.php';

      //Creamos una instancia de nuestro "modelo"
      $Libros_model = new Libros_Model();

      //Le pide al modelo el libro con id = $id
      $libro = $libros = $Libros_model->getLibro($id);

      if ($libro === null)
         die("Identificador de libro incorrecto");

      //Pasamos a la vista toda la información que se desea representar
      $variables = array();
      $variables['libro'] = $libro;
      $config2 = Config::getInstance();
      $variables['ruta'] = $config2->get('IMAGES_FOLDER');

      //Pasamos a la vista toda la información que se desea representar
      $this->view->show('libros_ver.php', $variables);
   }

   function borrar ()
{
        
    
        if ( !isset ( $_GET [ 'id' ] ) )
            die("No has especificado un identificador de libro.");
        $id = $_GET [ 'id' ];

        //Incluimos el/los modelo/s correspondiente/s
        require 'models/libros_model.php';

        //Creamos una instancia de nuestro/s "modelo/s"
        $Libros_model = new Libros_Model();

        //Le pide al modelo el libro con id = $id
        $libro = $libros = $Libros_model->deleteLibro($id);

        //Pasamos a la vista toda la información que se desea representar
        $this->view->show('libros_borrar.php');
}

    function editar()
{

        if ( !isset ( $_GET [ 'id' ] ) )
            die("No has especificado un identificador de libro.");
         $id = $_GET [ 'id' ];

         //Incluimos el/los modelo/s correspondiente/s
         require 'models/libros_model.php';
         require 'models/editoriales_model.php';

         //Creamos una instancia de nuestro/s "modelo/s"
         $Libros_model = new Libros_Model();
         $Editoriales_model = new Editoriales_Model();

        //Le pide al modelo el libro con id = $id
         $libro = $libros = $Libros_model->getLibro($id);

         //Le pide al modelo la lista de editoriales
         $editoriales = $Editoriales_model->getEditoriales();

         //Pasamos a la vista toda la información que se desea representar
         $variables = array();
         $variables['libro'] = $libro;
         $variables['editoriales'] = $editoriales;
         $config2 = Config::getInstance();
         $variables['ruta'] = $config2->get('IMAGES_FOLDER');

         //Pasamos a la vista toda la información que se desea representar
         $this->view->show('libros_editar.php', $variables);
   

}

    function nuevo()
{
         //Incluimos el/los modelo/s correspondiente/s
         require 'models/libros_model.php';
         require 'models/editoriales_model.php';

         //Creamos una instancia de nuestro/s "modelo/s"
         $Libros_model = new Libros_Model();
         $Editoriales_model = new Editoriales_Model();

         //Le pide al modelo la lista de editoriales
         $editoriales = $Editoriales_model->getEditoriales();

         //Pasamos a la vista toda la información que se desea representar
         $variables['editoriales'] = $editoriales;

         //Pasamos a la vista toda la información que se desea representar
         $this->view->show('libros_nuevo.php', $variables);

}

function guardar ()
    
{
   
   $aErrores = array();
   
  // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
   $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ,.()\s]+$/";
   $patron_numero = "/^[[:digit:]]+$/";
  // Comprobar si se ha enviado el formulario:
  if( !empty($_POST) )
  {
     
    // Comprobar si llegaron los campos requeridos:
       if( isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['isbn']) )
      {
          // Título:
           if( empty($_POST['titulo']) )
              $errores[] = "Debe introducir un título";
          else
          {
              // Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
               if(!preg_match($patron_texto, $_POST['titulo']) )
                  $errores[] = "El título sólo puede contener letras y espacios";
          }
          // Descripción:
          if( empty($_POST['descripcion']) )
              $errores[] = "Debe introducir una descripción";

          //ISBN:
          if( empty($_POST['isbn']))
               $errores[] = "El ISBN es obligatorio";
          else
          {
               if(!preg_match($patron_numero, $_POST['isbn']))
                  $errores[] = "El formato introducido para el ISBN no es correcto. Sólo puede contener números";
          }
          //Número de páginas:
          if( empty($_POST['n_pags']))
               $errores[] = "El número de páginas es obligatorio";
          else
          {
               if(!preg_match($patron_numero, $_POST['n_pags']))
                  $errores[] = "El formato introducido para el número de páginas no es correcto. Sólo puede contener números";
          }

      }
    
  
    }

  if( count($errores) )
      {
        
         $hayerrores = array();
         $hayerrores['hayerrores'] = $errores;
         $this->view->show('libros_error.php', $hayerrores);     
      
        }else
      {

  
            //Incluimos el/los modelo/s correspondiente/s
            require 'models/libros_model.php';

            //Creamos una instancia de nuestro/s "modelo/s"
            $Libros_model = new Libros_Model();

            //Le pide al modelo que le pase los datos de la función saveLibro
            $Libros_model->saveLibro($_REQUEST);

            //Le decimos que vuelva a la página principal
            header('Location: index.php');
    
    }
}



}
?>

    


      
