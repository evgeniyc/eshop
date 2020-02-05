<?php
namespace app\modules\admin;

use Yii;
use yii\web\ErrorHandler;

class Module extends \yii\base\Module 
{

    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init() {
        parent::init();
        Yii::configure($this, [
            'components' => [
                'errorHandler' => [
                    'class' => ErrorHandler::class,
                    'errorAction' => 'admin/admin/error'
                ]
            ],
        ]);
        $handler = $this->get('errorHandler');
        Yii::$app->set('errorHandler', $handler);
        $handler->register();
    }
}