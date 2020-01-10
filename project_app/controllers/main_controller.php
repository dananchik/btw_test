<?php

namespace project_app\controllers;

use project_app\brain\Controller;
use project_app\models\User;

class main_controller extends Controller
{
    function registr()
    {
        $errors = false;
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
                                if (strlen($password) >= 8) {
                                    $hash_password = password_hash($password, PASSWORD_BCRYPT);
                                    $date_birthday = null;
                                    if (!empty($_POST['dateofbirth'])) {
                                        $date_birthday = $_POST['dateofbirth'];
                                    }
                                    $gender = null;
                                    if (!empty($_POST['gender'])) {
                                        $gender = $_POST['gender'];
                                    }
                                    $user = new User($this->db);
                                    $user->new_user($email, $surname, $name, $hash_password, $gender,
                                        $date_birthday);
                                    $user->avtorizate($email);

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
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                if (filter_var($email, FILTER_VALIDATE_EMAIL) and strlen($password) >= 8) {
                    $sql = 'SELECT password from users where email = :email';
                    $hashed_password = $this->db->query($sql, ['email' => $email]);
                    if (!empty($hashed_password)) {
                        //print_r($hashed_password['0']['password']);
                        //  $bb = '555';
                        //  var_dump(password_verify($bb,password_hash($bb,PASSWORD_BCRYPT)));
                        if (print_r(password_verify($password, $hashed_password['0']['password']))) {
                            $user = new User($this->db);
                            $user->avtorizate($email);
                        }
                    } else {
                        $errors[] = 'ошибка в форме!';
                    }
                } else {
                    $errors[] = 'неправильно введен пароль или емаил';
                }

            } else {
                $errors[] = 'вы не заполнили форму!';
            }
        }
        $title = 'авторизация';
        $script = 'avtorizate';
        $this->view->render("avtorization", ['errors' => $errors, 'title' => $title, 'script' => $script]);
    }
}