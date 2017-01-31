<table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Дата последнего изменения</th>
        <th>Статус</th>
        <th>Заголовок</th>
        <th>Описание</th>
        <th>Содержание</th>
        <th>Коментарии</th>
        <th>Удалить</th>
    </thead>
    <tbody>
<?php
    foreach ( $data as $row) {
        echo " <tr>
                <td>".$row['id']."</td>
                <td>". date('Y-m-d H:i:s', strtotime($row['date']))."</td>
                <td>".($row['status']? 'Опубликован' :'Не опубликован' )."</td>
                <td><a href='javascript:void(0)' onclick='open_post(".$row['id'].")'>".$row['header']."</a></td>
                <td>".$row['meta']."</td>
                <td> ". substr($row['page_text'], 0, 301)."...</a></td>
                <td><a href='/ncadmin/comments?id=".$row['id']."'>Открыть</a></td>
                <td> 
                    <form method='post'>
                        <input name='action' type='hidden' value='post_del'/>
                        <input name='post_id' type='hidden' value='".$row['id']."'/>
                        <button class='btn btn-default'>X</button>
                    </form>
                </td>
            </tr>";
    }
    ?>
    </tbody>

</table>

<div>
    <button id="add_post" class='btn btn-default' data-toggle="modal" data-target="#modal_add_post">Добавить публикацию</button>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_add_post" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавить пост</h4>
            </div>
            <form method="post">
                <input name='action' type='hidden' value='post_add'/>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">Заголовок</span>
                        <input  name="header" type="text" class="form-control" placeholder="..." required/>
                    </div>
                    <div class="form-group">
                        <label for="meta">Описание:</label>
                        <textarea name="meta" class="form-control" rows="5" id="meta" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="page_text">Текст статьи:</label>
                        <textarea  name="page_text" class="form-control" rows="20" id="page_text" required></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_post_one" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавить пост</h4>
            </div>
            <form method="post">
                <input name='action' type='hidden' value='post_change'/>
                <input name='id' type='hidden' value=''/>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">Заголовок</span>
                        <input  name="header" type="text" class="form-control" placeholder="..." required/>
                    </div>
                    <div class="form-group">
                        <label for="meta">Описание:</label>
                        <textarea name="meta" class="form-control" rows="5" id="meta" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="page_text">Текст статьи:</label>
                        <textarea name="page_text" class="form-control" rows="20" id="page_text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="page_text">Статутс</label>
                            <select class="form-control" name="status">
                                <option value="true">Опубликован</option>
                                <option value="false">Не опубликован</option>
                            </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    function open_post(id) {

        $.ajax({
            url: '/news_item/get_one_news?id='+id,
            dataType: 'json',
            cache: false,
            success: function (data) {
                $('input[name=id]').val(data['id']);
                $('input[name=header]').val(data['header']);
                $('textarea[name=meta]').text(data['meta']);
                $('textarea[name=page_text]').text(data['page_text']);
                $('select[name=status] option').each(function(){ this.selected=false; });
                $('select[name=status] option[value='+data['status']+']').attr("selected", "selected");
                jQuery.noConflict();
                $('#modal_post_one').modal();
            }

        });
    }


</script>

