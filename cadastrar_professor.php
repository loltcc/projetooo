<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$sobrenome = $_POST['sobrenome'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$rg = $_POST['rg'];
$cpf1 = $_POST['cpf'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero2 = $_POST['numero'];
$complemento = $_POST['complemento'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$cep = $_POST['cep'];
$especializacao = $_POST['especializacao'];
$data_nascimento = $_POST['data'];
require("connect.php");
function soNumero($str) {
    return preg_replace("/[^0-9]/", "", $str);
}


$cpf = soNumero($cpf1);
$rgn = soNumero($rg);
$celularn = soNumero($celular);
$telefonen = soNumero($telefone);
$cepn = soNumero($cep);




    $sql_pesquisa ="select * from `login` where `login` = '$login'" ;
    $resultado = mysqli_query($conn,$sql_pesquisa); 
    $numero = mysqli_num_rows($resultado);
    $vetor_login = mysqli_fetch_array($resultado);
    $sql ="select * from `professor` where  `cpf` = '$cpf' || `rg` = $rgn" ;
    $resultado_sql = mysqli_query($conn,$sql); 
    $numero_professor = mysqli_num_rows($resultado_sql);

    if($numero == 0 && $numero_professor == 0){

        $sql_login = "INSERT INTO `login`(`login`, `senha`, `privilegio`) VALUES ('$login','$senha',1)";
        $resultado_login = mysqli_query($conn, $sql_login);
        if($resultado_login)
        {

            $sql_cod ="select * from `login` where `login` = '$login'" ;
            $resultado_cod = mysqli_query($conn,$sql_cod);
            $vetor_cod = mysqli_fetch_array($resultado_cod);
            $cod_login = $vetor_cod['cod_login'];
            $sql_professor = "INSERT INTO `professor`(`cod_login`, `nome`, `email`, `rg`, `cpf`, `rua`, `estado`, `cep`, `cidade`, `telefone`, `bairro`, `complemento`, `sobrenome`, `numero`, `celular`,`data_nascimento`,`especializacao`) VALUES ($cod_login,'$nome','$email',$rgn,'$cpf','$rua','$estado',$cepn,'$cidade',$telefonen,'$bairro','$complemento','$sobrenome','$numero2',$celularn,'$data_nascimento','$especializacao')";
            $insere = mysqli_query($conn,$sql_professor);

            if ($insere) {
                ?>
                <script language='JavaScript'>
                    alert("Cadastrado com Sucesso");
                    document.location.href="login.php";
                </script>
                <?php
            }
            else{
                ?>
                <script language='JavaScript'>
                    alert("Erro ao cadastrar");
                    document.location.href="login.php";
                </script>
                <?php }
            }
            else
            {
                echo "erro";
            }
        } 

        else{
           ?>
           <script language='JavaScript'>
            alert("CPF,RG já cadastrado");
            document.location.href="login.php";
        </script>             
        <?php }
    


    ?>