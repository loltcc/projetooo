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
  $cod_professor = $_SESSION['cod_professor'];     
   
  
  if($system_control == 1 && $privilegio == 1){

    $nivel = $_POST['nivel'];
    $nome_completo = $_POST['nome_completo'];
    $definicao = $_POST['definicao'];
    $preco = $_POST['preco'];
    $cobranca = $_POST['cobranca'];
    $disciplina = $_POST['disciplina'];
    $tempo_curso = $_POST['tempo_curso'];
    $periodo = $_POST['periodo'];
    $opcao = $_POST['opcao'];
    $sql ="select * from `curso` where  `nivel` = '$nivel'" ;
    $resultado_sql = mysqli_query($conn,$sql); 
    $numero_curso = mysqli_num_rows($resultado_sql);
    
    $sql = "INSERT INTO `curso`(`preco`, `disciplina`, `tempo_curso`, `cobranca`,`nivel`,`definicao`,`nome_completo`,`cod_professor`,`periodo`) VALUES ('$preco','$disciplina','$tempo_curso','$cobranca','$nivel','$definicao','$nome_completo',$cod_professor,'$periodo')";
    $insere = mysqli_query($conn,$sql);
    ?>
    <script>
      alert("Curso cadastrado com sucesso!");
      document.location.href="cursos_professor.php";
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