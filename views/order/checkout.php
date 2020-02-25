<?php
/*
 * Страница оформления заказа, файл views/order/checkout.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/*
 * Если данные формы не прошли валидацию, получаем из сессии сохраненные
 * данные, чтобы заполнить ими поля формы, не заставляя пользователя
 * заполнять форму повторно
 */
$user_info = Yii::$app->user->identity;
$name = $user_info->username;
$email = $user_info->email;
$phone = '';
$address = '';
$comment = '';
if (Yii::$app->session->hasFlash('checkout-data')) {
    $data = Yii::$app->session->getFlash('checkout-data');
    $name = Html::encode($data['name']);
    $email = Html::encode($data['email']);
    $phone = Html::encode($data['phone']);
    $address = Html::encode($data['address']);
    $comment = Html::encode($data['comment']);
}
?>

<section>
	<div class="container">
	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div id="main-part">
			<h1>Оформление заказа</h1>
			<div id="checkout">
				<?php
				$success = false;
				if (Yii::$app->session->hasFlash('checkout-success')) {
					$success = Yii::$app->session->getFlash('checkout-success');
				}
				?>

				<?php if (!$success): ?>
					<?php if (Yii::$app->session->hasFlash('checkout-errors')): ?>
						<div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close"
									data-dismiss="alert" aria-label="Закрыть">
								<span aria-hidden="true">&times;</span>
							</button>
							<p>При заполнении формы допущены ошибки</p>
							<?php $allErrors = Yii::$app->session->getFlash('checkout-errors'); ?>
							<ul>
								<?php foreach ($allErrors as $errors): ?>
									<?php foreach ($errors as $error): ?>
										<li><?= $error; ?></li>
									<?php endforeach; ?>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php
					$form = ActiveForm::begin(
							['id' => 'checkout-form', 'class' => 'form-horizontal']
					);
					echo $form->field($order, 'name')
							  ->textInput(['value' => $name]);
					echo $form->field($order, 'email')
							  ->input('email', ['value' => $email]);
					echo $form->field($order, 'phone')
							  ->textInput(['value' => $phone])->widget(\yii\widgets\MaskedInput::className(), ['mask' => '(999) 999-99-99']);
					echo $form->field($order, 'address')
							  ->textarea(['rows' => 2, 'value' => $address]);
					echo $form->field($order, 'comment')
							  ->textarea(['rows' => 2, 'value' => $comment]);
					echo Html::submitButton(
							'Оформить заказ',
							['class' => 'btn btn-primary']
					);
					ActiveForm::end();
					?>
				<?php else: ?>
					<p>Ваш заказ успешно оформлен, спасибо за покупку.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</section>