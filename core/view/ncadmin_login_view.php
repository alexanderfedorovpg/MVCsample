<div class="container">
	<?php
		if ( ! empty( $data ) ) {
			?>
            <div class="alert-danger">
				<?= $data ?>
            </div>
			<?php
		}
	?>
    <div class="center-block">
        <div class="col-xs-8 col-sm-8 col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Авторизация</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 login-box">
                            <form id="formLogin" method="post" action="/ncadmin/login" role="form">
                                <input type="hidden" name="enter">
                                <div class="input-group">
                                    <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="login" class="form-control" placeholder="Имя пользователя"
                                           required
                                           autofocus/>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" name="password" class="form-control" placeholder="Ваш пароль" required/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <button type="button" class="btn btn-labeled btn-success">
                                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Войти
                            </button>
                            <button type="button" class="btn btn-labeled btn-danger">
                                <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>Выход
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $('.btn-success').click(function () {
            $('#formLogin').serialize();
            $('#formLogin').submit();

        });
    });


</script>
