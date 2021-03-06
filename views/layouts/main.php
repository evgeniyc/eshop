<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\bootstrap\Nav;
use rmrevin\yii\fontawesome\FAS;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>

<body>
<?php $this->beginBody(); ?>
<header>

    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <ul class="nav nav-pills pull-left">
                        <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                    </ul>
					<div id="search-form">
						<form method="post" action="<?= Url::to(['catalog/search']); ?>" class="">
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
                </div>
                <div class="col-sm-4">
                    <ul class="nav nav-pills pull-right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div id="logo-block" class="pull-left">
                        <a href="<?= Url::home(); ?>">
							
                            <?=
                            Html::img(
                                '@web/images/home/logo2.png',
                                [
									'alt' => Yii::$app->params['shopName'],
									'id' => 'logo-img',
								]
                            );
                            ?>
							<?= Yii::$app->name ?>
                        </a>
                    </div>
                </div>
                <div class="col-sm-8">
                   	<?php
					echo Nav::widget([
						'options' => ['class' => 'navbar-nav navbar-right'],
						'encodeLabels' => false,
						'id' => 'main-menu',
						'items' => [
							['label' => FAS::i('home').' Главная', 'url' => ['/catalog/index']],
							['label' => FAS::i('crosshairs').' О нас', 'url' => ['/site/about']],
							['label' => FAS::i('id-badge').' Контакты', 'url' => ['/site/contact']],
							['label' => FAS::i('shopping-cart').' Корзина <span id="basket-badge" class="badge badge-light">'.
							(isset(Yii::$app->session['basket']['counts']) ? Yii::$app->session['basket']['counts'] : '').'</span>', 'url' => ['/basket/index']],
							
							Yii::$app->user->isGuest ? (
								['label' => FAS::i('sign-out-alt').' Войти', 'url' => ['/site/login']]
							) : (
								'<li>'
								. Html::beginForm(['/site/logout'], 'post')
								. Html::submitButton(
									FAS::i('sign-out-alt').' Выйти (' . Yii::$app->user->identity->username . ')',
									['class' => 'btn btn-link logout']
								)
								. Html::endForm()
								. '</li>'
							)
						],
					]);
					?>
										
                </div>
            </div>
        </div>
    </div>

    <!--<div class="header-bottom">
	<div class="container">
        <div class="row">
                <div class="col-sm-8">
                    <div id="menu">
                        <ul>
                            <li>
                                <a href="<?= Url::to(['catalog/index']); ?>">
                                    Статические страницы
                                </a>
                            </li>
                            <?php /*foreach ($this->context->pageMenu as $page): ?>
                                <li>
                                    <a href="<?= Url::to(['page/view', 'slug' => $page['slug']]); ?>">
                                        <?= $page['name']; ?>
                                    </a>
                                    <?php if (isset($page['childs'])): ?>
                                        <ul>
                                        <?php foreach ($page['childs'] as $child): ?>
                                            <li>
                                                <a href="<?= Url::to(['page/view', 'slug' => $child['slug']]); ?>">
                                                    <?= $child['name']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; */?>
                        </ul>
                    </div>
                </div>
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
            </div>
        </div>
    </div>-->

</header>

<?= $content ?>

<footer>
    <div class="container">
        Copyright © <?= date('Y') ?> ESHOP Ltd. All rights reserved.
    </div>
</footer><br>

<?php
$checkout = Url::to(['order/checkout']);
$footer =
<<<FOOTER
<button type="button" class="btn btn-default" data-dismiss="modal">
    Продолжить покупки
</button>
<a href="$checkout" class="btn btn-warning">
    Оформить заказ
</a>
FOOTER;
Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'basket-modal',
    'size'=>'modal-lg',
    'footer' => $footer
]);
Modal::end();
unset($checkout, $footer);
?>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>