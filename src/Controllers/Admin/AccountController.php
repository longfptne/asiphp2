<?php

namespace User\Mcvoop\Controllers\Admin;

use PHPMailer\PHPMailer\PHPMailer;
use User\Mcvoop\Commons\Controller;
use User\Mcvoop\Models\Admin\UserModel;


class AccountController extends Controller
{
    private UserModel $user;

    public function __construct()
    {
        $this->user = new UserModel();
        // $this->mail = new PHPMailer();
    }

    public function login()
    {
        if(isset($_SESSION['account_id'])) {
            header("Location: /admin/");
            exit();
        }

        $err = [];

        if (!empty($_POST)) {

            $isCheck = true;
            $account = $this->user->checkLoginAccount($_POST['email'], $_POST['password']);

            if (!$account) {
                $isCheck = false;
                $err['errAccount'] = "Tên tài khoản hoặc mật khẩu không đúng";
            } else {
                if($account['role'] == 1) {
                    $_SESSION['account_id'] = $account['id'];
                    echo "<script>alert('Xin chào: ". $account['name'] ."')</script>";
                    echo "<script>window.location.href = '/admin'</script>";
                } else {
                    $_SESSION['account_id'] = $account['id'];
                    echo "<script>alert('Xin chào: ". $account['name'] ."')</script>";
                    echo "<script>window.location.href = '/'</script>";
                }

            }

        }

        return $this->renderViewAdmin('accounts.login',
            [
                'errAccount' => $err['errAccount'] ?? null
            ]
        );
    }

    public function register()
    {

        if(isset($_SESSION['account_id'])) {
            header("Location: /admin/");
            exit();
        }

        $err = [];

        if(!empty($_POST)) {

            $isCheck = true;
            $account = $this->user->checkEmail($_POST['email']);

            if($account) {
                $err['errEmail'] = "Email này đã tồn tại";
                $isCheck = false;
            } else {
                $err['successRegister'] = "Đăng ký tài khoản thành công";
                $this->user->insertUser($_POST['name'], $_POST['email'], $_POST['password']);
                echo "<script>window.location.href = ".$_SERVER['HTTP_REFERER']."</script>";
            }

        }

        return $this->renderViewAdmin('accounts.register',
            [
                'errEmail' => $err['errEmail'] ?? null,
                'successRegister' => $err['successRegister'] ?? null
            ]
        );
    }

    public function logout()
    {
        session_destroy();
        header('Location: /auth/login');
        exit();
    }
}