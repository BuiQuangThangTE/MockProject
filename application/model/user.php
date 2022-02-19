<?php
require_once APP . 'model/model.php';

class User extends Model
{
    public $user_id;
    public $username;
    public $password;
    public $email;
    public $avatar;
    public $id_group;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($name)
    {
        $sql = "SELECT * FROM users WHERE username = :username ";
        try {
            $query = $this->db->prepare($sql);
            $parameters = array(
                ":username" => $name,
            );
            $query->execute($parameters);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUsers()
    {
        $sql = "SELECT a.*, b.rule FROM users a INNER JOIN rule_users b ON a.id_group = b.id_group ORDER BY created_at DESC";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function phanTrang($from, $so_tin_1trang)
    {
        $sql = "SELECT * FROM users ORDER BY created_at DESC LIMIT  $from,$so_tin_1trang ";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function insertUser($username, $password, $email, $avatar, $id_group)
    {
        $sql = "INSERT INTO users (username, password, email, avatar , id_group) VALUES (:username, :password, :email, :avatar, :id_group)";
        try {
            $query = $this->db->prepare($sql);
            $parameter = array(
                ":username" => $username,
                ":password" => $password,
                ":email" => $email,
                ":avatar" => $avatar,
                ":id_group" => $id_group
            );
            return $query->execute($parameter);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editUser($user_id, $id_group)
    {
        $sql = "UPDATE users SET id_group = $id_group WHERE user_id = $user_id";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            echo $id_group;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUserById($user_id)
    {
        $sql = "SELECT a.*, b.rule FROM users a INNER JOIN rule_users b ON a.id_group = b.id_group WHERE user_id = $user_id";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete_user($id)
    {
        $query = 'DELETE FROM users WHERE user_id = "' . $id . '"';
        $result = $this->db->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->user_id));
        $result->bindParam(':id', $this->user_id);

        if ($result->execute()) {
            return true;
        }
        printf("Error: %s.\n", $result->error);
        return false;
    }
}