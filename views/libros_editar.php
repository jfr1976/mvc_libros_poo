<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <?php


        include("header.php");

    ?>
    <link href="estilos.css" rel="stylesheet">
</head>
<body>


<br><br>
<form id="miform" name="miform" method="POST" action="index.php?controller=libros&action=guardar" enctype="multipart/form-data">

    
    <input type="hidden" name="codigo" id="codigo" value="<?= $libro['id'] ?>">
    <label>ISBN:</label>
    <input type="text" name="isbn" id="isbn" value="<?= $libro['isbn'] ?>" required>
    <br><br>
    <label>Título:</label>
    <input type="text" name="titulo" id="titulo" value="<?= $libro['titulo'] ?>" required>
    <br><br>
    <label>Descripción:</label>
    <input type="text" name="descripcion" id="descripcion" value="<?= $libro['descripcion'] ?>" required>
    <br><br>
    <label>Nº Páginas:</label>
    <input type="text" name="n_pags" id="n_pags" value="<?= $libro['n_pags'] ?>" required>
    <br><br>
    
    <label>Editorial:</label>
    <select name="editorial" id="editorial">
    
    
    <?php foreach($editoriales as $clave => $valor){
        
        if ($libro['editorial'] == $valor['id']){?>
          
          <option value="<?= $valor['id']; ?>"selected><?= $valor['id']." ".$valor['nombre'];?> </option>

          <?php

        }else{?>

        <option value ="<?= $valor['id']; ?>"><?= $valor['id']." ".$valor['nombre']; ?> </option>
        
        <?php }
    }
        ?>

    </select>
    <br><br>

    <label>Precio:</label>
    <input type="text" name="precio" id="precio" value="<?= $libro['precio'] ?>" required>
    <br><br>
    <label>Portada:</label>
    <br><br>
    <img src=<?=$ruta.$libro['portada']; ?> width="115px" height="175px">
    <br><br>
    <label>Modificar portada:</label>
    <br><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    <input type="file" style="font-size:x-large" name="file_upload">
    <br><br>
    <input class="button" name="envio" type="Submit" value="Enviar" />
    <input type="hidden" name="portada" value="<?= $libro['portada'] ?>">
</form>

<br><br><br><br>
<?php


        include("footer.php");

    ?>
    
</body>
</html>