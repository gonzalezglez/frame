<! DOCTYPE html>
<html lang="es">
<HEAD>
		<META charset="UTF-8">
		<title>Frameword Basico MVC: <?php if(isset($this->titulo)) { echo $this->titulo; } ?></title>
             
		
        <link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams["ruta_css"]; ?>style.css">
        
</HEAD>
<BODY>

   
          	<ul>
            <li class="active"><a href="index.php">Inicio</a></li>
			<li><a href="tareas">Tareas</a></li>
            <li><a href="usuarios">Usuarios</a></li>
            <li><a href="categoria">Categorias</a></li>

             <li><a href="usuarios/logout"><?php
                  
              if ($_SESSION['logged']) {

                echo "Salir";
             } 


             ?></a></li>

            </ul>
    <!--/.navbar-collapse -->
    

