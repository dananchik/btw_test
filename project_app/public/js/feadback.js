$(document).ready(function () {
    $(".alert-danger").remove();
    $("#form_feadback").submit(function () {
        $(".alert-danger").remove();
        var $form = $(this);
        var response = grecaptcha.getResponse();

        if ($form.find("input[name=name]").val() === "") {
            $form.find("input[name=send_form]")
                .after('<p class="alert-danger text-center col-8 offset-2">вы не ввели имя</p>');
            return false;
        }
        if ($form.find("input[name=email]").val() === "") {
            $form.find("input[name=send_form]").after('<p class="alert-danger text-center col-8 offset-2">емаил не введен!</p>');
            return false;
        }
        if ($form.find("input[name=subject]").val() === "") {
            $form.find("input[name=send_form").after('<p class="alert-danger text-center col-8 offset-2">тема не введена!</p>');
            return false;
        }
        if ($form.find("textarea[name=text]").val() === "") {
            $form.find("input[name=send_form]").after('<p class="alert-danger text-center col-8 offset-2">Вы забыли ввести текст!</p>');
            return false;
        }
        if (response.length == 0) {
            $form.find("input[name=send_form]")
                .after('<p class="alert-danger text-center col-8 offset-2">вы не прошли проверку капчей!</p>');
            return false;
        }
        $.post(
            $form.attr("action"), // ссылка куда отправляем данные
            $form.serialize()     // данные формы
        );
    });
});