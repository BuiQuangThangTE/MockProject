<?php

class Admin extends Controller
{
    public function index()
    {

        require APP . "view/admin/login.php";

    }

    public function login()
    {
        if (isset($_POST['login_ad'])) {
            $username = $_POST['name_ad'];
            $password = $_POST['pass_ad'];
            $login = $this->model('user')->login($username, $password);
            if ($login['id_group'] == 1) {

                if (password_verify($password, $login['password'])) {
                    $_SESSION['login'] = 1;
                    $_SESSION['username'] = $login['username'];
                    $_SESSION['id_user'] = $login['user_id'];
                    $_SESSION['avatar'] = $login['avatar'];
                    $_SESSION['created_at'] = $login['created_at'];
                    $_SESSION['id_group'] = 1;
//                    $_SESSION['user']=$login;
                    header("location:" . URL . "admin/index_view");
                } else {
                    header("location:" . URL . "admin/login");
                }
            } else {
                header("location:" . URL . "admin");
            }
        } else {
            header("location:" . URL . "admin");
        }
    }

    public function logout()
    {
        if (isset($_POST['logout-ad'])) {
            unset($_SESSION['login']);
            unset($_SESSION['username']);
            unset($_SESSION['id_user']);
            unset($_SESSION['id_group']);
            unset($_SESSION['login']);
            header('location:' . URL);
        }


    }

    public function index_view()
    {
        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/index.php";
        require APP . "view/admin/__templates/footer.php";
    }

    public function category()
    {
        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/category.php";
        require APP . "view/admin/__templates/footer.php";
    }
}