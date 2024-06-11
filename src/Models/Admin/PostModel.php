<?php

namespace User\Mcvoop\Models\Admin;

use User\Mcvoop\Commons\Model;

class PostModel extends Model
{
    public function getAllPost()
    {
        try {
            $sql = "SELECT
                        posts.id_post,
                        posts.image,
                        posts.title,
                        posts.excerpt,
                        posts.content,
                        posts.create_at,
                        posts.slug,
                        posts.id_category as catePost,
                        categories.id_category,
                        categories.name_category
                    FROM 
                        posts
                    INNER JOIN
                        categories ON posts.id_category = categories.id_category
                    WHERE 
                        1
                    ORDER BY id_post DESC
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getDataById($id_post)
    {
        try {
            $sql = "SELECT
                        posts.id_post,
                        posts.image,
                        posts.title,
                        posts.excerpt,
                        posts.content,
                        posts.create_at,
                        posts.slug,
                        posts.id_category as catePost,
                        categories.id_category,
                        categories.name_category
                    FROM 
                        posts
                    INNER JOIN
                        categories ON posts.id_category = categories.id_category 
                    WHERE 
                        posts.id_post = :id_post";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_post', $id_post);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function searchPost($keyword)
    {
        try {
            $sql = "SELECT * FROM posts WHERE title LIKE :title";

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


    public function insertPost($image, $title, $excerpt, $content, $slugify, $id_category)
    {
        try {
            $sql = "INSERT INTO 
                    posts 
                    (`image`,`title`,`excerpt`,`content`, `slug`, `id_category`) 
                VALUES
                    (:image,:title,:excerpt,:content, :slug, :id_category)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':slug', $slugify);
            $stmt->bindParam(':id_category', $id_category);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function updatePost($id_post, $image, $title, $excerpt, $content, $slugify, $id_category)
    {
        try {
            $sql = "UPDATE 
                        posts 
                    SET
                        image       =   :image,
                        title       =   :title,
                        excerpt     =   :excerpt,
                        content     =   :content,
                        slug        =   :slug,
                        id_category =   :id_category
                    WHERE
                        id_post = :id_post
                        ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_post', $id_post);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':slug', $slugify);
            $stmt->bindParam(':id_category', $id_category);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function deletePost($id)
    {
        try {
            $sql = "DELETE FROM posts WHERE id_post = :id_post";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_post', $id);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }
}