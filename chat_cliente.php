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
  $cod_cliente = $_SESSION["cod_cliente"];

  if($system_control == 1 && $privilegio == 0){
    require('connect.php');

    $sql_pesquisa ="SELECT * FROM `cliente` WHERE `cod_login` = $cod_login" ;
    $resultado = mysqli_query($conn,$sql_pesquisa);
    $vetor = mysqli_fetch_array($resultado);

    $sql ="SELECT * FROM `login` WHERE `cod_login` = $cod_login" ;
    $resultado_pesquisa = mysqli_query($conn,$sql);
    $vetor_login = mysqli_fetch_array($resultado_pesquisa);



    $_SESSION["nome"] = $vetor["nome"];
    ?>

    <!DOCTYPE html>
    <html>

    <head>
      <title>Chat Cliente</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="scss/main.css">
      <link rel="stylesheet" href="css/chat.css">
      <!-- Our Custom CSS -->
      <link rel="stylesheet" type="text/css" href="css/style.css">

      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
    </head>

    <body style="overflow-x: hidden;">


      <?php
      require("navbar_cliente.html");
      ?>


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
              <a class="nav-link" href="form_alterar_usuario.php">Informações de Conta</a>
            </li>

          </ul>
        </div>
      </nav>
      <br>
      <br>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <h4 align="center">Professores Online</h4>
        <p align="right">Olá - <?php echo $_SESSION['nome']; ?></p>
        <div id="user_details"></div>
         </div>
   </div>
      <div class="table-responsive">
    
    <div id="user_details"></div>
    <div id="user_model_details"></div>
   </div>
  </div>
    </body>  
</html>
<script type="text/javascript">
  
  $(document).on('click', '.remove_chat', function(){
  var chat_message_id = $(this).attr('id');
  if(confirm("Are you sure you want to remove this chat?"))
  {
   $.ajax({
    url:"remove_chat.php",
    method:"POST",
    data:{chat_message_id:chat_message_id},
    success:function(data)
    {
     update_chat_history_data();
    }
   })
  }
 });
</script>
<style>

.chat_message_area
{
 position: relative;
 width: 100%;
 height: auto;
 background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#group_chat_message
{
 width: 100%;
 height: auto;
 min-height: 80px;
 overflow: auto;
 padding:6px 24px 6px 12px;
}

.image_upload
{
 position: absolute;
 top:2px;
 right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}

</style>  

 


<script>  
$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
  fetch_group_chat_history();
 }, 5000);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }

 function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="Você está conversando com  '+to_user_name+'">';
  modal_content += '<div style="height:290px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:30px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-primary send_chat">Enviar</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:450
  });
  $('#user_dialog_'+to_user_id).dialog('open');
  $('#chat_message_'+to_user_id).emojioneArea({
   pickerPosition:"top",
   toneStyle: "bullet"
  });
 });

 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    //$('#chat_message_'+to_user_id).val('');
    var element = $('#chat_message_'+to_user_id).emojioneArea();
    element[0].emojioneArea.setText('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

$(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
 });

 $(document).on('focus', '.chat_message', function(){
  var is_type = 'yes';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {

   }
  })
 });

 $(document).on('blur', '.chat_message', function(){
  var is_type = 'no';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    
   }
  })
 });

 

 $('#group_chat').click(function(){
  $('#group_chat_dialog').dialog('open');
  $('#is_active_group_chat_window').val('yes');
  fetch_group_chat_history();
 });

 $('#send_group_chat').click(function(){
  var chat_message = $('#group_chat_message').html();
  var action = 'insert_data';
  if(chat_message != '')
  {
   $.ajax({
    url:"group_chat.php",
    method:"POST",
    data:{chat_message:chat_message, action:action},
    success:function(data){
     $('#group_chat_message').html('');
     $('#group_chat_history').html(data);
    }
   })
  }
 });

 function fetch_group_chat_history()
 {
  var group_chat_dialog_active = $('#is_active_group_chat_window').val();
  var action = "fetch_data";
  if(group_chat_dialog_active == 'yes')
  {
   $.ajax({
    url:"group_chat.php",
    method:"POST",
    data:{action:action},
    success:function(data)
    {
     $('#group_chat_history').html(data);
    }
   })
  }
 }

 $('#uploadFile').on('change', function(){
  $('#uploadImage').ajaxSubmit({
   target: "#group_chat_message",
   resetForm: true
  });
 });
 
});  
</script>

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