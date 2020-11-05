<?php

namespace order;

use yii\base\Module;
use Yii;

class OrderModule extends Module
{

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'order';

    public function init()
    {
        parent::init();
        $this->initClassMap();
    }

    /**
     * Initialize class map
     */
    private function initClassMap()
    {
        Yii::$classMap['order\DefaultController'] = '@order/controllers/DefaultController.php';
//        Yii::$classMap['order\OrdersSearch'] = '@order/models/OrdersSearch.php';
        Yii::$classMap['order\OrderAsset'] = '@order/assets/OrderAsset.php';
    }
}