<?php
/*
 * Файл view-шаблона modules/admin/views/default/index.php
 */
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $queueOrders yii\data\ActiveDataProvider */
/* @var $processOrders yii\data\ActiveDataProvider */

$this->title = 'Текущее состояние';
?>

  <h4 class="page-header">
                        AdminLTE Small Boxes
                        <small>Small boxes are used for viewing statistics. To create a small box use the class <code>.small-box</code> and mix & match using the <code>bg-*</code> classes.</small>
                    </h4>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        150
                                    </h3>
                                    <p>
                                        New Orders
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        53<sup style="font-size: 20px">%</sup>
                                    </h3>
                                    <p>
                                        Bounce Rate
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        44
                                    </h3>
                                    <p>
                                        User Registrations
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        65
                                    </h3>
                                    <p>
                                        Unique Visitors
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
					
					<!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                        230
                                    </h3>
                                    <p>
                                        Sales
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-cart-outline"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>
                                        80<sup style="font-size: 20px">%</sup>
                                    </h3>
                                    <p>
                                        Conversion Rate
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-briefcase-outline"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>
                                        14
                                    </h3>
                                    <p>
                                        Notofications
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-alarm-outline"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>
                                        160
                                    </h3>
                                    <p>
                                        Products
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-pricetag-outline"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->


<h1><?= Html::encode($this->title) ?></h1>

<h2>Новые заказы</h2>

<?=
GridView::widget([
    'dataProvider' => $queueOrders,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'name',
        'email:email',
        'phone',
        'amount',
        [
            'attribute' => 'status',
            'value' => function ($data) {
                switch ($data->status) {
                    case 0: return '<span class="text-danger">Новый</span>';
                    case 1: return '<span class="text-warning">Обработан</span>';
                    case 2: return '<span class="text-warning">Оплачен</span>';
                    case 3: return '<span class="text-warning">Доставлен</span>';
                    case 4: return '<span class="text-success">Завершен</span>';
                    default: return 'Ошибка';
                }
            },
            'format' => 'html'
        ],
        'created',
        'updated',
    ],
]);
?>

<h2>Заказы в работе</h2>

<?=
GridView::widget([
    'dataProvider' => $processOrders,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'name',
        'email:email',
        'phone',
        'amount',
        [
            'attribute' => 'status',
            'value' => function ($data) {
                switch ($data->status) {
                    case 0: return '<span class="text-danger">Новый</span>';
                    case 1: return '<span class="text-warning">Обработан</span>';
                    case 2: return '<span class="text-warning">Оплачен</span>';
                    case 3: return '<span class="text-warning">Доставлен</span>';
                    case 4: return '<span class="text-success">Завершен</span>';
                    default: return 'Ошибка';
                }
            },
            'format' => 'html'
        ],
        'created',
        'updated'
    ],
]);
?>