<?php


$conn = mysqli_connect("localhost", "root", "","bd_do_alex");



if(isset($_POST['hora']))
{
	

	$hora = $_POST['hora'];
    $data = $_POST['data'];
    $cod_servico = $_POST['cod_servico'];
    $cod_orcamento = $_POST['cod_orcamento'];
	$sql = "UPDATE `servico` SET `status`= 2 WHERE `cod_servico` = $cod_servico";
	mysqli_query($conn,$sql);
	$sql = "UPDATE `orcamento` SET `status`= 2 WHERE `cod_orcamento` = $cod_orcamento;
	mysqli_query($conn,$sql)";

}else{}
		?>