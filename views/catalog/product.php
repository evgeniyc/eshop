<?php
/*
 * Страница товара, файл views/catalog/product.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use app\components\ChainWidget;
use yii\helpers\Url;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FAS;

$this->registerJs('function Quant(el){
					var obj = $("#quant");
					var value = obj.val();
					var cls = $(el).attr("id");
					switch(cls){
						case "pquant": value++;
						break;
						case "mquant": value--;
						break;
					}
					if(value < 1 ) value = 1;
					obj.val(value);
					}',3,'quant'); 
?>

<section>
    <div class="container">
	<?php //ChainWidget::widget(['itemCurrent' => $category['id'], 'showCurrent' => true]); ?>
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
					<h1><?= Html::encode($product['name']); ?></h1>
					<div class="row">
						<div class="col-sm-5">
							<div class="product-image">
								<?=
								Html::img(
									'@web/images/products/large/'.$product['image'],
									['alt' => $product['name']]
								);
								?>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="prod-info">
								<p class="product-price">
									Цена: <span><?= $product['price']; ?></span> руб.
								</p>
								<form method="post"
									  action="<?= Url::to(['basket/add']); ?>"
									  class="add-to-basket">
									<label>Количество</label>
									<?= Html::button(FAS::i('plus'),[
										'id' => 'pquant',
										'onclick' => 'Quant(this)',
										]
									)?>
									<input name="count" type="text" value="1" id="quant" />
									<?= Html::button(FAS::i('minus'),[
										'id' => 'mquant',
										'onclick' => 'Quant(this)',
										]
									)?>
									<input type="hidden" name="id"
										   value="<?= $product['id']; ?>">
									<?=
									Html::hiddenInput(
										Yii::$app->request->csrfParam,
										Yii::$app->request->csrfToken
									);
									?>
									<button type="submit"
											class="btn btn-warning">
										<i class="fa fa-shopping-cart"></i>
										Добавить в корзину
									</button>
								</form>
								<p>Артикул: 1234567</p>
								<p>Наличие: На складе</p>
								<p>
									Бренд:
									<a href="<?= Url::to(['catalog/brand', 'id' => $brand['id']]); ?>">
										<?= Html::encode($brand['name']); ?>
									</a>
								</p>

							</div>
						</div>
					</div>
					<br>
					<div class="product-descr">
						<?= $product['content']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div id="zero" class="row"></div>