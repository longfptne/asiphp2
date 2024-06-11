<?php

namespace User\Mcvoop\Models\Client;

use User\Mcvoop\Commons\Model;

class PostModel extends Model
{

    // Các câu lệnh SELECT
    public function getOnePost()
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE 
                        1 
                    ORDER BY id_post LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getListPost()
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE 
                        1 
                    ORDER BY 
                        id_post LIMIT 6";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getPostById($slug)
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE 
                        p.slug = :slug";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':slug', $slug);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getPostByTrend()
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        p.view > 5
                    LIMIT 5
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getPostByCategory($id_category, $limit, $begin = 0)
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        p.id_category = :id_category
                    AND
                        p.view > 5
                    LIMIT 
                        $begin,$limit
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_category', $id_category);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getPostByCategoryDoiSong($id_category)
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        p.id_category = :id_category
                    AND
                        p.view > 5
                    LIMIT 
                        9
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_category', $id_category);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getAllPost($id_category, $id_post)
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        p.id_category = :id_category
                    AND
                        p.id_post <> :id_post
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_category',    $id_category);
            $stmt->bindParam(':id_post',        $id_post);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function countDataSearchPost($keyword)
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        p.title LIKE :title
            ";
            $stmt = $this->conn->prepare($sql);
            $key = "%$keyword%";
            $stmt->bindParam(':title', $key);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function dataSearchPost($keyword, $begin)
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        p.title LIKE :title
                    LIMIT
                        $begin, 5
            ";
            $stmt = $this->conn->prepare($sql);
            $key = "%$keyword%";
            $stmt->bindParam(':title', $key);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function listPostByTrend($id_category, $id_post)
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
                        p.slug,
                        p.id_category as catePost,
                        c.id_category,
                        c.name_category
                    FROM 
                        posts   p
                    INNER JOIN 
                        categories  c   ON p.id_category = c.id_category
                    WHERE
                        p.id_category = :id_category
                    AND
                        p.id_post <> :id_post
                    AND
                        p.view > 5
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_category', $id_category);
            $stmt->bindParam(':id_post', $id_post);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    // End Các câu lệnh SELECT

    // Các câu lênh UPDATE
    public function updateView($view, $id_post)
    {
        try {
            $sql = "UPDATE posts SET view = :view + 1 WHERE id_post = :id_post";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':view', $view);
            $stmt->bindParam(':id_post', $id_post);
            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }
    // End các câu lênh UPDATE


}