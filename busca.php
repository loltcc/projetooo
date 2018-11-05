<?php
require('connect.php');

$busca =  $_POST['busca'];


$query = mysqli_query($conn, "SELECT * FROM curso WHERE disciplina LIKE '%$busca%'");
$num   = mysqli_num_rows($query);
?>
<html>
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
</html>
<?php
if($num >0){
    while($row = mysqli_fetch_assoc($query)){
      echo $row['nome_professor'].' - '.$row['disciplina'].' - '.$row['nivel'].' - '.$row['tempo_curso'].' - '.$row['periodo'].' - '.$row['preco'].' - '.$row['cobranca'].' <br><hr>';
    }
}else{
  echo "Este curso não está Cadastrado!";
}
?>
