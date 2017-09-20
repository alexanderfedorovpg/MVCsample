<table id="grid" class="table table-bordered">
    <thead>
    <th>ID</th>
    <th>Дата коментария</th>
    <th>Статус</th>
    <th>Картинка</th>
    <th>Имя</th>
    <th>Email</th>
    <th>Текст</th>
    <th>Удалить</th>
    </thead>
    <tbody>
	<?php
		foreach ( $data as $row ) {
			echo " <tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['cdate'] . "</td>
                <td>" . ( $row['status'] ? 'Принят' : 'Не принят' ) . "</td>
                <td> <img width='50' src=' " . $row['path_img'] . "'/></td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td> " . substr( $row['comment'], 0,
					301 ) . "...  <a href='javascript:void(0)' class='link'   data-id='" . $row['id'] . "'>Открыть для изменения </a></td>
                <td> 
                    <form method='post'>
                        <input name='action' type='hidden' value='post_del'/>
                        <input name='post_id' type='hidden' value='" . $row['id'] . "'/>
                        <button class='btn btn-default'>X</button>
                    </form>
                </td>
            </tr>";
		}
	?>
    </tbody>

</table>


<!-- Modal -->

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <span class="input-group-addon">Пользователь</span>
                        <input name="name" type="text" class="form-control" placeholder="..." required/>
                    </div>
                    <div class="form-group">
                        <label for="page_text">Текст:</label>
                        <textarea name="comment" class="form-control" rows="20" id="page_text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="page_text">Статутс</label>
                        <select class="form-control" name="status">
                            <option value="1">Опубликован</option>
                            <option value="0">Не опубликован</option>
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

    jQuery(document).ready(function ($) {
        $('.link').click(function () {
            var id = this.getAttribute('data-id');
            $.ajax({
                url: '/comments/get_one?id=' + id,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $('input[name=id]').val(data['id']);
                    $('input[name=name]').val(data['name']);
                    $('textarea[name=comment]').text(data['comment']);
                    $('select[name=status] option[value=' + data['status'] + ']').attr("selected", "selected");
                    $('#modal').modal();
                }

            });

        });
    });

</script>

