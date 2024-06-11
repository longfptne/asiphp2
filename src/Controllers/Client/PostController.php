<?php

namespace User\Mcvoop\Controllers\Client;

use User\Mcvoop\Commons\Controller;
use User\Mcvoop\Models\Client\CategoryModel;
use User\Mcvoop\Models\Client\CommentModel;
use User\Mcvoop\Models\Client\PostModel;

class PostController extends Controller
{
    private PostModel $post;

    private CommentModel $comment;

    private CategoryModel $category;

    private $view;

    public function __construct()
    {
        $this->post = new PostModel();
        $this->category = new CategoryModel();
        $this->comment = new CommentModel();
    }

    public function postDetail($slug)
    {

        $postById = $this->post->getPostById($slug);

        $getDataPost = $this->post->getAllPost($postById['catePost'], $postById['id_post']);

        $listPostByTrend = $this->post->listPostByTrend($postById['catePost'], $postById['id_post']);

        $getAllCategory = $this->category->getForCategory();


        if (!isset($_SESSION['url'])) {

            $_SESSION['url'] = '/postDetail/' . $postById['id_post'];

            $this->view = $postById['view'];

            $this->post->updateView($this->view, $postById['id_post']);

        }

        if (!empty($_POST)) {
            $this->comment->insertComment($_POST['content'], $_POST['parentId'],$_SESSION['account_id'] ?? 0, $postById['id_post']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $listComment = $this->comment->getCommentByIdPost($postById['id_post']);

        return $this->renderViewClient('postDetail',
            [
                'post' => $postById,
                'postByCategory' => $getDataPost,
                'getAllCategory' => $getAllCategory,
                'postCategoryByTrend' => $listPostByTrend,
                'listComment' => $listComment
            ]
        );
    }


    public function pageNotFound()
    {
        return $this->renderViewClient('404');
    }
}