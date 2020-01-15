<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php if (isset($params['title'])): ?>
        <title><?php echo $params['title'] ?></title>
	<?php else: ?>
        <title>Погодный сайтик</title>
	<?php endif; ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<?php if (isset($params['css'])): ?>
        <link rel="stylesheet" href="<?php echo "project_app/public/css/" . $params['css'] . ".css"; ?>"></link>
	<?php endif; ?>

</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">BTW_TEST</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="/" class="nav-link">Погода</a></li>
            <li class="nav-item"><a href="/feadback" class="nav-link">Отзыв</a></li>
            <li class="nav-item"><a href="/show_feadbacks" class="nav-link">Все отзывы</a></li>
        </ul>
        <div class="navbar-nav ml-auto">


			<?php if (isset($_SESSION['login']) and isset($_SESSION['email'])): ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                       data-toggle="dropdown"><?php echo $_SESSION['email']; ?>
                        <b
                                class="caret"></b></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
			<?php else: ?>
                <li class="nav-item"><a class="nav-link" href="/registration">Регистрация</a></li>
                <li class="nav-item"><a class="nav-link" href="/avtorization">Авторизация</a></li>
			<?php endif; ?>
            </ul>
        </div>
</nav>
<?php
echo $content_view;
?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<?php if (isset($params['script'])): ?>
    <script src="<?php echo 'project_app/public/js/' . $params['script'] . '.js'; ?>"></script>
<?php endif; ?>
</body>
</html>

