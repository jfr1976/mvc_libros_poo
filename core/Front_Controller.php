<?php
class FrontController
{
  static function main()
  {
    //Incluimos algunas clases:
    require 'core/Configuration.php'; //de configuracion
    require 'core/DBManager.php';  //PDO con singleton
    require 'core/View.php';  //Mini motor de plantillas

    require 'config.php'; //Archivo con configuraciones.

    //Con el objetivo de no repetir nombre de clases
    //  nuestros controladores terminaran todos en _Controller.
    //Por ej, la clase controladora Libros, será Libros_Controller

    //Formamos el nombre del Controlador o en su defecto
    // tomamos que es el de Libros_Controller
    $controller = $config->get('DEFAULT_CONTROLLER');
    if(! empty($_GET['controller']))
      $controller = $_GET['controller'];

    //Lo mismo sucede con las acciones, si no hay accion
    //  tomamos index como accion
    $action = $config->get('DEFAULT_ACTION');
    if(! empty($_GET['action']))
      $action = $_GET['action'];

    $controller .= "_controller";

    $controller_path = $config->get('CONTROLLERS_FOLDER') .
                       $controller . '.php';

    //Incluimos el fichero que contiene nuestra clase controladora solicitada
    if (!is_file($controller_path))
      throw new Exception('El controlador no existe ' .
                          $controller_path . ' - 404 not found');

    require $controller_path;

    //Si no existe la clase que buscamos y su método
    // mostramos un error
    if (!is_callable(array($controller, $action)))
      throw new Exception($controller . '->' . $action . ' no existe');

    //Si todo esta bien, creamos una instancia del controlador
    //  y llamamos a la accion
    $controller = new $controller();
    $controller->$action();
  }
}