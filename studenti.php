

<?php
$method = $_SERVER["REQUEST_METHOD"];
include('./studentidb/Studente.php');
$alunni = new Studente();

switch($method) 
{
  case 'GET':
      $studenti = $alunni->all();
      $js_encode = json_encode(array('state'=>TRUE, 'studenti'=>$studenti),true);
	  header("Content-Type: application/json");

	foreach($arr['Studenti'] as $arrstudente){
		$nome = $arrstudente["Nome"];
		$cognome = $arrstudente["Cognome"];
		$sidi = $arrstudente["Codice Sidi"];
		$tassa = $arrstudente["Codice TAX"];
		echo "<div class='row align-items-start'>
            <div class='col-md-2'> </div>
            <div class='col-md-2'> $nome $cognome </div>
            <div class='col-md-2'> $sidi </div>
            <div class='col-md-3'> $tassa </div>
            <div class='col-md-1'>
                <input class='remove' type='button'/> 
                <input class='add' type='button' /> 
            </div>;
	}"
}
?>