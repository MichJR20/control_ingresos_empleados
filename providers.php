<?php
include 'conexion.php';

$consulta = "SELECT * FROM register";
$resultado = mysqli_query($con,$consulta) or die (mysqli_error($con));


?><center><h3>Bienvenido al panel de proveedores e invitados</h3>
              <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#completeModalp'>Registrar proveedores e invitados</button>
              <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#complete'>Ingresar Hora de ingreso y salida </button>

              <div id="displayDataTable1"></div>
              <div class='modal fade' id='completeModalp' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                <form>           
                <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" placeholder="ingrese si es proveedor o visitante" class="form-control" id="type">
                  </div>

				  <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" placeholder="ingrese el nombre" class="form-control" id="name">
                  </div>

				  <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" placeholder="ingrese documento de identidad" class="form-control" id="document">
                  </div>

                </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addproviders()">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
	</center>

  <!--update-->
  <div id="displayDataTable1"></div>
              <div class='modal fade' id='updatem' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                <form>           
                <div class="form-group">
                    <label for="updatetype"></label>
                    <input type="text" placeholder="ingrese si es proveedor o visitante" class="form-control" id="updatetype">
                  </div>

				  <div class="form-group">
                    <label for="updatename"></label>
                    <input type="text" placeholder="ingrese el nombre" class="form-control" id="updatename">
                  </div>

				  <div class="form-group">
                    <label for="updatedocument"></label>
                    <input type="text" placeholder="ingrese documento de identidad" class="form-control" id="updatedocument">
                  </div>

                </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateu()">Actualizar</button>
                        <input type="hidden" id="hiddendata"></input>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='modal fade' id='complete' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
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
                  <label for='exampleFormControlSelect1'>Seleccione el nombre del proveedor o visitante</label>
                  <?php echo '<select name="productos" class="form-control" id="pov">';
                    for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                      $fila = mysqli_fetch_assoc($resultado);

                      echo '<option value="' . $fila['document'] . '">' . $fila['name'] . '</option>';
                    }

                      echo '</select>';?>
                      
                    </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="datetime-local" class="form-control" id="inicio">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="datetime-local" class="form-control" id="fin">
                  </div>

                </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addhoursv()">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
 


     <script>

      
    $(document).ready(function(){
      displayData1();
    })
  </script>


