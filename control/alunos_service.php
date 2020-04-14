<?php
$url  = 'http://127.0.0.1:5002/students';
$answers = explode(",", $_POST['answers']);

$answers = array_count_values($answers);
$maxAnswer = array_search(max($answers), $answers);

if($maxAnswer == 1){
    $profile = 'Analista';
} elseif($maxAnswer== 2){
    $profile = 'Comunicador';
} elseif($maxAnswer == 3){
    $profile = 'Planejador';
} else {
    $profile = 'Executor';
}

$dataAluno = json_encode(array('nameStudent' => $_POST['nomeAluno'],'email' => $_POST['email'], 'idProjeto' => $_POST['projeto'],'profile' => $profile));
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataAluno);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = json_decode(curl_exec($ch),true)[0];
echo $maxAnswer;
?>

