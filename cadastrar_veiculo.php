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
  //$cod_cliente = $_SESSION['cod_cliente'];      
  $cliente ="select * from `cliente` where `cod_login` = $cod_login";
  $resultado_cliente = mysqli_query($conn,$cliente);
  $vetor_cliente = mysqli_fetch_array($resultado_cliente);
  $cod_cliente = $vetor_cliente['cod_cliente'];

  if($system_control == 1 && $privilegio == 0){

    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $cor = $_POST['cor'];
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];
    $tipo = $_POST['tipo'];
    $opcao = $_POST['opcao'];
    $sql ="select * from `curso` where  `placa` = '$placa'" ;
    $resultado_sql = mysqli_query($conn,$sql); 
    $numero_curso = mysqli_num_rows($resultado_sql);
    if ($opcao == 1) {



        $codigo = $_POST['codigo'];
        $sql = "UPDATE `curso` SET `modelo`='$modelo',`cor`='$cor',`ano`='$ano',`placa`='$placa',`marca`='$marca',`tipo`='$tipo' WHERE `cod_curso` = $codigo";
        $insere = mysqli_query($conn,$sql);
        ?>
        <script>
          alert("Veículo alterado com succeso!");
          document.location.href="form_curso.php";

        </script>
        <?php 
      
      
    }
    else{

      if( $numero_curso == 0){

        $sql = "INSERT INTO `curso`(`modelo`, `cor`, `ano`, `marca`,`placa`,`cod_cliente`,`tipo`) VALUES ('$modelo','$cor','$ano','$marca','$placa',$cod_cliente,'$tipo')";
        $insere = mysqli_query($conn,$sql);


        ?>
        <script>
          alert("Carro cadastrado com succeso!");
          document.location.href="form_curso.php";

        </script>
        <?php   
      }
      else{?>
        <script>
          alert("Carro ja cadastrado no sistema!");
          document.location.href="form_curso.php";

        </script>
        <?php           
      }
    }

    

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