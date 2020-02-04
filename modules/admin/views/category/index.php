<?php
/*
 * Страница списка всех категорий, файл modules/admin/views/category/index.php
 */
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории каталога';
?>

<h1><?= Html::encode($this->title); ?></h1>
<p>
    <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']); ?>
</p>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        [
            'attribute' => 'parent_id',
            'value' => function($data) {
                return $data->getParentName();
            }
        ],
        [
            'attribute' => 'keywords',
            'value' => function($data) {
                return empty($data->keywords) ? 'Не задано' : $data->keywords;
            }
        ],
        [
            'attribute' => 'description',
            'value' => function($data) {
                return empty($data->description) ? 'Не задано' : $data->description;
            }
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>