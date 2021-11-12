<?php

namespace App\Mapper;

use Framework\Core\Mapper;
use Framework\Helpers\Sql;

class FeatureMapper extends Mapper
{
    protected $table = "feature";
    protected $model = "App\\Model\\Feature";

    public function getFeatures()
    {
        $sqlO = new Sql();
        $sql = $sqlO->select([
            'feature.feature', 
            $sqlO->concat('fv.value', 'value', 'DISTINCT'),
            $sqlO->concat('category.name', 'category', 'DISTINCT'),
        ], $this->table) . $sqlO->join([
            'product_feature_value AS pfv' => 'pfv.feature_value_feature_id = feature.id',
            'feature_value AS fv' => 'fv.id = pfv.feature_value_id',
            'product' => 'product.id = pfv.product_id',
            'product_category' => 'product_category.product_id = product.id',
            'category' => 'product_category.category_id = category.id'
        ]) . $sqlO->group('feature.id');
        $dbData = $this->storage->query($sql);
        $prepareData = $this->prepareFeatures($dbData);
        return $this->getMapObjects($prepareData);
    }

    private function prepareFeatures($array)
    {
        if(is_array($array)) {
            $prepare = [];
            $feature = '';
            foreach($array as $currentFeature) {
                foreach($currentFeature as $feat => $value){
                    if($feat === 'feature') {
                        $feature = $value;
                    } else {
                        $prepare[$feature] = $value;
                        break;
                    }
                }
            }
            $prepare['category'] = $array[0]['category'];
            return $prepare;
        }
        return [];
    }
}