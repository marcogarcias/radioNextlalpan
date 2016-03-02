<?php
require_once '../../../app/controller/users/usersListCtrl.php';
?>
<!DOCTYPE html>
 <html lang="es">
 <head>
  <title>Lista de usuarios registrados</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
 </head>
 <body>
  <div class="">
        <table>
            <tr>
                <td>
                    Id
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    Correo
                </td>
            </tr> 
            <?php foreach ($a_users as $row): ?>
            <tr>
                <td><?php echo $row['idUser']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>   
            <?php endforeach ?>                     
        </table>
    </div>      
 </body>
 </html>