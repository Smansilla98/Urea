<?php

if($_POST){
  if(isset($_POST["btnInsertar"])){
    $aCargas = [];
    if(file_exists("cargas.txt")){
      $json_datos= file_get_contents("cargas.txt");
      $aCargas = json_decode($json_datos, true);
    }
       
    $aCargas []= array(
        "operacion"=>trim($_POST["txtOperacion"]),
      "patente"=>trim($_POST["txtPatente"]),
      "chofer" =>trim($_POST["txtChofer"]),
      "odometro" =>trim($_POST["txtOdometro"]),
      "litros" =>trim($_POST["txtLitros"]),
      "fecha" =>trim($_POST["txtFecha"]),
      "hora" =>trim($_POST["txtHora"]),
      "despacho" =>trim($_POST["txtDespacho"]));
    $json_clientes =  json_encode($aCargas);
    file_put_contents("cargas.txt",$json_clientes);




} 
}

//Para la grilla

$json_clientes=file_get_contents("cargas.txt");
$aCargas=json_decode($json_clientes, true);


$pos = isset($_GET["pos"])? $_GET["pos"]: "";
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" sizes="32x32" href="xampp\htdocs\urea\icon.png">
        <title>Urea TJB</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      </head>
<body>

<h1 style=text-align:center >Carga de urea</h1>
<h4 style=text-align:center>Surtidor Guillon.</h4>




<div class="container">
  <div class="row">  
    <div class="col-sm-8 col-lg-9">
     <form action="index.php" method="post">
     <div class="form-group">
       <label for="text">Operacion</label>
       <input type="text" class="form-control" placeholder="Shell" name="txtOperacion" value="<?php echo isset($aCargas[$pos])?$aCargas[$pos]["operacion"]:""; ?>">
      </div>
      <div class="form-group">
       <label for="text">Patente</label>
       <input type="text" class="form-control" placeholder="AA654QZ" name="txtPatente" value="<?php echo isset($aCargas[$pos])?$aCargas[$pos]["patente"]:""; ?>">
      </div>
      <div class="form-group">
        <label for="text">Chofer</label>
        <input type="text" class="form-control"  placeholder="..." name="txtChofer" value="<?php echo isset($aCargas[$pos])?$aCargas[$pos]["chofer"]:""; ?>">
    <div class="form-group">
        <label for="formGroupExampleInput">Odometro</label>
        <input type="number" class="form-control" placeholder="Km Actual" name="txtOdometro" value="<?php echo isset($aCargas[$pos])?$aCargas[$pos]["odometro"]:""; ?>">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Litros</label>
        <input type="number" class="form-control" placeholder="..." name="txtLitros" value="<?php echo isset($aCargas[$pos])?$aCargas[$pos]["litros"]:""; ?>">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Fecha</label>
        <input type="date" class="form-control" placeholder="dd/mm/aaaa" name="txtFecha" value="<?php echo isset($aCargas[$pos])?$aCargas[$pos]["fecha"]:""; ?>">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Hora</label>
        <input type="time" class="form-control" placeholder="hh:mm" name="txtHora" value="<?php echo isset($aCargas[$pos])?$aCargas[$pos]["hora"]:""; ?>">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Despacho</label>
        <select type="option"  class="custom-select" name="txtDespacho" value="<?php echo isset($aCargas[$pos])?$aCargas[$pos]["despacho"]:""; ?>">
  <option value="Nuñez">Nuñez, Guillermo</option>
  <option value="Alvarez">Alvarez, Jorge</option>
  <option value="Otro">Otro</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="btnInsertar">Insertar</button>
<button type="submit" class="btn btn-secondary" name="btnLimpiar">Limpiar</button>
<button type="reset" class="btn btn-danger" name="btnBorrar">Borrar</button>
<button type="submit" class="btn btn-success" name="btnActualizar">Actualizar</button>

    
</form>
</div>

<div class="container">
  <div class="row">  
    <div class="col-sm-8 col-lg-9">
        <table class="table col-sm-8 col-lg-9">
                <thead>
                  <tr>
                    <th scope="col">Operacion</th>
                    <th scope="col">Patente</th>
                    <th scope="col">Chofer</th>
                    <th scope="col">Odometro</th>
                    <th scope="col">Litros</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Despacho</th>
              
                </tr>
                </thead>
                <?php 
                $pos=0;
                foreach($aCargas as $aCarga){
                  echo"<tr>
                  <td>".$aCarga["operacion"]."</td>
                  <td><a href='index.php?pos=$pos'>".$aCarga["patente"]."</td>
                  <td>".$aCarga["chofer"]."</td>
                  <td>".$aCarga["odometro"]."</td>
                  <td>".$aCarga["litros"]."</td>
                  <td>".$aCarga["fecha"]."</td>
                  <td>".$aCarga["hora"]."</td>
                  <td>".$aCarga["despacho"]."</td>
                  </tr>";
                  $pos++;
                }
                ?>
                </table>

 </div>             


</body>
</html>