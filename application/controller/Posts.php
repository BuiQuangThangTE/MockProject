<?php

class Posts extends Controller
{

//    PHP
    public function index()
    {
        if ($_SESSION['id_group'] == 1) {
            $trang = isset($_GET['trang']) ? $_GET['trang'] : 1;
            $so_post = $this->model('post')->getTotal();
            $so_trang = ceil($so_post / 4);
            if ($so_post < 4) {
                $trang_hien_tai = 0;
                $so_trang = 1;
            } else {
                $trang_hien_tai = ($trang - 1) * 4;
            }
            $load_view_user = $this->model('post')->phantrang($trang_hien_tai, 4);

            require APP . "view/admin/__templates/header.php";
            require APP . "view/admin/__templates/sidebar.php";
            require APP . "view/admin/posts.php";
            require APP . "view/admin/__templates/footer.php";
        } else {
            header("location:" . URL);
            exit();
        }

    }

    public function create_post()
    {
        $totalCate = $this->model('post')->getCategory();
        if (isset($_POST["btn_create_post"])) {
            $path = 'images/blog/';
            $title = $_POST["post_title_create"];
            $description = $_POST["post_description_create"];
            $content = $_POST["post_content_create"];
            $category_id = $_POST["post_category_create"];
            $user_id = $_SESSION['id_user'];
            $image = "images/blog/" . $_FILES['post_image_create']['name'];

            if ($this->model('post')->createBlog($title, $description, $content, $category_id, $user_id, $image)) {
                move_uploaded_file($_FILES['post_image_create']['tmp_name'], $path . $_FILES['post_image_create']['name']);
                header("Location: " . URL . "posts");
            }
        }
        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/create_post.php";
        require APP . "view/admin/__templates/footer.php";
    }

    public function view_edit_post($blog_id)
    {
        $totalCate = $this->model('post')->getCategory();
        $edit_blog = $this->model('post')->getOneBlog($blog_id);
        $category_name = $this->model('post')->get_category_blog($edit_blog["category_id"]);
        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/edit_posts.php";
        require APP . "view/admin/__templates/footer.php";

    }

    public function edit_post()
    {
        if (isset($_POST['btn_edit_post'])) {
//            header("Location: " . URL ."posts");

            $blog_id = $_POST["blog_id"];
            $path = 'images/blog/';
            $title = $_POST["post_title_edit"];
            $description = $_POST["post_description_edit"];
            $content = $_POST["edit_post_content"];
            $category_id = $_POST["post_category_edit"];
            if ($_FILES['post_image_edit']['name'] == "") {
                if ($this->model('post')->edit_blog($title, $description, $content, $category_id, $blog_id)) {
                    header("Location: " . URL . "posts");
                }
            } else {
                $image = "images/blog/" . $_FILES['post_image_edit']['name'];
                if ($this->model('post')->edit_blog($title, $description, $content, $category_id, $image, $blog_id)) {
                    move_uploaded_file($_FILES['post_image_create']['tmp_name'], $path . $_FILES['post_image_create']['name']);
                    header("Location: " . URL . "posts");
                }
            }

        }
    }


    public function delete()
    {
        if (isset($_POST['action']) == "delete") {
            $blog_id = $_POST['id'];
            if ($this->model('post')->delete_blog($blog_id)) {
                Response::json(200, 'delete_thanhcong');
            }
        }
    }

    public function comments()
    {
        $totalComments = $this->model('post')->getComments();
        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/comments.php";
        require APP . "view/admin/__templates/footer.php";

    }


}