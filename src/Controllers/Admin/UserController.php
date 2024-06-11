<?php

namespace User\Mcvoop\Controllers\Admin;

use User\Mcvoop\Commons\Controller;

use User\Mcvoop\Models\Admin\UserModel;

class UserController extends Controller
{
    private UserModel $user;

    public function __construct()
    {
        $this->user = new UserModel;
    }

    public function listUser()
    {
        $data['users'] = $this->user->getAllUser();

        $_SESSION['url_listUser'] = $_SERVER['REQUEST_URI'] ?? null;

        return $this->renderViewAdmin('users.listUser', ['listUser' => $data['users']]);
    }

    public function searchUser()
    {
        $keyWordUser = $_GET['search_user'] ?? '';

        $searchUser = $this->user->searchUser(trim($keyWordUser));

        return $this->renderViewAdmin('users.viewSearchUser',
            [
                'searchUser' => $searchUser
            ]
        );
    }

    public function addUser()
    {
        if (!empty($_POST)) {
            $this->user->insertUser($_POST['name'], $_POST['email'], $_POST['password']);
            header('Location: /admin/users/');
        }
        return $this->renderViewAdmin('users.addUser');
    }

    public function editUser($id)
    {
        $data['user'] = $this->user->getUserById($id);

        $success = [];

        if (!empty($_POST)) {
            $success['success'] = "Cập nhật tài khoản thành công";
            $this->user->updateUser($id, $_POST['name'], $_POST['email'], $_POST['password']);
            echo "<script>window.location.href = ".$_SERVER['REQUEST_URI']."</script>";
        }

        return $this->renderViewAdmin('users.editUser',
            [
                'user' => $data['user'],
                'success' => $success['success'] ?? null
            ]
        );
    }

    public function deleteUser($id)
    {
        $this->user->deleteUser($id);
        header('Location: /admin/users/');
    }
}