<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */


use app\components\TreeWidget;
use app\components\BrandsWidget;
use app\components\ChainWidget;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\LinkPager;
?>

<?php 
	$this->title = 'Контакты';
	$this->params['breadcrumbs'][] = $this->title;
	$name = '';
	$email = '';
	if (isset(Yii::$app->user->id)) 
	{
		$name = Yii::$app->user->identity->username;
		$email = Yii::$app->user->identity->email;
	}
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
                    <div class="site-contact">
						<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

							<div class="alert alert-success">
								Благодарим Вас за обращение к нам. Мы ответим как можно скорее.
							</div>

							<p>
								Обратите внимание, что если вы включите отладчик Yii, вы сможете
								просмотреть почтовое сообщение на почтовой панели отладчика.
								<?php if (Yii::$app->mailer->useFileTransport): ?>
								Поскольку приложение находится в режиме разработки, электронное письмо не отправляется, а сохраняется как
								файл под <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
								Пожалуйста, настройте свойство <code> useFileTransport </code> <code> mail </code>
								компонент приложения должен быть ложным, чтобы включить отправку электронной почты.
								<?php endif; ?>
							</p>

						<?php else: ?>

							<p>
								Если у вас есть деловые вопросы или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами.
								Спасибо.
							</p>

										<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

										<?= $form->field($model, 'name')->textInput(['autofocus' => true, 'value' => $name]) ?>

										<?= $form->field($model, 'email')->textInput(['value' => $email]) ?>

										<?= $form->field($model, 'subject') ?>

										<?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

										<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
											'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-3">{input}</div></div>',
										]) ?>

										<div class="form-group">
											<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
										</div>

										<?php ActiveForm::end(); ?>

						<?php endif; ?>
					</div>
				</div>
            </div>
        </div>
    </div>
</section>
<div id="zero" class="row"></div>


