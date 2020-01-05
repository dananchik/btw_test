<?php

namespace project_app\controllers;

use project_app\brain\Controller;
use project_app\models\User;

class main_controller extends Controller
{
    function registr()
    {
        if (isset($_POST['send'])) {
            $errors = false;
            $email = htmlspecialchars(trim($_POST['email']));
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = 'SELECT email from users where email = :email';
                $email_rapit = $this->db->query($sql, ['email' => $email]);
                if (empty($email_rapit)) {
                    if (!empty($_POST['name'])) {
                        $name = htmlspecialchars(trim($_POST['name']));
                        if (!empty($_POST['surname'])) {
                            $surname = htmlspecialchars(trim($_POST['surname']));
                            if (!empty($_POST['password'])) {
                                $password = htmlspecialchars(trim($_POST['password']));
                                print_r(strlen($password));
                                if (strlen($password) >= 8) {
                                    if (!empty($_POST['password1'])) {
                                        $password1 = htmlspecialchars(trim($_POST['password1']));
                                        if ($password == $password1) {
                                            $date_birthday = null;
                                            if (!empty($_POST['dateofbirth'])) {
                                                $date_birthday = $_POST['dateofbirth'];
                                                print_r($date_birthday);
                                            }
                                            $gender = null;
                                            if (!empty($_POST['gender'])) {
                                                $gender = $_POST['gender'];
                                            }
                                            $user = new User($this->db);
                                            $user->new_user($email, $surname, $name, $password, $gender,
                                                $date_birthday);
                                        } else {
                                            $errors['password'] = 'пароли не совпадают';
                                        }
                                    } else {
                                        $errors['password'] = 'Вы не ввели повтор пароля';
                                    }
                                } else {
                                    $errors['password'] = 'пароль должен быть больше 8 символов';
                                }

                            } else {
                                $errors['password'] = 'Вы не ввели пароль';
                            }
                        } else {
                            $errors['family'] = "фамилия введена не верно";
                        }
                    } else {
                        $errors['name'] = 'имя не введено';
                    }

                } else {
                    $errors['email'] = 'такой емаил уже есть';
                }
                //   $sql = 'SELECT from users where email = '.$email;
                // $bool = $this->db->query($sql);
                // print_r($bool);

            } else {
                $errors['email'] = 'емеил не верный';
            }


        }
        $title = 'регистрация';
        $css = 'registr';
        $script = 'registr';
        $this->view->render("registr", ['title' => $title, 'css' => $css, 'script' => $script, 'errors' => $errors]);
    }

    function logout()
    {
        setcookie('email', '', time() - 2400);
        setcookie('login', '', time() - 2400);
        header('Location: http://kurave02.tech017.net.in/registration');
    }

    function avtorization()
    {
        if (isset($_POST['send'])) {
            $errors = false;
            if (isset($_POST['login_email']) and isset($_POST['login_password'])) {
                $email = htmlspecialchars(trim($_POST['login_email']));
                $password = htmlspecialchars(trim($_POST['login_password']));

                print_r(strlen($password));
                if (filter_var($email, FILTER_VALIDATE_EMAIL) and strlen($password) >= 8) {
                    $sql = 'SELECT email from users where email = :email and password = :password';
                    $avtorization = $this->db->query($sql, ['email' => $email, 'password' => $password]);

                    if (!empty($avtorization)) {
                        $user = new User($this->db);
                        $user->avtorizate($email);
                    }
                } else {
                    $errors[] = 'неправильно введен пароль или емаил';
                }

            } else {
                $errors[] = 'вы не заполнили форму!';
            }
        }
        $this->view->render("avtorization", ['errors' => $errors]);
    }
}