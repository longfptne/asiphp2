<?php

namespace User\Mcvoop\Models\Client;

use User\Mcvoop\Commons\Model;

class CategoryModel extends Model
{
    public function getForCategory()
    {
        try {
            $sql = "SELECT * FROM categories";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            die();
        }
    }

    public function getCategoryById($slug)
    {
        try {
            $sql = "SELECT * FROM categories WHERE slug = :slug";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':slug', $slug);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            die();
        }
    }

    public function countPostByCategory($slug)
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
                        p.slug          as slugPro,
                        p.id_category   as catePost,
                        c.id_category,
                        c.name_category,
                        c.slug
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        c.slug = :slug
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':slug', $slug);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            die();
        }
    }

    public function listPostByCategory($slug, $begin)
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
                        p.slug          as slugPro,
                        p.id_category   as catePost,
                        c.id_category,
                        c.name_category,
                        c.slug
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        c.slug = :slug
                    LIMIT
                        $begin, 5
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':slug', $slug);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            die();
        }
    }

    public function getPostByTrend($slug)
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
                        p.slug          as slugPro,
                        p.id_category   as catePost,
                        c.id_category,
                        c.name_category,
                        c.slug
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        c.slug = :slug
                    AND
                        p.view > 5
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':slug', $slug);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            die();
        }
    }
}