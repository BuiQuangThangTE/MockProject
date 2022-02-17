<?php
require_once APP.'model/Model.php';
class category extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function getCategory()
    {
        $sql = "SELECT * FROM categories";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getCategoryById($category_id)
    {
        $sql = "SELECT * FROM categories WHERE category_id = $category_id";
        try{
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function createCategory($name_category, $description)
    {
        $sql = "INSERT INTO categories (name_category, description) VALUES (:name_category, :description)";
        try{
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":name_category" => $name_category,
                ":description" => $description
            );
            return $query->execute($parameters);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function editCategory($category_id, $type, $name_category = null, $description = null)
    {
        switch ($type) {
            case "name_category":
                $sql = "UPDATE categories SET name_category = :name_category WHERE category_id = $category_id";
                try{
                    $query = $this->db->prepare($sql);
                    $parameters = array(
                        ":name_category" => $name_category
                    );
                    $query->execute($parameters);
                    return $name_category;
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "category_description":
                $sql = "UPDATE categories SET description = :description WHERE category_id = $category_id";
                try{
                    $query = $this->db->prepare($sql);
                    $parameters = array(
                        ":description" => $description
                    );
                    $query->execute($parameters);
                    return $description;
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                break;
            default:
                break;
        }
    }
    public function delete_cate($id){
        $query = 'DELETE FROM categories WHERE category_id = "'.$id.'"';
        $result = $this->db->prepare($query);
        if($result->execute()) {
            return true;
        }
        printf("Error: %s.\n", $result->error);
        return false;
    }
}