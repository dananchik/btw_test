<?php

namespace project_app\controllers;

use project_app\brain\Controller;
use project_app\models\User;

class main_controller extends Controller
{
    function registr()
    {
        if (isset($_POST['send'])) {
            $email = htmlspecialchars(trim($_POST['email']));
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = 'SELECT email from users where email = :email';
                $email_rapit = $this->db->query($sql, ['email' => $email]);
                if (empty($email_rapit)) {
                    if (isset($_POST['name'])) {
                        $name = htmlspecialchars(trim($_POST['name']));
                        if (isset($_POST['surname'])) {
                            $surname = htmlspecialchars(trim($_POST['surname']));
                            if (isset($_POST['password'])) {
                                $password = htmlspecialchars(trim($_POST['password']));
                                if (isset($_POST['password1'])) {
                                    $password1 = htmlspecialchars(trim($_POST['password1']));
                                    if ($password == $password1) {
                                        $date_birthday = null;
                                        if (!empty($_POST['day']) and !empty($_POST['month']) and !empty($_POST['year'])) {
                                            $date_birthday = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
                                        }
                                        $gender = null;
                                        if (isset($_POST['gender'])) {
                                            $gender = $_POST['gender'];
                                        }
                                        $user = new User();
                                        $user->new_user($email, $surname, $name, $password, $gender, $date_birthday);
                                    } else {
                                        echo 'пароли не совпадают';
                                    }
                                } else {
                                    echo 'Вы не ввели повтор пароля';
                                }
                            } else {
                                echo 'Вы не ввели пароль';
                            }
                        } else {
                            echo "фамилия введена не верно";
                        }
                    } else {
                        echo 'имя не введено';
                    }

                } else {
                    echo 'такой емаил уже есть';
                }
                //   $sql = 'SELECT from users where email = '.$email;
                // $bool = $this->db->query($sql);
                // print_r($bool);

            } else {
                echo 'емеил не верный';
            }


        }

        $this->view->render("registr", "Регистрация");
    }

    function avtorization()
    {
        if (isset($_POST['send'])) {
            if (isset($_POST['login_email']) and isset($_POST['login_password'])) {
                $email = htmlspecialchars(trim($_POST['login_email']));
                $password = htmlspecialchars(trim($_POST['login_password']));
                if (filter_var($email, FILTER_VALIDATE_EMAIL) and $password > 8) {
                    $sql = 'SELECT email from users where email = :email and password = :password';
                    $avtorization = $this->db->query($sql, ['email' => $email, 'password' => $password]);

                    if (!empty($avtorization)) {
                        $user = new User();
                        $user->avtorizate($email);
                    }
                } else {
                    echo 'неправильно введен пароль или емаил';
                }

            } else {
                echo 'вы не заполнили форму!';
            }
        }

        $this->view->render("avtorization", "авторизация");
    }
}