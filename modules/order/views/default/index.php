<?php

use order\models\OrdersSearch;

/* @var $searchModel OrdersSearch */
/* @var $pagination int */
/* @var $totalItems int */
/* @var $firstItem int */
/* @var $lastItem int */
/* @var $firstPage int */
/* @var $lastPage int */
/* @var $page int */

?>

<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Orders</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <ul class="nav nav-tabs p-b">
        <li class="active"><a href="#">All orders</a></li>
        <li><a href="#">Pending</a></li>
        <li><a href="#">In progress</a></li>
        <li><a href="#">Completed</a></li>
        <li><a href="#">Canceled</a></li>
        <li><a href="#">Error</a></li>
        <li class="pull-right custom-search">
            <form class="form-inline" action="/admin/orders" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" value="" placeholder="Search orders">
                    <span class="input-group-btn search-select-wrap">

            <select class="form-control search-select" name="search-type">
              <option value="1" selected="">Order ID</option>
              <option value="2">Link</option>
              <option value="3">Username</option>
            </select>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </span>
                </div>
            </form>
        </li>
    </ul>
    <table class="table order-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Link</th>
            <th>Quantity</th>
            <th class="dropdown-th">
                <div class="dropdown">
                    <button class="btn btn-th btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Service
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li class="active"><a href="">All (894931)</a></li>
                        <li><a href=""><span class="label-id">214</span>  Real Views</a></li>
                        <li><a href=""><span class="label-id">215</span> Page Likes</a></li>
                        <li><a href=""><span class="label-id">10</span> Page Likes</a></li>
                        <li><a href=""><span class="label-id">217</span> Page Likes</a></li>
                        <li><a href=""><span class="label-id">221</span> Followers</a></li>
                        <li><a href=""><span class="label-id">224</span> Groups Join</a></li>
                        <li><a href=""><span class="label-id">230</span> Website Likes</a></li>
                    </ul>
                </div>
            </th>
            <th>Status</th>
            <th class="dropdown-th">
                <div class="dropdown">
                    <button class="btn btn-th btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Mode
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li class="active"><a href="">All</a></li>
                        <li><a href="">Manual</a></li>
                        <li><a href="">Auto</a></li>
                    </ul>
                </div>
            </th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($searchModel as $model):?>
        <tr>
            <td><?= $model->id?></td>
            <td><?= $model->user_id['first_name']?> <?= $model->user_id['last_name'];?></td>
            <td class="link"><?= $model->link?></td>
            <td><?= $model->quantity?></td>
            <td class="service">
                <span class="label-id"><?= $model->service_id['count']?></span><?= $model->service_id['name']?>
            </td>
            <td><?= $model->status?></td>
            <td><?= $model->mode?></td>
            <td><span class="nowrap"><?= $model->created_at['date']?></span><span class="nowrap"><?= $model->created_at['time']?></span></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-8">

            <nav>
                <ul class="pagination">
                    <li class="disabled"><a href="" aria-label="Previous">&laquo;</a></li>
                <?php for($i = $firstPage; $i <= $lastPage; $i++):?>
                    <?php if ($i === $page):?>
                    <li class="active"><a href=""><?=$i?></a></li>
                    <?php else:?>
                    <li><a href=""><?=$i?></a></li>
                    <?php endif;?>
                <?php endfor; ?>
                    <li><a href="" aria-label="Next">&raquo;</a></li>
                </ul>
            </nav>

        </div>
        <div class="col-sm-4 pagination-counters">
            <?= $lastItem  ?> to <?= $firstItem ?> of <?= $totalItems?>
        </div>

    </div>
</div>
