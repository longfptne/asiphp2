<?php

namespace User\Mcvoop\Controllers\Admin;

use User\Mcvoop\Commons\Controller;
use User\Mcvoop\Models\Admin\CategoryModel;
use Cocur\Slugify\Slugify;

class CategoryController extends Controller
{

    private CategoryModel $category;

    private Slugify $slugify;
    public function __construct()
    {
        $this->category = new CategoryModel();
        $this->slugify = new Slugify();
    }

    public function listCategory()
    {
        $data['listCategory'] = $this->category->getAllCategory();

        $_SESSION['url_listCategory'] = $_SERVER['REQUEST_URI'] ?? null;

        return $this->renderViewAdmin('categories.listCategory', ['listCategory' => $data['listCategory']]);
    }

    public function searchCategory()
    {
        $searchCategory = $_GET['search_category'] ?? '';

        $searchCategory = $this->category->searchCategory(trim($searchCategory));

        return $this->renderViewAdmin('categories.viewSearchCategory',
            [
                'searchCategory' => $searchCategory
            ]
        );
    }

    public function addCategories()
    {
        if (isset($_POST['addCategory'])) {
            $this->category->insertCategory($_POST['nameCategory'],$this->slugify->slugify($_POST['nameCategory']));
            header('Location: /admin/categories/');
        }

        return $this->renderViewAdmin('categories.addCategory');
    }

    public function editCategories($id_category)
    {
        $data['categoryById'] = $this->category->getCategoryById($id_category);

        $success = [];

        if (isset($_POST['updateCategory'])) {

            $success['success'] = "Cập nhật danh mục thành công";
            $this->category->updateCategory($id_category, $_POST['nameCategory'], $this->slugify->slugify($_POST['nameCategory']));
            echo "<script>window.location.href = ".$_SERVER['REQUEST_URI']."</script>";

        }

        return $this->renderViewAdmin('categories.editCategory',
            [
                'categoryById' => $data['categoryById'],
                'success' => $success['success'] ?? null
            ]
        );
    }

    public function categoryDetail($id_category)
    {
        $data['postByCategory'] = $this->category->getPostByCategory($id_category);

        return $this->renderViewAdmin('categories.categoryDetail', ['categoryDetail' => $data['postByCategory']]);
    }

    public function deleteCategories($id_category)
    {
        $this->category->deleteCategory($id_category);
        header('Location: /admin/categories/');
    }

}