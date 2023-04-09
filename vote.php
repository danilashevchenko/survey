<?php
require "db.php";
$data = $_POST;

$vote = R::dispense('votes');
$vote->id_interview = $data['id_interview'];
$vote->id_answer = $data['id_answer'];
R::store($vote);
?>