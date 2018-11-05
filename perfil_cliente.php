<?php
    //Mantendo a sessão/cria uma sessao
session_start();

if(!isset($_SESSION["system_control"]))
{
  ?>
  <script>
    alert("Acesso Inválido!");
    document.location.href = "login.php";
  </script>
  <?php
}
else{
        //Sessao já criada
        //Recuperando as variaveis da sessão
  $system_control = $_SESSION["system_control"];
  $cod_login = $_SESSION['cod_login'];
  $privilegio = $_SESSION["privilegio"];

  if($system_control == 1 && $privilegio == 0){
    require('connect.php');

    $sql_pesquisa ="SELECT * FROM `cliente` WHERE `cod_login` = $cod_login" ;
    $resultado = mysqli_query($conn,$sql_pesquisa);
    $vetor = mysqli_fetch_array($resultado);

    $sql ="SELECT * FROM `login` WHERE `cod_login` = $cod_login" ;
    $resultado_pesquisa = mysqli_query($conn,$sql);
    $vetor_login = mysqli_fetch_array($resultado_pesquisa);


    $_SESSION["nome"] = $vetor["nome"];
    ?>

    <!DOCTYPE html>
    <html>

    <head>
    <title>League of Languages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="scss/main.css">
    <link rel="stylesheet" href="css/chat.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">


  </head>

  <body style="overflow-x: hidden;">
    <a href=""><img src="imagens/hangouts.jpg" width="400" style="position: absolute;  top: 100px; left: 320px;"></a>


    <?php
    require("navbar_cliente.html");
    ?>
    <div class="container-fluid">
        <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <br>
                <li class="nav-item">
                  <a class="nav-link active" href="#" style="color: #ff0000">
                    <span data-feather="home"></span>
                    Página Inicial <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="form_alterar_usuario.php">Informações de Conta</a>
                </li>

              </ul>
            </div>
          </nav>
                    <br>
                    <br>
                    
          </body>
          </html>

      
  <?php
}
else
{

  session_destroy();


  ?>
  <script>
    alert("Acesso Inválido!");
    document.location.href = "login.php";
  </script>
  <?php
}
}
?>