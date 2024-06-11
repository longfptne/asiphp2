<?php

namespace User\Mcvoop\Controllers\Admin;

use User\Mcvoop\Commons\Controller;

class DashboardController extends Controller
{
    public function dashboard() {
        return $this->renderViewAdmin('dashboard');
    }

    public function pageNotFound()
    {
        return $this->renderViewAdmin('404');
    }
}