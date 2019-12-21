<script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
<form class="form-horizontal col-md-6 col-md-offset-3" action="" method="post">
    <div class="form-group">
        <label class="control-label col-xs-3" for="firstName">Имя:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="name" id="firstName" placeholder="Введите имя">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <div class="g-recaptcha" data-sitekey="6Lc9ZMgUAAAAABZdx4xmkrSgl3QotUErYY4-nrDG"></div>
            <input type="submit" class="btn btn-primary" name="send_form" id="send_form" value="Отправить">
        </div>
    </div>
</form>