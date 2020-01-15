<script src="https://www.google.com/recaptcha/api.js"></script>
<form class="form-horizontal col-md-6 col-md-offset-3" action="" method="post" id="form_feadback">
    <div class="form-group">
        <label class="control-label col-xs-3" for="name">Имя:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" for="email">email:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="email" id="email" placeholder="Введите email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" for="subject">Тема:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Введите тему">
        </div>
    </div>
    <div class="form-group">
        <label for="text">Сообщение:</label>
        <textarea class="form-control rounded-0" id="text" rows="3" name="text"
                  placeholder="Введите сообщение"></textarea>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <div class="g-recaptcha" data-sitekey="6LcnYMwUAAAAAHa2qgQAX_Dm87L9CM3ZLKCLG6YU"></div>
            <input type="submit" class="btn btn-primary" name="send_form" id="send_form" value="Отправить">
			<?php if (!empty($params['errors'])): ?>
                <p class="alert-danger text-center col-8 offset-2"><?php echo $params['errors']; ?></p>
			<?php endif; ?>
        </div>
    </div>
</form>