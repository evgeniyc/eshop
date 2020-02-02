<?php 
/* @var $this yii\web\View */ 
$this->title = 'Интернет-магазин';

use app\components\TreeWidget; 
use app\components\BrandsWidget; 
?> 
 
<section> 
    <div class="container"> 
        <!-- Слайдер из трех элементов --> 
        <div id="slider" class="carousel slide" data-ride="carousel"> 
        .......... 
        </div> 
    </div> 
</section> 
 
<section> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-sm-3"> 
               <h2>Каталог</h2> 
					<?= TreeWidget::widget(); ?>
				<h2>Бренды</h2> 
				<div class="brand-products"> 
					<?= BrandsWidget::widget(); ?> 
				</div> 
            </div> 
 
            <div class="col-sm-9"> 
                <h2>Лидеры продаж</h2> 
                <div class="row"> 
                    <div class="col-sm-4"> 
                    .......... 
                    </div> 
                    <div class="col-sm-4"> 
                    .......... 
                    </div> 
                    <div class="col-sm-4"> 
                    .......... 
                    </div> 
                </div> 
                <h2>Новинки</h2> 
                <div class="row"> 
                    <div class="col-sm-4"> 
                    .......... 
                    </div> 
                    <div class="col-sm-4"> 
                    .......... 
                    </div> 
                    <div class="col-sm-4"> 
                    .......... 
                    </div> 
                </div> 
                <h2>Распродажа</h2> 
                <div class="row"> 
                    <div class="col-sm-4"> 
                    .......... 
                    </div> 
                    <div class="col-sm-4"> 
                    .......... 
                    </div> 
                    <div class="col-sm-4"> 
                    .......... 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</section>
