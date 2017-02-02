
<table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Имя пользователя</th>
        <th>Комментарий</th>
        <th>Удалить</th>
    </thead>
    <tbody>
<?php

    foreach ( $data as $row) {

        echo "<tr>
                <td>".$row['id']."</td>
                <td>
                    ".$row['full_name']." 
                </td>
                <td>".$row['comment']." <br/> <a href='javascript:void(0)'   onclick='open_comment(".$row['id'].")'>Открыть для изменения </a></td>
                <td>
                <form method='post'>
                        <input name='action' type='hidden' value='comments_del'/>
                        <input name='comm_id' type='hidden' value='".$row['id']."'/>
                        <button class='btn btn-default'>X</button>
                    </form>
                </td>
              </tr>";
    }
?>
    </tbody>
</table>

<div class="modal fade" id= "modal" tabindex= "-1 " role= "dialog"  aria-hidden= "true">
    <div class= "modal-dialog">
        <div class= " modal-content " >
            <div class= "modal-header ">
                <button type= "button" class= "close" data-dismiss= "modal" aria-hidden= "true">&times;</button>
                <h4 class= "modal-title " id= "myModalLabel">Изменить комментарий</h4>
                </div>
            <form method= "post">
                <input name= "action" type= "hidden" value= "comm_change"/>
                <input name= "pid" type= "hidden" value= ""/>
                <div class= "modal-body">
                    <div class= "input-group ">
                        <span class= "input-group-addon ">Имя</span>
                        <input name= "full_name" type= "text" class= "form-control" value= "" required/>
                    </div>
                    <div class= "form-group ">
                        <label for= "comment ">Коментарий:</label>
                        <textarea  name= "comment" class= "form-control" rows= "20 " id= "comment" required></textarea>
                        </div>
                    </div>
                <div class= "modal-footer ">
                    <button type= "button" class= "btn btn-default" data-dismiss= "modal">Закрыть</button>
                    <button type= "submit" class= "btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>

<!-- Modal -->


<script type="text/javascript">

        function open_comment(id) {

            $.ajax({
                url: '/comments/get_one?id='+id,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $('input[name=pid]').val(data['id']);
                    $('input[name=full_name]').val(data['full_name']);
                    $('textarea[name=comment]').text(data['comment']);
                    jQuery.noConflict();
                    $('#modal').modal();
                }

        });
        }

        
</script>
