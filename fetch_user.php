<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM professor
WHERE cod_login != '".$_SESSION['cod_login']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '
<table class="table table-bordered table-striped">
 <tr>
 	<td>Foto</td>
  	<td>Nome dos Professores</td>
  	<td>Celular</td>
 	<td>Especialização</td>
	<td>E-mail</td>
	<td>Iniciar Conversa</td>
 </tr>
';

foreach($result as $row)
{
 $output .= '
 <tr>
 <td><img src="'.$row['imagem'].'" class="profile"</td>
  <td>'.$row['nome'].' '.$row['sobrenome'].'</td>
  <td>'.$row['celular'].'</td>
   <td>'.$row['especializacao'].'</td>
   <td>'.$row['email'].'</td>
  <td><button type="button" class="btn btn-primary start_chat" data-touserid="'.$row['cod_login'].'" data-tousername="'.$row['nome'].'">Mensagens</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>