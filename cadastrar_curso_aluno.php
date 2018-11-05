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
  require("connect.php");

  $system_control = $_SESSION["system_control"];   
  $cod_login = $_SESSION['cod_login'];
  $privilegio = $_SESSION["privilegio"];
  $cod_cliente = $_SESSION['cod_cliente'];     
   
  
  if($system_control == 1 && $privilegio == 0){

    $nivel = $_POST['nivel'];
    $nome_completo = $_POST['nome_completo'];
    $definicao = $_POST['definicao'];
    $disciplina = $_POST['disciplina'];
    $tempo_curso = $_POST['tempo_curso'];
    $periodo = $_POST['periodo'];
    $opcao = $_POST['opcao'];
    $sql ="select * from `curso` where  `nivel` = '$nivel'" ;
    $resultado_sql = mysqli_query($conn,$sql); 
    $numero_curso = mysqli_num_rows($resultado_sql);
    
    $sql = "INSERT INTO `curso`(`disciplina`, `tempo_curso`,`nome_completo`,`nivel`,`definicao`,`cod_cliente`,`periodo`) VALUES ('$disciplina','$tempo_curso','$nome_completo','$nivel','$definicao',$cod_cliente,'$periodo')";
    $insere = mysqli_query($conn,$sql);
    ?>
    <script>
      alert("Curso cadastrado com sucesso!");
      document.location.href="meus_cursos.php";
    </script>
    <?php

    

  }

  else
  {

            //Finalizando a sessão

    session_destroy();

            //Mensagem para o Usuário
    ?>
    <script>
      alert("Acesso Inválido!");
      document.location.href="../login.php";
    </script>
    <?php           
    

  }
}
?>