<?php
/*
 * Layout-шаблон, файл modules/views/layouts/main.php
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | Панель управления</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    <!-- .......... -->
</header>

<div class="container">
    <?php if (Yii::$app->session->hasFlash('warning')): ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close"
                    data-dismiss="alert" aria-label="Закрыть">
                <span aria-hidden="true">&times;</span>
            </button>
            <p><?= Yii::$app->session->getFlash('warning'); ?></p>
        </div>
    <?php endif; ?>
    <?= $content; ?>
</div>

<footer class="footer">
    <!-- .......... -->
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>