<?php

class Categories extends Controller
{
    public $category_id;
    public $name_category;
    public $description;

    public function index()
    {
        $totalCate = $this->model('category')->getCategory();
        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/categories.php";
        require APP . "view/admin/__templates/footer.php";
    }

    public function create_category()
    {
        if (isset($_POST["btn_create_category"])) {
            $name_category = $_POST["caregory_name_create"];
            $description = $_POST["caregory_description_create"];
            if ($this->model('category')->createCategory($name_category, $description)) {
                header("Location: " . URL . "categories");
            }
        }
        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/create_category.php";
        require APP . "view/admin/__templates/footer.php";
    }

    public function edit_category($category_id)
    {
        $category = $this->model('category')->getCategoryById($category_id);

        if (isset($_POST["name"]) && $_POST["name"] === "name_category") {
            $newName = $_POST["value"];
            $edit = $this->model('category')->editCategory($category_id, "name_category", $newName, '');
            echo $edit;
        }
        if (isset($_POST["name"]) && $_POST["name"] === "category_description") {
            $newDescription = $_POST["value"];
            $edit = $this->model('category')->editCategory($category_id, "category_description", '', $newDescription);
            echo $edit;
        }
        require APP . "view/admin/__templates/header.php";
        require APP . "view/admin/__templates/sidebar.php";
        require APP . "view/admin/edit_category.php";
        require APP . "view/admin/__templates/footer.php";
    }

    public function delete()
    {
        if (isset($_POST['action']) == "delete") {
            $category_id = $_POST['id'];
            if ($this->model('category')->delete_cate($category_id)) {
                Response::json(200, 'delete_thanhcong');
            }
        }
    }
}