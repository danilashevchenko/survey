function vote(id_interview, id_answer){
    $.ajax({
    url: 'vote.php',
    type: "POST",
    data: {id_interview: id_interview, id_answer: id_answer}
});
}