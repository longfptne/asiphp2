<?php

namespace User\Mcvoop\Controllers\Client;

use User\Mcvoop\Commons\Controller;

class AboutUsController extends Controller
{
    public function __construct()
    {

    }

    public function aboutUs()
    {
        if (!empty($_SESSION['url'])) {
            unset($_SESSION['url']);
        }

        return $this->renderViewClient('aboutUs');
    }
}