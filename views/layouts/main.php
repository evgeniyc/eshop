<?php 
use yii\helpers\Html; 
use app\assets\AppAsset; 
use app\assets\OldIeAsset; 
 
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
<header>.....</header> 
 
<?= $content; ?> 
 
<footer>.....</footer> 

<?php $this->endBody() ?> 
</body> 
</html> 
<?php $this->endPage() ?>