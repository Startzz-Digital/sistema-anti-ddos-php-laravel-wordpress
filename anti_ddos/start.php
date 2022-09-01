<?php 
/**
* AntiDDOS System
* FILE: index.php
* By Sanix Darker
* Update GnuBrasil
*/
function safe_print($value){
$value .= "";
return strlen($value) > 1 && (strpos($value, "0") !== false) ? ltrim($value, "0") : (strlen($value) == 0 ? "0" : $value);
}
if(!isset($_SESSION)){
session_start();
}
if(isset($_SESSION['standby'])){
// There is all your configuration
$_SESSION['standby'] = $_SESSION['standby']+1;
$ad_ddos_query = 5;// ​​number of requests per second to detect DDOS attacks
$ad_check_file = 'check.txt';// file to write the current state during the monitoring
$ad_all_file = 'all_ip.txt';// temporary file
$ad_black_file = 'black_ip.txt';// will be entered into a zombie machine ip
$ad_white_file = 'white_ip.txt';// ip logged visitors
$ad_temp_file = 'ad_temp_file.txt';// ip logged visitors
$ad_dir = 'anti_ddos/files';// directory with scripts
$ad_num_query = 0;// ​​current number of requests per second from a file $check_file
$ad_sec_query = 0;// ​​second from a file $check_file
$ad_end_defense = 0;// ​​end while protecting the file $check_file
$ad_sec = date("s");// current second
$ad_date = date("is");// current time
$ad_defense_time = 100;// ddos ​​attack detection time in seconds at which stops monitoring
$config_status = "";
function Create_File($the_path){
$handle = fopen($the_path, 'a+') or die('Cannot create file:  '.$the_path);
return "Creating ".$the_path." .... done";
}
// Checking if all files exist before launching the cheking
$config_status .= (!file_exists("{$ad_dir}/{$ad_check_file}")) ? Create_File("{$ad_dir}/{$ad_check_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_check_file}<br>";
$config_status .= (!file_exists("{$ad_dir}/{$ad_temp_file}")) ? Create_File("{$ad_dir}/{$ad_temp_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_temp_file}<br>";
$config_status .= (!file_exists("{$ad_dir}/{$ad_black_file}")) ? Create_File("{$ad_dir}/{$ad_black_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_black_file}<br>";
$config_status .= (!file_exists("{$ad_dir}/{$ad_white_file}")) ? Create_File("{$ad_dir}/{$ad_white_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_white_file}<br>";
$config_status .= (!file_exists("{$ad_dir}/{$ad_all_file}")) ? Create_File("{$ad_dir}/{$ad_all_file}") : "ERROR: Creating "."{$ad_dir}/{$ad_all_file}<br>";
if(!file_exists ("{$ad_dir}/../anti_ddos.php")){
$config_status .= "anti_ddos.php does'nt exist!";
}
if (!file_exists("{$ad_dir}/{$ad_check_file}") or 
!file_exists("{$ad_dir}/{$ad_temp_file}") or 
!file_exists("{$ad_dir}/{$ad_black_file}") or 
!file_exists("{$ad_dir}/{$ad_white_file}") or 
!file_exists("{$ad_dir}/{$ad_all_file}") or 
!file_exists ("{$ad_dir}/../anti_ddos.php")) {
$config_status .= "Some files does'nt exist!";
die($config_status);
}
// TO verify the session start or not
require ("{$ad_dir}/{$ad_check_file}");
if ($ad_end_defense and $ad_end_defense> $ad_date) {
require ("{$ad_dir}/../anti_ddos.php");
} else {
$ad_num_query = ($ad_sec == $ad_sec_query) ? $ad_num_query++ : '1 ';
$ad_file = fopen ("{$ad_dir}/{$ad_check_file}", "w");
$ad_string = ($ad_num_query >= $ad_ddos_query) ? '<?php $ad_end_defense='.safe_print($ad_date + $ad_defense_time).'; ?>' : '
<?php $ad_num_query='. safe_print($ad_num_query) .'; $ad_sec_query='. safe_print($ad_sec_query) .'; ?>';
fputs ($ad_file, $ad_string);
fclose ($ad_file);
}
}else{
$_SESSION['standby'] = 1;
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
header("refresh:8,".$actual_link);
?>
<style type="text/css">
  html,body{
    background:#009c3b;
    overflow:hidden}
  .first{
    margin:155px auto }
  span
  {
    width:10px;
    height:10px;
    background: yellow;
    border-radius:50%;
    display:block;
    margin-left:30px;
    box-shadow:30px 30px 20px 2px steelblue;
    -webkit-animation: rotate 10s linear infinite;
    animation: rotate 10s linear infinite;
  }
  @keyframes rotate {
    from {
      transform: rotateZ(360deg);
    }
    to {
      transform: rotateZ(0deg);
    }
  }
  @-webkit-keyframes rotate {
    from {
      -webkit-transform: rotateZ(360deg);
    }
    to {
      -webkit-transform: rotateZ(0deg)
    }
  }
</style>
<div>
  <span class="first"/>
  <span/>
  <span/>
  <span/>
  <span/>
  <span/>
</div>
<div class="loading__msg">
  <center>
<div style="color: white;" id="startzz">
</div>
    <br>
    <p style="color: white;">
      <?
echo $_SERVER["REMOTE_ADDR"];
?> 
    </p>
<div style="color: white;" id="log">
</div>
  </center>
</div>
</div>
<script>
  var div = document.getElementById('log');
  var texto = 'Olá, não se preocupe, esta é uma verificação de segurança simples, você verá isso apenas uma vez';
  function escrever(str, el) {
    var char = str.split('').reverse();
    var typer = setInterval(function() {
      if (!char.length) return clearInterval(typer);
      var next = char.pop();
      el.innerHTML += next;
    }
                            , 100);
  }
  escrever(texto, div);
</script>

<script>
  var div = document.getElementById('startzz');
  var texto = 'Startzz AntiDDOS está verificando seu IP';
  function escrever(str, el) {
    var char = str.split('').reverse();
    var typer = setInterval(function() {
      if (!char.length) return clearInterval(typer);
      var next = char.pop();
      el.innerHTML += next;
    }
                            , 100);
  }
  escrever(texto, div);
</script>
<?php exit();
}
?>
