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
        Yii::$classMap['order\OrdersSearch'] = '@order/models/OrdersSearch.php';
        Yii::$classMap['order\Orders'] = '@order/models/Orders.php';
        Yii::$classMap['order\Services'] = '@order/models/Services.php';
        Yii::$classMap['order\Users'] = '@order/models/Users.php';
        Yii::$classMap['order\OrderAsset'] = '@order/assets/OrderAsset.php';
        Yii::$classMap['order\Pagination'] = '@order/helpers/Pagination.php';
        Yii::$classMap['order\Date'] = '@order/helpers/Date.php';
    }
}