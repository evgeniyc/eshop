<?php
/*
 * Страница раздела каталога, файл views/catalog/category.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use app\components\ChainWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<?php 
	$this->title = 'О нас';
	$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="container">
	    <div class="row no-gutters row-flex">
            <div class="col-sm-3">
                <div id="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="category-products">
                        <?= TreeWidget::widget(); ?>
                    </div>

                    <h2>Бренды</h2>
                    <div class="brand-products">
                        <?= BrandsWidget::widget(); ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
				<div id="main-part">
					<h2><?= Html::encode($this->title) ?></h2>
                    <p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi enim ipsum, maximus eget suscipit et, gravida in ligula. Curabitur a augue quam. Pellentesque consequat turpis justo, at ullamcorper mauris molestie et. Duis cursus fringilla lobortis. Vestibulum malesuada vestibulum diam, quis facilisis nunc aliquet vel. Fusce sed leo dapibus, viverra dolor eget, interdum odio. Praesent ut vulputate ante. Morbi vehicula, felis in vulputate vestibulum, nulla purus vulputate ipsum, malesuada tincidunt velit dui vel enim. Suspendisse at erat ut tellus laoreet accumsan sit amet pellentesque nisl. Morbi malesuada elit at nulla dapibus, a consequat tortor ultricies. Donec vehicula dui a massa sollicitudin, ac vestibulum erat congue. Integer in ex at quam tincidunt varius sed id odio. Ut quis vulputate odio, id dapibus tortor. Pellentesque pulvinar venenatis nisi, eu placerat mi. 
					</p>
					<p>
						Vestibulum dapibus, libero quis sagittis faucibus, purus arcu bibendum enim, a bibendum neque neque sed mi. Aliquam erat volutpat. Vestibulum consequat ex sit amet volutpat condimentum. Sed feugiat ultrices sagittis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur diam dui, fermentum eu mattis vel, aliquet sit amet lacus. Praesent erat velit, gravida nec nisl sit amet, vehicula vestibulum justo. Vivamus nec orci quis erat suscipit pulvinar eu quis metus. Integer eget mollis felis, eu sodales ipsum. Aliquam erat volutpat. 
					</p>
					<p>
						Vivamus vehicula, leo vel congue euismod, dolor justo congue felis, et pharetra libero nibh ac lorem. Aenean finibus ex ex, in eleifend nisl consequat vel. Maecenas laoreet leo tellus, ac pellentesque lacus volutpat eu. Ut in dui sodales est euismod porttitor. Curabitur nec magna a massa ullamcorper mattis. Phasellus at imperdiet tellus. Morbi pretium vitae urna eu volutpat. Nullam purus sem, pellentesque id augue sit amet, sodales tincidunt mi. Suspendisse ut malesuada lacus. Mauris diam neque, cursus sed porta vitae, fermentum eget eros. Etiam vel aliquam nibh, a efficitur dui. 
					</p>
					<p>
						Maecenas tincidunt mauris ut massa lacinia consequat. Fusce rutrum posuere ex ut finibus. Nam congue lorem in varius pellentesque. Praesent sodales ac neque non ullamcorper. Phasellus vestibulum euismod purus vitae viverra. Praesent finibus sapien elit, eu fringilla enim ornare in. Pellentesque vel lacus non diam suscipit fringilla vel at ex. Phasellus quis pretium urna, ac fringilla mauris. Morbi interdum odio nec ipsum iaculis elementum. Aenean viverra eget urna id congue. Praesent nisi lorem, facilisis nec venenatis nec, sollicitudin eget velit. Suspendisse potenti. In vitae sem sed nisi fringilla congue at a nulla. Phasellus auctor lacus erat, sed dapibus massa hendrerit non. Sed vitae feugiat tellus. Etiam a venenatis ligula. 
					</p>
					<p>
						Sed urna tortor, efficitur eget ullamcorper vitae, fermentum ac tellus. Fusce consequat viverra risus vel faucibus. Phasellus ullamcorper, justo sed mattis tincidunt, magna nisl congue augue, ac rutrum lorem mi vitae mi. Aliquam maximus rutrum fermentum. Phasellus in velit ac erat viverra tempor ut vel diam. Praesent ut iaculis orci. Nam porttitor convallis sem, vitae laoreet erat rutrum et. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque tincidunt non quam vitae lacinia. Vestibulum dui est, efficitur vel nisl at, suscipit commodo diam. Vivamus id elementum tortor. Curabitur faucibus ligula leo, sed fermentum metus pretium a. Donec lorem dui, feugiat et efficitur vitae, aliquam eu ante. Nam tempor vitae augue vel maximus. Aenean nec ornare nunc. Maecenas commodo dolor diam, a dictum sem tempus quis. 
					</p>
				</div>
            </div>
        </div>
    </div>
</section>
<div id="zero" class="row"></div>
