<?php
    require 'dataBase.php'
    
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="icon" type="image/ico" href="../media/favicon.ico"/>

    
        
        <title>Inicio de sesión de colaborador | Expo ingenierías</title>
        <link rel="stylesheet" href="../CSS/HeaderFooterStructure.css">
        <link rel="stylesheet" href="../CSS/FormsStructure.css">
    </head>
    <body>
        <header>
            <a href="../index.php"><img class="Logo__Expo" src="../media/logo-expo.svg" alt="Logotipo de Expo ingenierías"></a>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
            </ul>
            <nav>
                <ul></ul>
            </nav>
        </header>
        <main> 
            <div class="Card-1">
                <a class="Btns Btn-1" href="../PHP/LoginUsuarios.php">Iniciar sesión</a>
                <a class="Btns Btn-2" href="../PHP/RegistroUsuarios.php">Registrarse</a>
                <form class="Form__Card-1" action="" method="post">
                    <center><b>¡Bienvenido!<br><br>Ingresa las credenciales de tu cuenta</b></center>
                    <table>
                        <tr>
                            <td>Nombre</td>
                            <td>
                                <input class="Text__Input" type="text" name="nombre_usuario" value="<?php echo !empty($nombre_usuario) ? $nombre_usuario : ''; ?>" autofocus required>
                                <?php if (!empty($nombre_usuarioError)): ?>
                                    <br>
                                    <span class="Error__Message"><?php echo $nombre_usuarioError; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Contraseña </td>
                            <td>
                                <input class="Text__Input" type="password" name="contraseña" value="<?php echo !empty($contraseña) ? $contraseña : ''; ?>" required>
                                <?php if (!empty($contraseña_error)): ?>
                                    <br>
                                    <span class="Error__Message"><?php echo $contraseña_error; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="Td__Iniciar__Sesion" colspan="2">
                                <input class="Btn__Iniciar__Sesion" type="submit" value="Iniciar sesión" name="submit">
                                <?php if (!empty($login_error)): ?>
                                    <br>
                                    <span class="Error__Message"><?php echo $login_error; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </main>
    </body>
</html>