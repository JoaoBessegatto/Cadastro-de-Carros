<?php
$modeloCarro = $_REQUEST['nomeCarro'];
$anoCarro = $_REQUEST['anoCarro'];
$marcaCarro = $_REQUEST['marca'];
$corCarro = $_REQUEST['corCarro'];
$combustivel = $_REQUEST['tipCombustivel'];
$km = $_REQUEST['km'];
$transmissao = $_REQUEST['transm'];
if(!isset($_POST['ar'])){
    $arcond = "Não";
}else{
    $arcond = $_REQUEST['ar'];
}
if(!isset($_POST['direcao'])){
    $direcao = "Não";
}else{
    $direcao = $_REQUEST['direcao'];
}
if(!isset($_POST['freio'])){
    $freio = "Não";
}else{
    $freio = $_REQUEST['freio'];
}
if(!isset($_POST['vidro'])){
    $vidro = "Não";
}else{
    $vidro = $_REQUEST['vidro'];
}
if(!isset($_POST['teto'])){
    $teto = "Não";
}else{
    $teto = $_REQUEST['teto'];
}
if(!isset($_POST['camera'])){
    $camera = "Não";
}else{
    $camera = $_REQUEST['camera'];
}
$hostname = "localhost";
$bancodedados = "carros";
$usr = "root";
$senha = "";
$mysqli = new mysqli($hostname, $usr, $senha, $bancodedados);
if($mysqli->connect_errno){
    echo "falha ao conectar:(" . $mysqli->connect_errno . ") " . $mysqli->connect_errno;
}
$sql = "INSERT INTO carros.cadastro(modelo, ano, marca, cor, combustivel, quilometragem, transmissao, ar_condicionado, direcao_hidraulica,freio_abs,vidro_eletrico,teto_solar,camera_de_re)
value('$modeloCarro','$anoCarro','$marcaCarro','$corCarro','$combustivel','$km','$transmissao','$arcond','$direcao','$freio','$vidro','$teto','$camera')";
$status = mysqli_query($mysqli, $sql);
if($status==1){
    echo "sucesso ao inserir registro!";
    echo "<br>";
}else if($status == 0){
    echo "erro ao inserir";
}
$sqli = "SELECT * FROM carros.cadastro";
$rs = mysqli_query($mysqli, $sqli);
while($r = mysqli_fetch_array($rs)){
    echo $r['modelo'] . " | " . 
         $r['ano'] . " | " .
         $r['marca'] . " | " . 
         $r['cor'] . " | " . 
         $r['combustivel'] . " | ". 
         $r['quilometragem'] . " | " . 
         $r['transmissao'] . " | " .
         $r['ar_condicionado'] . " | " . 
         $r['direcao_hidraulica'] . " | " . 
         $r['freio_abs'] . " | ".        
         $r['vidro_eletrico'] . " | " . 
         $r['teto_solar'] . " | " .
         $r['camera_de_re'] . " | " . "<br>" ;      
}
?>
