<h2 class="col-md-offset-6">Вход</h2>

<form class="form-horizontal col-md-6 col-md-offset-3" action="" method="post" id = "form">
    <div class="form-group">
        <label class="control-label col-xs-3" for="inputEmail">Email:</label>
        <div class="col-xs-9">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="login_email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" name="login_password" id="inputPassword"
                   placeholder="Введите пароль">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="submit" class="btn btn-primary" name="send" id="send_form" value="Вход">
        </div>
    </div>
</form>
<script src="project_app/public/js/avtorizate.js"></script>