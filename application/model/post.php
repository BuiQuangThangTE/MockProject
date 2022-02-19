<?php
require_once APP . 'model/model.php';

class post extends Model
{
    private $table = 'blogs';

    // Post Properties
    public $blog_id;
    public $category_id;
    public $user_id;
    public $name_category;
    public $title;
    public $content;
    public $description;
    public $image;
    public $views;
    public $created_at;

    public function __construct()
    {
        parent::__construct();
    }

    public function read_single($id)
    {
        try {
            $query = 'SELECT c.name_category, b.*
            FROM ' . $this->table . ' b
            LEFT JOIN
              categories c ON b.category_id = c.category_id
            WHERE
              b.blog_id = "' . $id . '"
            LIMIT 0,1';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            if ($row > 0) {
                $this->blog_id = $row['blog_id'];
                $this->title = $row['title'];
                $this->content = $row['content'];
                $this->image = $row['image'];
                $this->description = $row['description'];
                $this->user_id = $row['user_id'];
                $this->category_id = $row['category_id'];
                $this->name_category = $row['name_category'];
                $this->views = $row['views'];
                $this->created_at = $row['created_at'];
            }

        } catch (PDOException $e) {
            echo $e;
        }

    }

    public function related($category_id)
    {
        $sql = "SELECT * FROM blogs WHERE category_id = $category_id ORDER BY created_at DESC ";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function search($search)
    {
        $key = explode(' ', $search);
        $key = implode('%', $key);
        $sql = "SELECT blog_id,title FROM blogs WHERE title LIKE '%$key%' LIMIT 0,5";
        try {
            $query = $this->db->prepare($sql);

            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getTotal()
    {
        $sql = "SELECT * FROM blogs";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function phantrang($from, $so_tin_1trang)
    {
        $sql = "SELECT a.*, b.name_category, c.username FROM blogs a INNER JOIN categories b ON a.category_id = b.category_id INNER JOIN users c ON a.user_id = c.user_id ORDER BY a.created_at DESC LIMIT  $from, $so_tin_1trang ";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM categories";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getOneBlog($blog_id)
    {
        $sql = "SELECT * FROM blogs WHERE blog_id = :blog_id";
        try {
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":blog_id" => $blog_id
            );
            $query->execute($parameters);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_category_blog($category_id)
    {
        $sql = "SELECT * FROM categories WHERE category_id = :category_id";
        try {
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":category_id" => $category_id
            );
            $query->execute($parameters);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function edit_blog($title, $description, $content, $category_id, $blog_id)
    {
        $sql = "UPDATE blogs SET title = :title, description = :description, content = :content, category_id = :category_id  WHERE blog_id = :blog_id";
        try {
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":title" => $title,
                ":description" => $description,
                ":content" => $content,
                ":category_id" => $category_id,
                "blog_id" => $blog_id
            );
            return $query->execute($parameters);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function createBlog($title, $description, $content, $category_id, $user_id, $image)
    {
        $sql = "INSERT INTO blogs (title, description, content, category_id, user_id , image) VALUES (:title, :description, :content, :category_id, :user_id, :image)";
        try {
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":title" => $title,
                ":description" => $description,
                ":content" => $content,
                ":category_id" => $category_id,
                ":user_id" => $user_id,
                ":image" => $image
            );
            return $query->execute($parameters);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


//    comment
    public function getComments()
    {
        $sql = "SELECT a.*, b.username, c.title FROM comments a INNER JOIN users b ON a.user_id = b.user_id INNER JOIN blogs c ON a.blog_id = c.blog_id ORDER BY created_at DESC";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete_blog($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE blog_id = "' . $id . '"';
        $result = $this->db->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->blog_id));
        $result->bindParam(':id', $this->blog_id);
        if ($result->execute()) {
            return true;
        }
        printf("Error: %s.\n", $result->error);
        return false;
    }

    public function getPopularBlogs()
    {
        $sql = "SELECT * FROM blogs ORDER BY views DESC LIMIT 5";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}