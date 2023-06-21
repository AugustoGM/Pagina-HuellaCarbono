<?php
    require 'dataBase.php';

		$id_usuarioError = null;
		$nombre_usuarioError = null;
        $contraseña_error = null;
		$id_factorError = null;


	if ( !empty($_POST)) {

        
		$nombre_usuario = $_POST['nombre_usuario'];
        $contraseña = $_POST['contraseña'];
		$id_factor = $_POST['id_factor'];


		// validate input
		$valid = true;

		if (empty($nombre_usuario)) {
			$nombre_usuarioError = 'Porfavor Ingresa tu nombre';
			$valid = false; 
		}
		if (empty($contraseña)) {
			$contraseña_error = 'Porfavor Ingresa una contraseña';
			$valid = false;
		}

		if (empty($id_factor)) {
			$id_factorError  = 'Porfavor Ingresa un tipo de energia';
			$valid = false; 
		}
	

		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `usuario` (`nombre_usuario`, `contraseña`, `id_factor`) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($nombre_usuario,$contraseña, $id_factor));
			Database::disconnect();
			header("Location: inicio.php");
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD EDICION</title>

        <link rel="stylesheet" href="../CSS/HeaderFooterStructure.css">
        <link rel="stylesheet" href="../CSS/galeria.css">
	</head>

    <header>
        <img class="Logo__EscNegCie" src="../media/logotec-ings.svg" alt="Logo__EscNegCie">
        <ul>
        <li>
            <a href="#">Layout Proyectos</a>
        </li>
        </ul>
        <nav>
        <ul>
            <li><a href="#">Cerrar Sesión</a></li>
        </ul>
        </nav>
    </header>

	<body>
	    <div class="container">
	    	<div class="span10 offset1">
	    		<div class="row">
		   			<h3>Registro de usuario</h3>
		   		</div>

				<form class="form-horizontal" action="registroUser.php" method="post">


				<div class="control-group <?php echo !empty($nombre_usuarioError)?'error':'';?>">
						<label class="control-label">Nombre</label>
					    <div class="controls">
					      	<input name="nombre_usuario" type="text"  placeholder="Nombre de usuario" value="">
					      	<?php if (($nombre_usuarioError != null)) ?>
					      		<span class="help-inline"><?php echo $nombre_usuarioError;?></span>
					    </div>
					</div>

                    <div class="control-group <?php echo !empty($contraseña_error)?'error':'';?>">
						<label class="control-label">Contraseña</label>
					    <div class="controls">
					      	<input name="contraseña" type="password"  placeholder="Contraseña" value="">
					      	<?php if (($contraseña_error != null)) ?>
					      		<span class="help-inline"><?php echo $contraseña_error;?></span>
					    </div>
					</div>

					<br>
					<h2>IMPORTANTE</h2>
					<br>
					<h3>Que tipo de energia ocupas?</h3>
					<br>
					<br>

					<div class="control-group <?php echo !empty($id_factorError)?'error':'';?>">
					    	<label class="control-label">Energia</label>
					    	<div class="controls">
                            	<select name ="id_factor">
                                    <option value="">Selecciona un tipo de energia</option>
                                        <?php
					   						$pdo = Database::connect();
					   						$query = 'SELECT * FROM factor';
	 				   						foreach ($pdo->query($query) as $row) {
	 				   							if ($row['id_factor']==$id_factor)
                        	   						echo "<option selected value='" . $row['id_factor'] . "'>" . $row['nombre_energia'] . "</option>";
                        	   					else
                        	   						echo "<option value='" . $row['id_factor'] . "'>" . $row['nombre_energia'] . "</option>";
					   						}
					   						Database::disconnect();
					  					?>

                                </select>
					      	<?php if (!empty($id_factorError)): ?>
					      		<span class="help-inline"><?php echo $perError;?></span>
					      	<?php endif;?>
					    	</div>
					</div>


					<div>
						<input class="btn btn-primary btn-block" type="submit" value="Registrarse" id="submit" name="submit">
					</div>

					<div>
						<a href="loginUser.php">Inicia sesion aqui </a>
					</div>

				</form>
			</div>
	    </div> <!-- /container -->
	</body>
</html>

