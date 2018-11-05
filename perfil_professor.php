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
        //Sessao já criada
        //Recuperando as variaveis da sessão
  $system_control = $_SESSION["system_control"];
  $cod_login = $_SESSION['cod_login'];
  $privilegio = $_SESSION["privilegio"];
  $cod_professor = $_SESSION["cod_professor"];

  if($system_control == 1 && $privilegio == 1){
    require('connect.php');

    $sql_pesquisa ="SELECT * FROM `professor` WHERE `cod_login` = $cod_login" ;
    $resultado = mysqli_query($conn,$sql_pesquisa);
    $vetor = mysqli_fetch_array($resultado);

    $sql ="SELECT * FROM `login` WHERE `cod_login` = $cod_login" ;
    $resultado_pesquisa = mysqli_query($conn,$sql);
    $vetor_login = mysqli_fetch_array($resultado_pesquisa);

    $sql_curso ="SELECT * FROM `curso` WHERE `cod_professor` = $cod_professor" ;
    $curso_resultado = mysqli_query($conn,$sql_curso);
    $numero_cursos = mysqli_num_rows($curso_resultado);
    $_SESSION["nome"] = $vetor["nome"];
    ?>

    <!DOCTYPE html>
    <html>
    <head>
      <title>Meus Cursos</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="scss/main.css">
      <!-- Our Custom CSS -->
      <link rel="stylesheet" type="text/css" href="css/style.css">


    </head>
    <body>
       <a href=""><img src="imagens/hangouts2.png" width="400" style="position: absolute;  top: 100px; left: 320px;"><img src="imagens/hangouts.jpg" width="600" style="position: absolute;  top: 100px; left: 800px;"></a>




      <script type="text/javascript" >

        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");

          }

          function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);

        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
          }
        }

        function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";


                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
              }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
          }
        };

      </script>

      <?php
      require("navbar_professor.html");
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
                  <a class="nav-link" href="form_alterar_professor.php">Informações de Conta</a>
                </li>

              </ul>
            </div>
          </nav>
                    <br>
                    <br>
                    <center><h4>Bem vindo ao seu Perfil</h4></center>
          </body>
          </html>
          <?php
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
