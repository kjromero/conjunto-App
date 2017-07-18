<?php

include '../partials/head.php';
require_once '../partials/menu.php';
require_once '../partials/aside.php';
require_once '../../controller/UserController.php';
require_once '../../controller/VehiculoController.php';

?>
<div class="container">
    <div class="row">
        <div class="col-md-10" style="padding-top: 70px;">
            <h2>Registrar vehiculos</h2>
            <form id="vehiculo" method='POST'>
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" name="modelo" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" name="marca"  required class="form-control">
                </div>
                <div class="form-group">
                    <label>Placa</label>
                    <input type="text" name="placa"  required class="form-control">
                </div>
                <div class="form-group">
                    <label>Residente</label>
                    <select id="idResidente" name="idResidente">
                        <?php
                            foreach(Usuario::getAllResidentes() as $row)
                            {
                                 echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Vehiculo</label>
                    <select id="vehiculo" name="tipo">
                        <option value="1">Carro</option>
                        <option value="2" >Camioneta</option>
                        <option value="3" >Moto</option>
                    </select>
                </div>
                <div class="form-group">
                    <button onclick="Vehiculo.vehiculo(); return false;" class="btn btn-primary">Guardar</button>
                </div>

            </form>

        </div>

        <div class="col-md-10" style="padding-top: 60px;">
            <h1>Listado de vehiculos</h1>

            <table class="table">
                <thead>
                <tr>
                    <td>Modelo -   </td>
                    <td> Marca -  </td>
                    <td> Placa - </td>
                    <td> Residente - </td>
                    <td> Tipo Vehiculo - </td>
                    <td> Editar </td>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ( Vehiculo::getAllVehiculos()  as $key => $row) {
                    echo "<tr id='id_".$row['id']."' style='cursor:pointer'>";
                    echo "<td contenteditable='true'><p>".$row['modelo']."</p></td>";
                    echo "<td contenteditable='true'><p>".$row['marca']."</p></td>";
                    echo "<td contenteditable='true'><p>".$row['placa']."</p></td>";
                    echo "<td contenteditable='true'><p>".$row['idResidente']."</p></td>";
                    if( $row['id_tipo'] == 1){
                        echo "<td contenteditable='true'><p>Camioneta</p></td>";
                    }else if($row['id_tipo'] == 2){
                        echo "<td contenteditable='true'><p>Carro</p></td>";
                    }else{
                        echo "<td contenteditable='true'><p>Moto</p></td>";
                    }

                    // echo "<td contenteditable='true'><p>".$row['tipo']."</p></td>";

                    echo "<td> <a href='../dashboard/editVehiculo.php?idVehiculo=".$row['id']."'><button class='edit' id_edit=".$row['id'].">Editar</button></a></td>";
                    echo "</tr>";

                }
                ?>
                <tr></tr>
                </tbody>
            </table>

        </div>
    </div>
</div>



<?php include '../partials/footer.php';?>
<script type="text/javascript" src="../assets/js/vehiculo.js"></script>