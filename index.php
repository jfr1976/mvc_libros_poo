<?php
//Incluimos el FrontController
require 'core/Front_Controller.php';

try
{
   //Lo iniciamos con su método estático main.
   FrontController::main();
}
catch (Exception $e)
{
   echo $e->getMessage();
}