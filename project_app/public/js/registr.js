$(document).ready(function () {
    //  $(".alert-danger").remove();
    $("#my_form").submit(function () {
        // для читаемости кода
        $(".alert-danger").remove();
        var $form = $(this);
        if ($form.find("input[name=name]").val() === "") {
            $form.find("input[name=name]")
                .after('<p class="alert-danger text-center col-8 offset-2">вы не ввели имя</p>');
            return false;
        }
        if ($form.find("input[name=surname]").val() === "") {
            $form.find("input[name=surname]")
                .after('<p class="alert-danger text-center col-8 offset-2">вы не ввели фамилию</p>');
            return false;
        }
        if ($form.find("input[name=password]").val() === "" || $form.find("input[name=password]").val().length < 8) {
            $form.find("input[name=password]")
                .after('<p class="alert-danger text-center col-8 offset-2">пароль должен состоять минимум из 8 символов</p>');
            return false;
        }
        if ($form.find("input[name=email]").val() === "") {
            $form.find("input[name=email]").after('<p class="alert-danger text-center col-8 offset-2">емаил не введен!</p>');
            return false;
        }
        //   var pattern = '/.+@.+\\..+/i';
        //   if ($form.find("input[name=email]").val().search(pattern) == 0) {
        //       alert("hello");
        //      return false;
        // }
        $.post(
            $form.attr("action"), // ссылка куда отправляем данные
            $form.serialize()     // данные формы
        );
        alert("форма успешно отправлена!");

    });
});