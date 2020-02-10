<?php
/*
 * Файл components/views/brands.php
 */
use yii\helpers\Html;
use yii\helpers\Url;

if (empty($chain->name)) {
    return;
}
?>

<ol class="breadcrumb">
<?php 	do
		{ 
			$parent = $chain->parent;
		?>
			
			<li>
				<a href="<?= Url::to(['catalog/category', 'id' => $chain->id]); ?>">
					<?= Html::encode($chain->name); ?>
				</a>
			</li>
			
<?php 		$chain = $chain->parent;
		} while(isset($chain));
 ?>
</ol>