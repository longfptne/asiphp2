<?php

namespace User\Mcvoop\Controllers\Client;

use User\Mcvoop\Commons\Controller;
use User\Mcvoop\Models\Client\CategoryModel;

class CategoryController extends Controller
{

    private CategoryModel $category;
    public function __construct()
    {
        $this->category = new CategoryModel();
    }

    public function listCategory()
    {
        if (!empty($_SESSION['url'])) {
            unset($_SESSION['url']);
        }

        $listCategory = $this->category->getForCategory();

        return $this->renderViewClient('listCategory',
            [
                'listCategory' => $listCategory
            ]
        );
    }

    public function postByCategory($id_category, $page = 1)
    {
        if (!empty($_SESSION['url'])) {
            unset($_SESSION['url']);
        }

        $getAllCategory = $this->category->getForCategory();

        $category = $this->category->getCategoryById($id_category);

        $postByCategory = $this->category->countPostByCategory($id_category);

        $startLimit = ($page - 1) * 5;

        $count = count($postByCategory);

        $countTrang = ceil($count / 5);

        $postByCategoryCountPage = $this->category->listPostByCategory($id_category, $startLimit);

        $postCategoryByTrend = $this->category->getPostByTrend($id_category);

        return $this->renderViewClient('postByCategory',
            [
                'category' => $category,
                'postByCategory' => $postByCategory,
                'getAllCategory' => $getAllCategory,
                'postCategoryByTrend' => $postCategoryByTrend,
                'postByCategoryCountPage' => $postByCategoryCountPage,
                'countTrang' => $countTrang,
                'curentPage' => $page
            ]
        );
    }
}