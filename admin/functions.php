<?php
require_once "functions/url.php";

function verificaUsuario($url){
    if(!$_SESSION['administrador_logado']){
        $_SESSION['url'] = "/".$url;
        header("Location: login.php");
        exit;
    }
}

function logOutUsuario() {
  if (isset($_SESSION['administrador_logado'])) {
    unset($_SESSION['administrador_logado']);
    session_destroy();
    echo "<script>location.href='".URL_ADMIN."/login.php'</script>";
    exit();
  }
}

function data_extenso(){
  // leitura das datas automaticamente
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$semana = date('w');
$cidade = "Digite aqui sua cidade";

// configuração mes

switch ($mes){

case 1: $mes = "Janeiro"; break;
case 2: $mes = "Fevereiro"; break;
case 3: $mes = "Março"; break;
case 4: $mes = "Abril"; break;
case 5: $mes = "Maio"; break;
case 6: $mes = "Junho"; break;
case 7: $mes = "Julho"; break;
case 8: $mes = "Agosto"; break;
case 9: $mes = "Setembro"; break;
case 10: $mes = "Outubro"; break;
case 11: $mes = "Novembro"; break;
case 12: $mes = "Dezembro"; break;

}


// configuração semana

switch ($semana) {

case 0: $semana = "Domingo"; break;
case 1: $semana = "Segunda Feira"; break;
case 2: $semana = "Terça Feira"; break;
case 3: $semana = "Quarta Feira"; break;
case 4: $semana = "Quinta Feira"; break;
case 5: $semana = "Sexta Feira"; break;
case 6: $semana = "Sábado"; break;

}
//Agora basta imprimir na tela...
return ("$semana, $dia de $mes de $ano");
}
