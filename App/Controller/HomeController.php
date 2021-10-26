<?php

namespace App\Controller;

use App\Mapper\ProductMapper;
use Framework\Core\Controller;

class HomeController extends Controller
{
    protected $template = 'home';

    public function getHomePage($request = [])
    {
        extract($request);
        $pageTitle = 'HomePage';
        $pmapper = new ProductMapper();
        $newProducts = $pmapper->getHomeProducts('new');
        $hotProducts = $pmapper->getHomeProducts('hot');
        return compact('pageTitle', 'newProducts', 'hotProducts');
    }

}