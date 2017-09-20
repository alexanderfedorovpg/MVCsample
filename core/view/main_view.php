<div>
    <h2>Последние отзывы</h2>
</div>
<!-- Main -->
<div>
    <!-- Comments -->
    <table id="grid" class="table">
        <thead>
        <tr>
            <th class="up" data-type="string">Имя</th>
            <th class="up" data-type="string">Email</th>
            <th class="up" data-type="date">Дата</th>
        </tr>
        </thead>
        <tbody>
		<?php
			if ( $data ) {
				foreach ( $data as $row ) {
					?>
                    <tr>
                        <td><a class="openCard" data-id="<?= $row['id'] ?>"
                               href="javascript:void(0)"><b><?= $row['name'] ?></b></a></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['cdate'] ?></td>
                    </tr>
					<?php
				}
			}
		?>
        </tbody>
    </table>
</div>
<div>
    <div id="info"></div>
    <form id="formComment" class="form-horizontal feedback" method="post" action="/comments/add_comment"
          enctype="multipart/form-data">
        <label class="control-label" for="name">Имя</label>
        <input name="name" type="text" id="name" class="form-control" placeholder="..." required>
        <label class="control-label" for="email">Email</label>
        <input name="email" type="email" id="email" class="form-control" placeholder="..." required>
        <label class="control-label" for="comment">Текст сообщения</label>
        <textarea class="form-control" name="comment" id="comment" required></textarea>
        <label class="control-label" for="image">Картинка</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png,image/gif">
        <input type="button" id="pre_view" class="btn btn-default" value="Предварительный просмотр"/>
        <input type="submit" class="btn btn-primary" value="Отправить"/>
    </form>
</div>

<!-- Modal -->

<div class="modal fade" id="modal" tabindex="-1 " role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class=" modal-content ">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title " id="myModalLabel">Просмотр</h4>
            </div>
            <div class="modal-body">
                <img id="preimage" src="#" width="320" alt="..." class="img-thumbnail center-block">
                <div class="input-group">
                    <span class="input-group-addon ">Имя</span>
                    <input name="prename" type="text" class="form-control" readonly value=""/>
                </div>
                <div class="input-group">
                    <span class="input-group-addon ">Email</span>
                    <input name="preemail" type="text" class="form-control" readonly value=""/>
                </div>
                <div class="form-group">
                    <label for="precomment ">Коментарий:</label>
                    <textarea name="precomment" class="form-control" rows="5 " readonly id="precomment"></textarea>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#preimage').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }


            function validForm(from) {
                for (var i = 0; i < from[0].length; i++) {

                    if (from[0][i].checkValidity() == false) {
                        return false;
                    }
                }
                return true;
            }

            $("#image").change(function () {
                readURL(this);
            });


            $('#pre_view').click(function () {
                if (validForm($('#formComment'))) {

                    $('input[name=prename]').val($('input[name=name]').val());
                    $('input[name=preemail]').val($('input[name=email]').val());
                    $('textarea[name=precomment]').val($('textarea[name=comment]').val());
                    $('#info').empty();
                    $('#modal').modal();
                }
                else {
                    $('#info').text("Проверьте правильность полей");
                }
            });

            $(".openCard").click(function () {
                var id = this.getAttribute('data-id');
                $.ajax({
                    url: '/comments/get_one?id=' + id,
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        $('input[name=prename]').val(data['name']);
                        $('input[name=preemail]').val(data['email']);
                        $('textarea[name=precomment]').text(data['comment']);
                        $('#preimage').attr('src', data['path_img']);
                        $('#modal').modal();
                    }

                });
            });


        });


    </script>