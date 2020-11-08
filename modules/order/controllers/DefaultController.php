<?php

namespace order;

use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Request;

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

    public function actionIndex(Request $request)
    {
        $orderSearch = new OrdersSearch();
//        var_dump(\Yii::$app->request->queryParams);die;

        return $this->render('index', $orderSearch->search(\Yii::$app->request->queryParams));
    }

}