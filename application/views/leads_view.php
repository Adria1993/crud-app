<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>CRUD con CodeIgniter</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style type="text/css">
	        ::selection { background-color: #E13300; color: white; }
	        ::-moz-selection { background-color: #E13300; color: white; }
	</style>
    </head>
    <body>
        <h2>Crud con CodeIgniter</h2>
        <?php
        //Si existen las sesiones flasdata que se muestren
            if($this->session->flashdata('correcto'))
                echo $this->session->flashdata('correcto');
             
            if($this->session->flashdata('incorrecto'))
                echo $this->session->flashdata('incorrecto');
        ?>
<div class="master table-responsive-sm text-nowrap">
<table class="table table-hover table-fixed">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Telefon</th>
        <th scope="col">Pais</th>
        <th scope="col">Campaign</th>
        <th scope="col">Source</th>
        <th scope="col">Medium</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <form action="<?=base_url("leads_controller/add");?>" method="post">
            <td></td>
            <td>
               <input type="text" name="nombre"/>
            </td>
            <td>
               <input type="email" name="email"/>
            </td>
            <td>
               <input type="text" name="telefono"/>
            </td>
            <td>
                <input type="text" name="pais"/>
            </td>
            <td>
                <input type="text" name="campaign"/>
            </td>
            <td>
                <select name="source" class="custom-select">
                    <option selected>Facebook</option>
                    <option>Twitter</option>
                    <option>Web</option>
                    <option>Mailing</option>
                </select>             
            </td>
            <td>
                <select name="medium" class="browser-default custom-select">
                    <option selected>Artículo</option>
                    <option>Newsletter</option>
                    <option>Banner</option>
                </select> 
            </td>
            <td>
                <input type="submit" name="submit" value="Añadir" />
            </td>
        </form>
    </tr>
<?php
foreach($ver as $fila){
?>
    <tr>
        <th scope="row">
            <?=$fila->id;?>
        </th>
        <td>
            <?=$fila->nombre;?>
        </td>
        <td>
            <?=$fila->email;?>
        </td>
        <td>
            <?=$fila->telefono;?>
        </td>
        <td>
            <?=$fila->pais;?>
        </td>
        <td>
            <?=$fila->campaign;?>
        </td>
        <td>
            <?=$fila->source;?>
        </td>
        <td>
            <?=$fila->medium;?>
        </td>
        <td>
            <a href="<?=base_url("leads_controller/mod/$fila->id")?>">Modificar</a>
            <a href="<?=base_url("leads_controller/eliminar/$fila->id")?>">Eliminar</a>
        </td>
    </tr>
    <tbody>
<?php
    
}
?>
</table>
</div>
    </body>
</html>