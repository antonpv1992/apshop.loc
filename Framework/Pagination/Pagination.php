<?php

namespace Framework\Pagination;

class Pagination
{
    public int $currentPage;

    public $perpage;

    public $total;

    public $countPages;

    public $uri;

    public function __construct($page, $perpage, $total)
    {
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }

    public function getCountPages()
    {
        return ceil($this->total / $this->perpage) ?: 1;
    }

    public function getCurrentPage($page)
    {
        if (!$page || $page < 1) {
            $page = 1;
        }
        if ($page > $this->countPages) {
            $page = $this->countPages;
        }
        return $page;
    }

    public function getParams()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if (isset($url[1]) && $url[1] != '') {
            $params = explode('&', $url[1]);
            foreach ($params as $param) {
                if (!preg_match("#page=#", $param)) {
                    $uri .= "{$param}&amp;";
                }
            }
        }
        return $uri;
    }

    public function display()
    {
        $startpage = null;
        $endpage = null;
        $page2left = null;
        $page1left = null;
        $page2right = null;
        $page1right = null;
        $back = "<li class='pagination-item'><a href='{$this->uri}page=" . ($this->currentPage - 1) . "' class='pagination-link'><i class='fas fa-angle-left'></i></a></li>";
        $forward = "<li class='pagination-item'><a href='{$this->uri}page=" . ($this->currentPage + 1) . "' class='pagination-link'><i class='fas fa-angle-right'></i></a></li>";
        if (($this->currentPage - 1) < 1) {
            $back = "<li class='pagination-item'><a class='pagination-link'><i class='fas fa-angle-left'></i></a></li>";
        }
        if (($this->currentPage + 1) > $this->countPages) {
            $forward = "<li class='pagination-item'><a class='pagination-link'><i class='fas fa-angle-right'></i></a></li>";
        }
        if ($this->currentPage > 2) {
            $startpage = "<li class='pagination-item'><a href='{$this->uri}page=1' class='pagination-link'>1</a></li>";
        }
        if ($this->currentPage < ($this->countPages - 1)) {
            $endpage = "<li class='pagination-item'><a href='{$this->uri}page={$this->countPages}' class='pagination-link'>$this->countPages</a></li>";
        }
        if ($this->currentPage - 3 > 0) {
            $page2left = "<li class='pagination-item'><a class='pagination-link pagination-link-dotts'><i class='fas fa-ellipsis-h'></i></a></li>";
        }
        if ($this->currentPage - 1 > 0) {
            $page1left = "<li class='pagination-item'><a href='{$this->uri}page=" . ($this->currentPage - 1) . "' class='pagination-link'>" . ($this->currentPage - 1) . "</a></li>";
        }
        if ($this->currentPage + 1 <= $this->countPages) {
            $page1right = "<li class='pagination-item'><a href='{$this->uri}page=" . ($this->currentPage + 1) . "' class='pagination-link'>" . ($this->currentPage + 1) . "</a></li>";
        }
        if ($this->currentPage + 3 <= $this->countPages) {
            $page2right = "<li class='pagination-item'><a class='pagination-link pagination-link-dotts'><i class='fas fa-ellipsis-h'></i></a></li>";
        }
        return "<ul class='pagination-list pagination'> $back $startpage $page2left $page1left <li class='pagination-item'><a class='pagination-link pagination-link-active'>$this->currentPage</a></li> $page1right $page2right $endpage $forward";
    }

    public function getStart()
    {
        return ($this->currentPage - 1) * $this->perpage;
    }
}