<?php

namespace App\Service;

use App\Model\Product;

trait ProductService
{

    protected function transformFeatures($data)
    {
        if (empty($data)) {
            return [];
        }
        if (!isset($data['features'])) {
            foreach ($data as $key => $product) {
                $features = $this->parseFeatures($product['features']);
                $data[$key]['features'] = $features;
            }
        } else {
            $features = $this->parseFeatures($data['features']);
            $data['features'] = $features;
        }
        return $data;
    }

    protected function parseFeatures($features)
    {
        $feat_val = explode(',', $features);
        $feat = [];
        foreach ($feat_val as $single_feat) {
            $key = explode(';', $single_feat)[0];
            $value = explode(';', $single_feat)[1];
            if (isset($feat[$key])) {
                $feat[$key] .= ', ' . $value;
            } else {
                $feat[$key] = $value;
            }
        }
        return $feat;
    }

    protected function dataToProduct($data)
    {
        if (empty($data)) {
            return [];
        }
        return new Product($data);
    }

    protected function dataToProducts($data)
    {
        if (empty($data)) {
            return [];
        }
        $products = [];
        foreach ($data as $product) {
            array_push($products, new Product($product));
        }
        return $products;
    }
}