<?php
require "db.php";
$data = $_POST;

$answers = json_encode($data['answer']);

$interview = R::dispense('interviews');
$interview->title = $data['title'];
$interview->answers_json = $answers;
R::store($interview);

?>

