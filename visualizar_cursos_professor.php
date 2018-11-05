<?php
    //Mantendo a sessão/cria uma sessao
session_start();

if(!isset($_SESSION["system_control"]))
{
  ?>
  <script>
    alert("Acesso Inválido!");
    document.location.href = "login.php";
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

    $sql_curso ="SELECT * FROM `curso` WHERE `cod_cliente` != 0" ;
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
    <link rel="stylesheet" href="css/chat.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">


  </head>

  <body style="overflow-x: hidden;">


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
                    Cursos Disponíveis <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="visualizar_cursos_professor.php" >Cursos que os alunos se interessam.
                  </a>

                <li class="nav-item">
                  <a class="nav-link" href="cursos_professor.php">Voltar</a>
                </li>
                </li>

              </ul>
            </div>
          </nav>

                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
                      
                            <div class="col-sm" id="escondido2" style="display: block;">
                    <br>
                    <br>
                    <center><h4>Visualize aqui o que os alunos estão interessados e entre em contato para começar as aulas.</h4></center>
                   <br>
                                <ul style="text-align: left;" class="list-group">

                                  <?php
                                  $x = 0;
                                  while ($vetor_curso = mysqli_fetch_array($curso_resultado)) {

                                    echo "<li class='list-group-item itens'><p style='display:inline-block;'  class='disciplina'>Disciplina: " . $vetor_curso['disciplina']. "<br> </p><a class='aencerrar' style='display:none;' href='encerrar_curso.php?disciplina=".$vetor_curso['disciplina']."'aria-label='Close'><i class='fas fa-times close'></i></a><button value= 'edit".$x."' class='btn btn-danger aalterar' style='display:none;' href='#' aria-label='Edit'><i class='fas fa-pencil-alt edit'></i></button><br> Nome do Aluno: ". $vetor_curso['nome_completo']." <br><br> Nível: ". $vetor_curso['nivel']." <br> <br>   Tempo do Curso:  " . $vetor_curso['tempo_curso']. " <br> <br> Período: ".$vetor_curso['periodo']." <br> 

                                    </li>


                                    <input type='hidden' id='pedit".$x."' value='".$vetor_curso['nivel']."''>
                                    <input type='hidden' id='coedit".$x."' value='".$vetor_curso['disciplina']."''>
                                    <input type='hidden' id='tedit".$x."' value='".$vetor_curso['tempo_curso']."''>
                                    <input type='hidden' id='medit".$x."' value='".$vetor_curso['periodo']."''>
                                    <input type='hidden' id='moedit".$x."' value='".$vetor_curso['preco']."''>
                                    <input type='hidden' id='aedit".$x."' value='".$vetor_curso['cobranca']."''>
                                    <input type='hidden' id='cedit".$x."' value='".$vetor_curso['cod_curso']."''>


                                    ";
                                    $x = $x + 1 ;


                                  }

                                  ?>
                                  <div id="cagada"></div>
                            
                                </ul>

                              </center>
                            </div>

                          </div>
                        </div>
                      </div>

                    </main>

                  </div>

                </div>
              </div>
            </div>

            <script src="js/jquery.mask.min.js"></script>

          </html>

      
  <?php
}
else
{

  session_destroy();


  ?>
  <script>
    alert("Acesso Inválido!");
    document.location.href = "login.php";
  </script>
  <?php
}
}
?> 