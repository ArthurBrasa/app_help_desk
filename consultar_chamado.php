<?php require_once 'autentica_sessao.php'; ?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <a class="navbar navbar-dark" href="logoff.php"> 
        <div class="navbar-brand">
          Sair
        </div> 
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            

            <div class="card-header">
              Consulta de chamado ------ <?= $_SESSION['nome'] ?>
            </div>
            
            <div class="card-body">
              <?php    
                $pasta = "help_desk_scripts/registros";
                if($_SESSION['adm']){
                  foreach (scandir($pasta) as $reg) {
                    # code...
                    $arq = $pasta.'/'.$reg;
                    if(is_file($arq)){
                      $arq = fopen($arq, 'r'); 
                       $registro = null;
                       $cont = 0;
                       $usuario = null;
                  while(!feof($arq)) {
                    $l = fgets($arq);
                    if($cont === 0){
                      $usuario = $l;
                      $cont++; 
                    }else{
                      $registro = explode('#', $l);
                      if(count($registro)<3){
                        continue;
                      }
                      ?>
                        <div class="card mb-3 bg-light">
                          <div class="card-body">
                            <h5 class="card-title"><?= $registro[0] ?> ==> <?= $usuario ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $registro[1] ?></h6>
                            <p class="card-text"><?= $registro[2] ?></p>
                          </div>
                        </div>                
                  <?php }}}} ?>
                <?php } else {
                $arquivo = $pasta.'/'.$_SESSION['id'];
                if(is_file($arquivo)){
                  $arq= fopen($arquivo, 'r');
                  $cont = 0;
                  $registro = null;
                  while(!feof($arq)) {
                    $l = fgets($arq);
                    if($cont === 0){
                      $cont++; 
                    }else{
                      $registro = explode('#', $l);
                      if(count($registro)<3){
                        continue;
                      }
                ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $registro[0] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $registro[1] ?></h6>
                  <p class="card-text"><?= $registro[2] ?></p>
                </div>
              </div>
            <?php  }}}} ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>