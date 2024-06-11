<?php

namespace User\Mcvoop\Models\Admin;

use User\Mcvoop\Commons\Model;

class CommentModel extends Model
{
    public function getPostByComment()
    {
        try {
            $sql = "SELECT 
                        p.id_post,
                        p.image,
                        p.title,
                        p.excerpt,
                        p.content,
                        p.id_category,
                        c.id_category,
                        c.name_category,
                        COUNT(cm.id_comment) AS total_comments,
                        cm.id_post
                    FROM 
                        posts p
                    INNER JOIN
                        comments cm ON cm.id_post = p.id_post
                    INNER JOIN
                        categories c ON c.id_category = p.id_category
                    GROUP BY 
                        cm.id_post
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }

    public function getCommentByIdPost($id)
    {
        try {
            $sql = "SELECT 
                        cm.id_comment,
                        cm.content,
                        cm.parent_id,
                        cm.id_user,
                        cm.id_post,
                        cm.create_at,
                        u.id,
                        u.name,
                        u.email,
                        u.password
                    FROM 
                        comments cm
                    INNER JOIN
                        users u ON u.id = cm.id_user
                    WHERE
                        cm.id_post = :id_post
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id_post', $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            die();
        }
    }
}
