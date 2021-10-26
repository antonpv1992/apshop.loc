<?php

namespace App\Service;

use Framework\Helpers\Sql;

trait ProductService
{

    protected function productsWithFeatures($conditions = false)
    {
        $sqlO = new Sql();
        return $sqlO->select([
                'product.*',
                $sqlO->concat('category.name', 'category', 'DISTINCT'),
                $sqlO->concat("feature.feature, ';', fv.value", 'features', 'DISTINCT')
            ], $this->table) 
            . $sqlO->join([
                'product_category' => 'product_category.product_id = product.id',
                'category' => 'product_category.category_id = category.id',
                'product_feature_value AS pfv' => 'pfv.product_id = product.id',
                'feature_value AS fv' => 'fv.id = pfv.feature_value_id',
                'feature' => 'feature.id = pfv.feature_value_feature_id'
            ]) 
            . $sqlO->where($conditions)
            . $sqlO->group('product.id');
    }

    protected function productsWithoutFeatures($conditions = false, $limit = false)
    {
        $sqlO = new Sql();
        return $sqlO->select([
                'product.*', 'category.name AS category'
            ], $this->table) . $sqlO->join([
                'product_category' => 'product_category.product_id = product.id',
                'category' => 'product_category.category_id = category.id'
            ]) . $sqlO->where($conditions) . $sqlO->limit($limit);
    }
    
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
}