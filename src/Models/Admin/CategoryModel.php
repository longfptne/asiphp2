<?php

namespace User\Mcvoop\Models\Admin;

use User\Mcvoop\Commons\Model;

class CategoryModel extends Model
{

    // Các câu lệnh SELECT
    public function getAllCategory()
    {
        try {
            $sql = "SELECT * FROM categories ORDER BY id_category DESC";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getCategoryById($id_category)
    {
        try {
            $sql = "SELECT * FROM categories WHERE id_category = :id_category";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_category', $id_category);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function searchCategory($keyword)
    {
        try {
            $sql = "SELECT * FROM categories WHERE name_category LIKE :name_category";

            $stmt = $this->conn->prepare($sql);

            $key = "%$keyword%";

            $stmt->bindParam(':name_category', $key);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getPostByCategory($id_category)
    {
        try {
            $sql = "SELECT
                        p.id_post,
                        p.image,
                        p.title,
                        p.excerpt,
                        p.content,
                        p.view,
                        p.create_at,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        p.id_category = :id_category
                    ORDER BY 
                        id_post DESC";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_category', $id_category);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }
    // End các câu lệnh SELECT


    public function insertCategory($nameCategory, $slug)
    {
        try {
            $sql = "INSERT INTO categories (`name_category`, `slug`) VALUES (:name_category, :slug)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':name_category',  $nameCategory);
            $stmt->bindParam(':slug',           $slug);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function updateCategory($idCategory, $nameCategory, $slug)
    {
        try {
            $sql = "UPDATE categories SET name_category = :name_category, slug = :slug WHERE id_category = :id_category";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_category',    $idCategory);
            $stmt->bindParam(':name_category',  $nameCategory);
            $stmt->bindParam(':slug',           $slug);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }

    }

    public function deleteCategory($idCategory)
    {
        try {
            $sql = "DELETE FROM categories WHERE id_category = :id_category";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_category', $idCategory);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

}