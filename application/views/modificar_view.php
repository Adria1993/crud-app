<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Modificar Lead</title>
    </head>
    <body>
        <h2>Modificar Lead</h2>
        <form action="" method="POST">
            <?php foreach ($mod as $fila){ ?>
            <input type="text" name="nombre" value="<?=$fila->nombre?>"/>
            <input type="text" name="email" value="<?=$fila->email?>"/>
            <input type="text"  name="telefono" value="<?=$fila->telefono?>"/>
            <input type="text" name="pais" value="<?=$fila->pais?>"/>
            <input type="text" name="campaign" value="<?=$fila->campaign?>"/>
            <td>
                <select name="source" class="custom-select" value="<?=$fila->source?>">
                    <option>Facebook</option>
                    <option>Twitter</option>
                    <option>Web</option>
                    <option>Mailing</option>
                </select>             
            </td>
            <td>
                <select name="medium" class="custom-select" value="<?=$fila->medium?>">
                    <option>Artículo</option>
                    <option>Newsletter</option>
                    <option>Banner</option>
                </select> 
            </td>
            <input type="submit" name="submit" value="Modificar"/>
            <?php } ?>
        </form>
        <a href="<?=base_url("leads_controller")?>">Volver</a>
    </body>
</html>