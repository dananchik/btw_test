<?php if ($_COOKIE['login'] == false): ?>
    <h2 class="col-md-offset-6">Регистрация</h2>
    <form class="form-horizontal col-md-6 col-md-offset-3" action="" method="post" id="my_form">
        <div class="form-group">
            <label class="control-label col-xs-3" for="lastName">Фамилия:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="lastName" name="surname" placeholder="Введите фамилию">
                <?php if (!empty($params['errors']['family'])): ?>
                    <p class="alert-danger text-center col-8 offset-2"><?php echo $params['errors']['family']; ?></p>
                <?php endif; ?>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="firstName">Имя:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="name" id="firstName" placeholder="Введите имя">
                <div class="error-box"></div>
                <?php if (!empty($params['errors']['name'])): ?>
                    <p class="alert-danger text-center p-5 col-6 offset-3"><?php echo $params['errors']['name']; ?></p>
                <?php endif; ?>
            </div>

        </div>
        <div class="form-group">
            <label for="dateofbirth" class="control-label col-xs-3">Дата рождения</label>
            <div class="col-xs-9">
                <input type="date" class="form-control" name="dateofbirth" id="dateofbirth">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="inputEmail">Email:</label>
            <div class="col-xs-9">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                <?php if (!empty($params['errors']['email'])): ?>
                    <p class="alert-danger text-center col-8 offset-2"><?php echo $params['errors']['email']; ?></p>
                <?php endif; ?>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" name="password" id="inputPassword"
                       placeholder="Введите пароль">
                <div class="error-box"></div>
                <?php if (!empty($params['errors']['password'])): ?>
                    <p class="alert-danger text-center col-8 offset-2"><?php echo $params['errors']['password']; ?></p>
                <?php endif; ?>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-xs-3">Пол:</label>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" name="gender" value="male"> Мужской
                </label>
            </div>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" name="gender" value="female"> Женский
                </label>
            </div>
        </div>
        <br/>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" name="send" value="Регистрация">
                <input type="reset" class="btn btn-default" value="Очистить форму">
                <a href="avtorization" class="btn btn-success col-md-6 col-md-offset-1">Уже есть аккаунт?</a>
            </div>
        </div>
    </form>
<?php else: ?>

    <p class="alert-danger">вы уже авторизированы для начала выйдите с аккаунта</p>
    <a href="/logout" class="btn btn-dark">LOGOUT</a>
<?php endif; ?>