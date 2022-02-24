<?php

class Users extends Controller
{
    public function login()
    {

        $user = $this->model('user');
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $login = $this->model('user')->login($user->username);
        if ($login > 0) {
            if (password_verify($user->password, $login["password"])) {
                $success = array("error" => false, "message" => "Login thanh cong");
                Response::json(200, $success);
            } else {
                $error = array("error" => true, "message" => "Sai mat khau");
                Response::json(500, $error);
            }
        } else {
            $error = array("error" => true, "message" => "User khong ton tai");
            Response::json(500, $error);
        }
    }

    public function register()
    {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $error = [];

        }
    public function index()
    {
        if ($_SESSION['id_group'] == 1) {
            $table = "users";
            $trang = isset($_GET['trang']) ? $_GET['trang'] : 1;
            $load_users = $this->model('user')->getUsers();
            $so_users = count($load_users);
            $so_trang = ceil($so_users / 4);
            if ($so_users < 4) {
                $trang_hien_tai = 0;
                $so_trang = 1;
            } else {
                $trang_hien_tai = ($trang - 1) * 4;
            }
            $load_view_user = $this->model('user')->phanTrang($trang_hien_tai, 4);
            require APP . "view/admin/__templates/header.php";
            require APP . "view/admin/__templates/sidebar.php";
            require APP . "view/admin/users.php";
            require APP . "view/admin/__templates/footer.php";
        } else {
            header("location:" . URL);
        }

    }

    public function newUsers()
    {
        if (isset($_POST['save_user'])) {
            $path = "images/user/";
            $username = $_POST['user'];
            $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $avatar = "images/user/" . $_FILES['avatar']['name'];
//            $image = "images/blog/".$_FILES['post_image_create']['name'];
            $id_group = $_POST['id_group'];

            if ($this->model('user')->insertUser($username, $password, $email, $avatar, $id_group)) {
                move_uploaded_file($_FILES['avatar']['tmp_name'], $path . $_FILES['avatar']['name']);
                header("location:" . URL . "users?trang=1");
            }
        }
    }

    public function edit_user($user_id)
    {
        $user = $this->model('user')->getUserById($user_id);

        if (isset($_POST["name"]) && $_POST["name"] === "rule") {
            $newRule = $_POST["value"];
            $edit = $this->model('user')->editUser($user_id, $newRule);
            echo $edit;
        }


        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/edit_user.php";
        require APP . "view/admin/__templates/footer.php";
    }

    public function delete()
    {
        if (isset($_POST['action']) == "delete") {
            $id_user = $_POST['id'];
            if ($this->model('user')->delete_user($id_user)) {
//                echo "delete_thanhcong";
                Response::json(200, 'delete_thanhcong');
            }
        }
    }
}