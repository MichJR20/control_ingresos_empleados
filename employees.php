<?php
include 'conexion.php';

$consulta = "SELECT * FROM employees";
$resultado = mysqli_query($con,$consulta) or die (mysqli_error($con));

?><center><h3>Bienvenido al panel de empleados</h3>
             <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#completeModal'>Registrar hora de ingreso y salida</button>
<div id="displayDataTable">jjj</div>
<div class='modal fade' id='completeModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <form>           
                    <div class='form-group'>
                        <label for='exampleFormControlSelect1'>Seleccione el nombre del empleado</label>
                        <?php 
                        echo '<select name="productos" class="form-control" id="empleado">';
                        for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                            $fila = mysqli_fetch_assoc($resultado);

                            echo '<option value="' . $fila['cedula'] . '">' . $fila['name'] .' '. $fila['lastname1'] .' '. $fila['lastname2'] .' </option>';
                        }
                        echo '</select>';
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"></label>
                        <input type="datetime-local" class="form-control" id="inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"></label>
                        <input type="datetime-local" class="form-control" id="fin"  onchange="validacion()" required>
                    </div>
                    <div id="motivoDiv" style="display:none;">
                        <label for="motivo">Motivo de salida temprana:</label>
                        <select class="form-select" aria-label="form-control" id="motivo">
                        <option></option>
                          <option value="Cita medica">Cita medica</option>
                          <option value="Calamidad">Calamidad</option>
                          <option value="Diligencia personal">Diligencia personal</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addhours()">Save changes</button>
            </div>
        </div>
    </div>
</div>
</center>

  <script>
    $(document).ready(function(){
      displayData();
    })


  </script>