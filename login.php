<?php
    //Verificando se ja existe uma sessão aberta

    //Mantendo a sessão/cria uma sessao
session_start();

if(!isset($_SESSION["system_control"]))
{
  ?>
  <!DOCTYPE HTML>
<html>
  <head>
    <title>Bem Vindo ao League of Languages</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="is-preload">

    <!-- Header -->
      <header id="header">
        <a class="logo">League of Languages</a>
        <nav>
          <a href="#menu">Menu</a>
        </nav>
      </header>

    <!-- Nav -->
      <nav id="menu">
        <ul class="links">
          <li><a href="index.php">Home</a></li>
          <li><a href="login.php">Login</a></li> 
          <li><a href="form_cliente.php">Cadastre-se</a></li>
          <li><a href="form_professor.php">Area do Professor</a></li>
        </ul>
      </nav>
  <head>
    <title>Iniciar Sessão</title>
    <link rel="stylesheet" type="text/css" href="externo/css/padrao.css?version=12">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css?version=12">
    <link rel="stylesheet" type="text/css" href="externo/css/signin.css?version=12">
    <meta charset="utf-8">
  </head>
  <body class="text-center">
    <form class="form-signin" action="verifica_login.php" method="POST"><center>
      <a href=""><img src="imagens/logo.png" width="140" ></a>
      <h1 class="h3 mb-3 font-weight-normal">Inicie sua sessão</h1>
      <input type="text" id="inputEmail" class="form-control" placeholder="Login" name="c_login" required autofocus>
      <input type="password" id="inputPassword" class="form-control" name="c_senha" placeholder="Senha" required>
      <button class="button primary" type="submit">Iniciar Sessão</button><br>
     <cite>Não possui uma conta? <a href="form_cliente.php">Cadastre-se já!</a></cite></center>

    </form>
  </body>
    <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/browser.min.js"></script>
      <script src="assets/js/breakpoints.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
</html>

<?php
}
else if($_SESSION["system_control"] == 1)
{

    if($_SESSION["privilegio"] == 0){
        ?>
        <script language='JavaScript'>
            document.location.href="perfil_cliente.php";
        </script>
        <?php
    }
    else if ($_SESSION["privilegio"] == 1) {
        ?>
        <script language='JavaScript'>
            document.location.href="perfil_professor.php";
        </script>
        <?php
    }
    else if ($_SESSION['privilegio'] == 2) {
        ?>
        <script language='JavaScript'>
            document.location.href="perfil_administrador.php";
        </script>
        <?php
    }
    else{
        echo "erro";
    }

}
?>