<?php

namespace App\Controller\Api;

use App\Mapper\OrderMapper;
use App\Service\HistoryService;
use Framework\Core\Controller;
use Framework\Pagination\Pagination;

class HistoryController extends Controller
{
   
    use HistoryService;

    protected $template = "";
    private $perpage = 2;

    public function read($request = [])
    {
        $mapper = new OrderMapper();
        $orders = $mapper->getAllOrders();
        echo json_encode($this->jsonSerialize($orders));
        return [];
    }

    public function paginate($request = [])
    {
        extract($request);
        $mapper = new OrderMapper();
        $pagination = new Pagination($page ?? 1, $this->perpage, $mapper->countQuery('order_product'));
        $start = $pagination->getStart();
        $orders = $mapper->getPaginationOrders(" $start, $this->perpage");
        $data = [
            'orders' => $this->jsonSerialize($orders),
            'pagination' => [
                'perpage' => $this->perpage,
                'total' => $mapper->countQuery('order_product'),
                'count' => $pagination->getCountPages(),
                'current' => $pagination->getCurrentPage($page ?? 1),
                'url' => $pagination->getParams()
            ]
        ];
        echo json_encode($data);
        return [];
    }

    public function search($request = [])
    {
        $request['data'] = json_decode(file_get_contents('php://input'), true);
        extract($request['data']);
        $mapper = new OrderMapper();
        $total = $mapper->countPaginateOrders($this->prepareSortData($request['data']));
        $pagination = new Pagination($page ?? 1, $this->perpage, $total);
        $start = $pagination->getStart();
        $orders = $mapper->getSortOrders($this->prepareSortData($request['data']), " $start, $this->perpage");
        $data = [
            'orders' => $this->jsonSerialize($orders),
            'pagination' => [
                'perpage' => $this->perpage,
                'total' => $total,
                'count' => $pagination->getCountPages(),
                'current' => $pagination->getCurrentPage($page ?? 1),
                'url' => $pagination->getParams()
            ]
        ];
        echo json_encode($data);
        return [];
    }
}