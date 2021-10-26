<?php

namespace App\Controller;

use App\Mapper\OrderMapper;
use App\Service\HistoryService;
use Framework\Core\Controller;
use Framework\Pagination\Pagination;

class HistoryController extends Controller
{

    use HistoryService;

    protected $template = 'history';
    private $perpage = 4;

    public function getHistory($request)
    {
        extract($request);
        $pageTitle = "HistoryPage";
        $mapper = new OrderMapper();
        $pagination = new Pagination($page ?? 1, $this->perpage, $mapper->countQuery('order_product'));
        $start = $pagination->getStart();
        $orders = $mapper->getPaginationOrders(" $start, $this->perpage");
        return compact('pageTitle', 'orders', 'pagination');
    }

    public function sortHistory($request)
    {
        extract($request);
        $pageTitle = 'HistorySearch';
        $mapper = new OrderMapper();
        $orders = $mapper->getSortOrders($this->prepareSortData($request));
        return compact('pageTitle', 'orders');
    }

}