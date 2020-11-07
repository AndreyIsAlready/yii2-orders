<?php

namespace order;

use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index'  => ['GET'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $orderSearch = new OrdersSearch();

        return $this->render('index', $orderSearch->search());
    }

}