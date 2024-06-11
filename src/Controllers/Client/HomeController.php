<?php

namespace User\Mcvoop\Controllers\Client;

use User\Mcvoop\Commons\Controller;
use User\Mcvoop\Models\Client\CategoryModel;
use User\Mcvoop\Models\Client\PostModel;

class HomeController extends Controller
{

    private CategoryModel $category;

    private PostModel $post;

    public function __construct()
    {
        $this->post = new PostModel();
    }

    public function searchPost()
    {
        if (!empty($_SESSION['url'])) {
            unset($_SESSION['url']);
        }

        $keyword = $_GET['search_post'] ?? "";

        $countListPostSearch = $this->post->countDataSearchPost($keyword);

        $startLimit = (($_GET['page'] ?? 1) - 1) * 5;

        $count = count($countListPostSearch);

        $countTrang = ceil($count / 5);

        $listPostSearch = $this->post->dataSearchPost($keyword, $startLimit);

//        echo "<pre>";
//        print_r($startLimit);
//        die;

        return $this->renderViewClient('searchPost',
            [
                'listPostSearch' => $listPostSearch,
                'countTrang' => $countTrang
            ]
        );
    }

    public function home()
    {
        if (!empty($_SESSION['url'])) {
            unset($_SESSION['url']);
        }

        $onePost = $this->post->getOnePost();

        $postListPostTop6 = $this->post->getListPost();

        $getPostByTrend = $this->post->getPostByTrend();

        $getPostByCategory['lifeTop6'] = $this->post->getPostByCategoryDoiSong(5);

        $getPostByCategory['cultureMain'] = $this->post->getPostByCategory(6, 1);

        $getPostByCategory['cultureSmall'] = $this->post->getPostByCategory(6, 4, 1);

        $getPostByCategory['cultureSidebar'] = $this->post->getPostByCategory(6, 5, 1);

        $getPostByCategory['footballMain'] = $this->post->getPostByCategory(8, 1);

        $getPostByCategory['footballSmail'] = $this->post->getPostByCategory(8, 5, 1);

        $getPostByCategory['footballSidebar'] = $this->post->getPostByCategory(8, 5, 0);

        $getPostByCategory['lifeMain'] = $this->post->getPostByCategory(5, 1);

        $getPostByCategory['lifeSmail'] = $this->post->getPostByCategory(5, 2, 1);

        $getPostByCategory['lifeSmailRight'] = $this->post->getPostByCategory(5, 5);

        return $this->renderViewClient(
            'home',
            [
                'onePost' => $onePost,

                'postListPostTop6' => array_chunk($postListPostTop6, 3),

                'getPostByTrend' => $getPostByTrend,

                'postByCategoryCultureMain' => $getPostByCategory['cultureMain'],

                'postByCategoryCultureSmall' => array_chunk($getPostByCategory['cultureSmall'], 2),

                'postByCategoryCultureSidebar' => $getPostByCategory['cultureSidebar'],

                'postByCategoryFootballMain' => $getPostByCategory['footballMain'],

                'postByCategoryFootballSmail' => array_chunk($getPostByCategory['footballSmail'], 2),

                'postByCategoryFootballSidebar' => $getPostByCategory['footballSidebar'],

                'postByCategoryLifeMain' => $getPostByCategory['lifeMain'],

                'postByCategoryLifeSmail' => $getPostByCategory['lifeSmail'],

                'lifeTop6' => array_chunk($getPostByCategory['lifeTop6'], 3),

                'postByCategoryLifeSmailRight' => $getPostByCategory['lifeSmailRight']
            ]
        );
    }

    public function pageNotFound()
    {
        return $this->renderViewClient('404');
    }
}