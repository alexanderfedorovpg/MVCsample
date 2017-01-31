<?php

echo "
<div>
    <h1>".$data['header']."</h1>
    <p>".$data['page_text']."</p>
</div>
<a id='get_comments' href='javascript:void(0)'>Открыть комментарии(".$data['count_comm'].")</a>
<div id='comment'></div>
<script type='text/javascript'>
$('document').ready(function(){
    $('#get_comments').click(function () {
        
       if($(this).text()=='Открыть комментарии(" . $data['count_comm'] . ")'){
           $.ajax({
                    url: '/comments?id=" . $data['id'] . "',            
                    dataType : \"html\",                     
                    success: function (data, textStatus) { 
                       $('#comment').append(data); 
                       $('#get_comments').empty();
                       $('#get_comments').append('Закрыть комментарии'); 
                    }});
            }   
            else{
                  $('#comment').empty();
                  $('#get_comments').empty();
                  $('#get_comments').append('Открыть комментарии(" . $data['count_comm'] . ")'); 
                 }
        });
    });
</script>" ;

