$(document).ready(function () {
    $("#form").submit(function () {
        $(".alert-danger").remove();
        var $form = $(this);
        if ($form.find("input[name=login_email]").val() === "") {
            $form.find("input[name=login_email]")
                .after('<p class="alert-danger text-center col-8 offset-2">вы не ввели емаил</p>');
            return false;
        }
        if ($form.find("input[name=login_password]").val().length < 8) {
            $form.find("input[name=login_password]")
                .after('<p class="alert-danger text-center col-8 offset-2">Пароль меньше 8 символов</p>');
            return false;
        }
        $.post(
            $form.attr("action"), // ссылка куда отправляем данные
            $form.serialize()     // данные формы
        );
    })
});