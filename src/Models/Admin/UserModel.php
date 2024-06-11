<?php

namespace User\Mcvoop\Models\Admin;

use User\Mcvoop\Commons\Model;

class UserModel extends Model
{
    public function getAllUser()
    {
        try {
            $sql = "SELECT * FROM users";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $err) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $err->getMessage();
        }
    }

    public function insertUser($name, $email, $password)
    {
        try {
            $sql = "INSERT INTO 
                    users 
                        (`name`, `email`, `password`) 
                    VALUES 
                        (:name, :email, :password)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            return $stmt->execute();
        } catch (\Exception $err) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $err->getMessage();
        }
    }

    public function getUserById($id)
    {
        try {
            $sql = "SELECT * FROM users WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $err) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $err->getMessage();
        }
    }

    public function checkLoginAccount($email, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $err) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $err->getMessage();
        }
    }

    public function checkEmail($email)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':email', $email);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $err) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $err->getMessage();
        }
    }

    public function searchUser($keyword)
    {
        try {
            $sql = "SELECT * FROM users WHERE name LIKE :name OR email LIKE :email";

            $stmt = $this->conn->prepare($sql);

            $key = "%$keyword%";

            $stmt->bindParam(':name', $key);
            $stmt->bindParam(':email', $key);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $err) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $err->getMessage();
        }
    }

    public function updateUser($id, $name, $email, $password)
    {
        try {
            $sql = "UPDATE users 
                    SET 
                        name = :name, 
                        email = :email, 
                        password = :password
                    WHERE 
                        id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            return $stmt->execute();
        } catch (\Exception $err) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $err->getMessage();
        }
    }

    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM users WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (\Exception $err) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $err->getMessage();
        }
    }
}