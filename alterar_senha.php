 <?php
    //Mantendo a sessão/cria uma sessao
session_start();

if(!isset($_SESSION["system_control"]))
{
  ?>
  <script>
    alert("Acesso Inválido!");
    document.location.href="login.php";
  </script>
  <?php       
}
else{
  $system_control = $_SESSION["system_control"];   
  $cod_login = $_SESSION['cod_login'];
  $privilegio = $_SESSION["privilegio"];
  $senha = $_POST['senha_antiga'];

  $senha_criptografada = sha1($senha);

  if($system_control == 1 && $privilegio == 0){
    require('connect.php');

    $sql_pesquisa ="SELECT * FROM `login` WHERE `senha_antiga` = $senha_criptografada" ;
    $resultado = mysqli_query($conn,$sql_pesquisa); 
    $vetor = mysqli_fetch_array($resultado);
    
    function soNumero($str) {
    return preg_replace("/[^0-9]/", "", $str);
}

if (isset ($_POST['senha_nova'])) {
  $senha_nova = $_POST['senha_nova'];
  $sql ="UPDATE `login` SET `senha_nova`='$senha_nova' WHERE `cod_login` = $cod_login";
  $sql_query = mysqli_query($conn,$sql); 
  ?>
    <script>
      alert("Senha alterada com sucesso!");
      document.location.href="form_alterar_usuario.php";
    </script>
    <?php  
  
}
}
}
?>
  <?php  
}
  }
  else
  {
            //Acesso Inválido

            //Finalizando a sessão
    session_destroy();

            //Mensagem para o Usuário
    ?>
    <script>
      alert("Acesso Inválido!");
      document.location.href="login.php";
    </script>
    <?php           
  }
}
?>