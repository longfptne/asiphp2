<?php

namespace User\Mcvoop\Controllers\Client;
use User\Mcvoop\Commons\Controller;

class ContactController extends Controller
{
    public function __construct()
    {

    }

    public function contact()
    {
        if (!empty($_SESSION['url'])) {
            unset($_SESSION['url']);
        }

        return $this->renderViewClient('contact');
    }
}