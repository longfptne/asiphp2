<?php

namespace User\Mcvoop\Controllers\Client;

use User\Mcvoop\Commons\Controller;
use User\Mcvoop\Models\Client\UserModel;

class AccountController extends Controller
{
    private UserModel $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function profile()
    {
        if (!empty($_SESSION['url'])) {
            unset($_SESSION['url']);
        }

        $userId = $this->user->getUserById($_SESSION['account_id'] ?? 0);
        $success = [];

        if (!empty($_POST)) {
            $_SESSION['success'] = "Lưu thông tin thành công";

            $this->user->updateUser($_SESSION['account_id'], $_POST['name'], $_POST['email'], $_POST['password']);

            header('Location: /profile');
            exit();
        }

        return $this->renderViewClient('profile',
            [
                'userId' => $userId
            ]
        );
    }
}