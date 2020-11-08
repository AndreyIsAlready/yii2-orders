<?php

namespace order;

use order\models\Users;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class OrdersSearch extends Orders
{

    public function search(): array
    {
        $page = 999;
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
            'query' => Orders::find()
                ->leftJoin(Services::tableName(), 'orders.service_id=services.id')
                ->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 100,
                'page' => $page
            ],
        ]);

        $orders = $dataProvider->getModels();

        $orderStatus = Orders::getStatuses();
        $orderModes = Orders::getModes();
        $services = $this->getServices();
        $users = $this->getUsers();

        foreach ($orders as &$order) {
            $order['status'] = $orderStatus[$order['status']];
            $order['mode'] = $orderModes[$order['mode']];
            $order['created_at'] = [
                'date' => Date::getDateTime($order['created_at'], Date::DATE_VIEW_FORMAT),
                'time' => Date::getDateTime($order['created_at'], Date::TIME_VIEW_FORMAT)
            ];

            $order['service_id'] = $services[$order['service_id'] - 1];
            $order['user_id'] = $users[$order['user_id'] -1];
        }

        $dataProvider->setModels($orders);

        return $dataProvider;
    }

    private function getServices()
    {
        return Services::find()
            ->select('services.id, services.name, COUNT(orders.id) count')
            ->from(Services::tableName())
            ->leftJoin(Orders::tableName(), "orders.service_id=services.id")
            ->groupBy('services.id')
            ->asArray()
            ->all();
    }

    private function getUsers()
    {
        return Users::find()
            ->select('users.first_name, users.last_name')
            ->from(Users::tableName())
            ->leftJoin(Orders::tableName(), "orders.user_id=users.id")
            ->asArray()
            ->all();
    }

}