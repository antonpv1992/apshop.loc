<?php
  require_once "./config/init.php";
  use modules\TemplateEngine;
  $products = include_once "./db/products.php";
  $storage = include_once "./db/storage.php";
  $array = [
    "products" => $products,
    "storages" => $storage
  ];
  new TemplateEngine("default", $array, "products");