<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */


use app\components\TreeWidget;
use app\components\BrandsWidget;
use app\components\ChainWidget;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php 
	$this->title = 'Форма входа';
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
                    <div class="site-login">
    					<p>Пожалуйста, заполните следующие поля для входа:</p>

						<?php $form = ActiveForm::begin([
							'id' => 'login-form',
							'layout' => 'horizontal',
							'fieldConfig' => [
								'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
								'labelOptions' => ['class' => 'col-lg-1 control-label'],
							],
						]); ?>

							<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

							<?= $form->field($model, 'password')->passwordInput() ?>

							<?= $form->field($model, 'rememberMe')->checkbox([
								'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
							]) ?>

							<div class="form-group">
								<div class="col-lg-offset-1 col-lg-11">
									<?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
								</div>
							</div>

						<?php ActiveForm::end(); ?>

						<div class="col-lg-offset-1" style="color:#999;">
							Вы можете войти с помощью <strong> admin / admin </strong> или <strong> demo / demo </strong>. <br>
							Чтобы изменить имя пользователя / пароль, проверьте код <code>app\models\User::$users</code>.
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>
<div id="zero" class="row"></div>





