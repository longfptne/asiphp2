<?php
namespace User\Mcvoop\Models\Client;
use User\Mcvoop\Commons\Model;

class UserModel extends Model
{
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
}