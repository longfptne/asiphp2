<?php

namespace User\Mcvoop\Models\Client;

use User\Mcvoop\Commons\Model;

class CommentModel extends Model
{
    public function insertComment($content, $parent_id, $id_user, $id_post)
    {
        try {
            $sql = "INSERT INTO comments 
                        (`content`, `parent_id`, `id_user`, `id_post`) 
                    VALUES 
                        (:content, :parent_id, :id_user, :id_post)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':parent_id', $parent_id);
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_post', $id_post);
            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            die();
        }
    }

    public function getCommentByIdPost($id_post)
    {
        try {
            $sql = "SELECT
                        c.id_comment,
                        c.content,
                        c.parent_id,
                        c.id_user,
                        c.id_post,
                        c.create_at,
                        u.id,
                        u.name,
                        p.id_post
                    FROM
                        comments c
                    INNER JOIN 
                        users u ON c.id_user = u.id 
                    INNER JOIN 
                        posts p ON c.id_post = p.id_post
                    WHERE
                        p.id_post = :id_post
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_post', $id_post);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            die();
        }
    }
}