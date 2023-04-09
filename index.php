
<?php

require "db.php";
$data = $_GET;
$interview = R::findOne('interviews', 'id = ?', array($data['id']));

$answers = json_decode($interview->answers_json);

$all_votes = R::findAll('votes');
$the_votes = array();

foreach ($all_votes as $row) {
    if($row['id_interview'] == $data['id']){
        $the_votes[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="content">
        <div class="interview_block" align="center">
            <p class="interview_title"><?php echo $interview->title; ?></p>

            <div class="block_vids">
                <?php for($i = 0; $i < count($answers); $i++) :?>
                    <?php 
                        $votes_count = 0;
                        foreach ($the_votes as $row) {
                            if($row['id_answer'] == $i){
                                $votes_count++;
                            }
                        }
                        
                        ?>
                    <button class="interview_button" onclick="vote(<?php echo $interview->id; ?>, <?php echo $i ?> );"><?php echo $answers[$i] . ' | '. $votes_count; ?> </button>

                    <?php endfor;?>
            </div> 

            <p class="votes_count">Голосов:  <?php echo count($the_votes); ?></p>
        </div>

        <a href="/add.php">Добавить опрос</a>
    
    </div>
<script src="libs/jquery.js"></script>
<script src="js/votes.js"></script>

</body>
</html>