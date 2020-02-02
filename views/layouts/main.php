<?php 
use yii\helpers\Html; 
use yii\helpers\Url; 
use app\assets\AppAsset; 
use app\assets\OldIeAsset;
use yii\bootstrap\Modal; 
 
AppAsset::register($this);
OldIeAsset::register($this);  
?> 
<?php $this->beginPage() ?> 
<!DOCTYPE html>  
<html lang="<?= Yii::$app->language ?>"> 
<head> 
    <meta charset="<?= Yii::$app->charset ?>"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <?php $this->registerCsrfMetaTags() ?> 
    <title><?= Html::encode($this->title) ?></title> 
    <?php $this->head() ?> 
</head> 
<body> 
<?php $this->beginBody() ?> 
<header>
	<div class="col-sm-4">
		<form method="post" action="<?= Url::to(['catalog/search']); ?>" class="pull-right">
			<?=
			Html::hiddenInput(
				Yii::$app->request->csrfParam,
				Yii::$app->request->csrfToken
			);
			?>
			<div class="input-group">
				<input type="text" name="query" class="form-control" placeholder="Поиск по каталогу">
				<div class="input-group-btn">
					<button class="btn btn-default" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</div>
			</div>
		</form>
	</div>
</header> 
 
<?= $content; ?> 
 
<footer>
    <div class="container">
        Copyright © 2018 E-SHOPPER Inc. All rights reserved.
    </div>
</footer>

<?php
$footer =
<<<FOOTER
<button type="button" class="btn btn-default" data-dismiss="modal">
    Продолжить покупки
</button>
<button type="button" class="btn btn-warning">
    Оформить заказ
</button>
FOOTER;
Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'basket-modal',
    'size'=>'modal-lg',
    'footer' => $footer
]);
Modal::end();
unset($footer);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>