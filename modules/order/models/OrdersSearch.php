<?php

namespace order;

use yii\data\ActiveDataProvider;

class OrdersSearch extends Orders
{

    public function search(): array
    {
        $page = 0;
        $dataProvider = $this->getDataProvider($page);

        $searchModel = $dataProvider->getModels();

        $data = [
            'searchModel' => $searchModel,
            'pagination' => $dataProvider->totalCount / 100,
            'totalItems' => $dataProvider->totalCount,
            'firstItem' => $searchModel[0]->id * 100,
            'lastItem' => $searchModel[count($searchModel)-1]->id * 100,
        ];

        $pagination = new Pagination();
        return array_merge($data, $pagination->getCorrectPagination($page));
    }

    private function getDataProvider($page)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Orders::find()->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 100,
                'page' => $page
            ],
        ]);

        $orders = $dataProvider->getModels();

        foreach ($orders as &$order) {
            $order['created_at'] = [
                'date' => Date::getDateTime($order['created_at'], Date::DATE_VIEW_FORMAT),
                'time' => Date::getDateTime($order['created_at'], Date::TIME_VIEW_FORMAT)
            ];
        }

        $dataProvider->setModels($orders);

        return $dataProvider;
    }

}