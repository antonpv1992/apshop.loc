<?php

namespace Framework\Core;

abstract class Controller
{
    protected $request = [];
    protected $layout = LAYOUT;
    protected $template;
    protected $data = [];
    protected $view;

    public function __construct($request = [])
    {
        $this->request = $request;
        $this->view = new View($this->layout, $this->template);
    }

    public function getTemplate($template = false)
    {
        !$template ? $this->view->render($this->data, $this->template) : $this->view->render($this->data, $template);
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function jsonSerialize($array)
    {
        $serializeArray = [];
        foreach($array as $obj) {
            array_push($serializeArray, $obj->jsonSerialize());
        };
        return $serializeArray;
    }

    public function jsonModelSerialize($model)
    {
        return $model->jsonSerialize();
    }

}