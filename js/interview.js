$(document).ready(function(){
    var id_answer = 0;
    var input_answer = '';
    
    $('#add_field').click(function(){
    id_answer++;
    input_answer = '<input type="text" id_answer="' + id_answer + '" placeholder="Вариант ответа">';
    $('#block_vids').append(input_answer);

    });

$('#save').click(function(){
    var title_text = $('.title_input').val();
    var array_answers = [];

    for(let index = 1; index < id_answer + 1; index++){
        var answer = $('[id_answer="' + index + '"]').val();
        array_answers.push(answer);
    }
    $.ajax({
        url: 'save.php',
        type: "POST",
        data: {title: title_text, answer: array_answers},
        success: function(results){
            $('#debug').html(results);
        }
      });
    });
});