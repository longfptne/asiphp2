<?php

namespace User\Mcvoop\Controllers\Admin;

use User\Mcvoop\Commons\Controller;
use User\Mcvoop\Models\Admin\PostModel;
use User\Mcvoop\Models\Admin\CategoryModel;
use User\Mcvoop\Models\Client\CommentModel;
use Cocur\Slugify\Slugify;

class PostController extends Controller
{
    private PostModel $post;

    private Slugify $slugify;

    private CategoryModel $category;

    const PATH_UPLOAD = '/uploads/posts/';

    public function __construct()
    {
        $this->post = new PostModel();
        $this->category = new CategoryModel();
        $this->slugify = new Slugify();
    }

    public function listPost()
    {
        $data['listPost'] = $this->post->getAllPost();

        $_SESSION['url_listPost'] = $_SERVER['REQUEST_URI'] ?? null;

        return $this->renderViewAdmin('posts.listPost', ['listPost' => $data['listPost']]);
    }

    public function searchPost()
    {
        $keyWordPost = $_GET['search_post'] ?? '';

        $searchPost = $this->post->searchPost(trim($keyWordPost));

        return $this->renderViewAdmin('posts.viewSearchPost',
            [
                'searchPost' => $searchPost
            ]
        );
    }

    public function addPost()
    {

        $data['listCategory'] = $this->category->getAllCategory();

        if (!empty($_POST)) {

            $image = $_FILES['image'] ?? null;
            $target_file = null;

            if (!empty($image)) {
                $target_file = self::PATH_UPLOAD . time() . $image['name'];
                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $target_file)) {
                    $target_file = null;
                }
            }
            $this->post->insertPost(
                $target_file,
                $_POST['title'],
                $_POST['excerpt'],
                $_POST['content'],
                $this->slugify->slugify($_POST['title']),
                $_POST['category']
            );

            header('Location: /admin/posts');
            exit();

        }

        return $this->renderViewAdmin('posts.addPost', ['listCategory' => $data['listCategory']]);
    }

    public function detailPost($id_post)
    {
        $data['post'] = $this->post->getDataById($id_post);

        return $this->renderViewAdmin('posts.detailPost', ['post' => $data['post']]);
    }

    public function editPost($id_post)
    {

        $data['listCategory'] = $this->category->getAllCategory();
        $data['post'] = $this->post->getDataById($id_post);
        $success = [];

        if (!empty($_POST)) {

            $image = $_FILES['image'] ?? null;

            $imageOld = $data['post']['image'];

            $move = false;

            if (!empty($image)) {

                $imageOld = self::PATH_UPLOAD . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imageOld)) {
                    $imageOld = $data['post']['image'];
                } else {
                    $move = true;
                }
            }

            $success['success'] = "Cập nhật bài viết thành công";
            $this->post->updatePost(
                $id_post,
                $imageOld,
                $_POST['title'],
                $_POST['excerpt'],
                $_POST['content'],
                $this->slugify->slugify($_POST['title']),
                $_POST['category']
            );

            if (
                $move
                && $data['post']['image']
                && file_exists(PATH_ROOT . $data['post']['image'])
            ) {
                unlink(PATH_ROOT . $data['post']['image']);
            }

            echo "<script>window.location.href = " . $_SERVER['REQUEST_URI'] . "</script>";

        }

        return $this->renderViewAdmin(
            'posts.editPost',
            [
                'listCategory' => $data['listCategory'],
                'post' => $data['post'],
                'success' => $success['success'] ?? null
            ]
        );
    }

    public function deletePost($idPost)
    {
        $post = $this->post->getDataById($idPost);

        $this->post->deletePost($idPost);

        if (!empty($post['image']) && file_exists(PATH_ROOT . $post['image'])) {
            unlink(PATH_ROOT . $post['image']);
        }

        header("Location: /admin/posts/");
    }
}