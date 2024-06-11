<?php

namespace User\Mcvoop\Commons;

use eftec\bladeone\BladeOne;


class Controller
{
    public function renderViewClient($view, $data = [])
    {
        $templetePath = __DIR__ . "/../Views/Client/";

        $blade = new BladeOne($templetePath);

        echo $blade->run($view, $data);
    }

    public function renderViewAdmin($view, $data = [])
    {
        $templetePath = __DIR__ . "/../Views/Admin/";

        $blade = new BladeOne($templetePath);

        echo $blade->run($view, $data);
    }
}
