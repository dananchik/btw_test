
</head>
<body>
<h2 class="col-md-offset-6">Регистрация</h2>
<form class="form-horizontal col-md-6 col-md-offset-3" action="" method="post">
    <div class="form-group">
        <label class="control-label col-xs-3" for="lastName">Фамилия:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="lastName" name="surname" placeholder="Введите фамилию">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" for="firstName">Имя:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="name" id="firstName" placeholder="Введите имя">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Дата рождения:</label>
        <div class="col-xs-3">
            <select class="form-control" name="day">
                <option></option>
            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="month">
                <option></option>
            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name = "year">
                <option></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" for="inputEmail">Email:</label>
        <div class="col-xs-9">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Введите пароль">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" name="password1" id="confirmPassword" placeholder="Введите пароль ещё раз">
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
    <br />
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="submit" class="btn btn-primary" name="send" value="Регистрация">
            <input type="reset" class="btn btn-default" value="Очистить форму">
            <a href="avtorization" class="btn btn-success col-md-6 col-md-offset-1">Уже есть аккаунт?</a>
        </div>
    </div>
</form>