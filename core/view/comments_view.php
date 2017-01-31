<?php
echo "<div>
    <h3>Коментарии:</h3> 
    <ul id='list_comm'>";

    foreach ( $data as $row) {
        echo "
        <li>
            <div class='text-warning'>".$row['full_name']."</div>
            <p>".$row['comment']." </p>
        </li>";
}

    echo"     
    </ul>
    <div class='form-horizontal comments'>
        <input placeholder='Имя' class='in btn-block' size='7' name='full_name' value=''/>
        <textarea name='comment' placeholder='Напишите комментарий' rows='10' class=' in btn-block'></textarea>
        <button id='btn_send_comm' class='btn btn-default'>Добавить</button>
    </div>
    
<script type='application/javascript'>
  $('document').ready(function(){

      $('#btn_send_comm').click(function () {
            var full_name = $('input[name=full_name]').val(),
                comment = $('textarea[name=comment]').val();
        
               $.ajax({
                        url: '/comments/add_comment?fk_tb_news=" . $_GET['id'] . "&full_name='+full_name+'&comment='+comment,             
                        dataType : \"html\",                     
                        success: function (data, textStatus) { 
                          
                           $('#list_comm').append(
                              $('<li/>').append(
                                  $('<div/>', {class:'text-warning', text: full_name}),
                                  $('<p/>',{text:comment})));
                    }
                });    
           });
  });
    
</script>
</div>";
