<?php
/*
 * Форма для добавления и редактирования бренда, файл modules/admin/views/brand/_form.php
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 2, 'maxlength' => true]); ?>
    <?= $form->field($model, 'keywords')->textarea(['rows' => 2, 'maxlength' => true]); ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 2, 'maxlength' => true]); ?>
    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>