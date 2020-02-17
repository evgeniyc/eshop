<?php
/*
 * Файл components/views/brands.php
 */
use yii\helpers\Html;
use yii\helpers\Url;

if (empty($chain)) 
	return;
?>

<ol class="breadcrumb">
<?php $last = array_pop($chain);?>
	<li>
        <a href="<?= Url::Home() ?>">Главная</a>
    </li>
<?php foreach ($chain as $item): ?>
    <li>
        <a href="<?= Url::to(['catalog/category', 'id' => $item['id']]); ?>">
            <?= Html::encode($item['name']); ?>
        </a>
    </li>
<?php endforeach; ?>
	<li><?=$last['name']?></li>
</ol>

