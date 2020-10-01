<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\ActiveField;
use yii\captcha\Captcha;

?>
<div class="site-contact container-sm">
<h2>Форма обратной связи</h2>

<p>Ваш IP: <?php Yii::$app->request->userIP; ?></p><br>
<?php
if(Yii::$app->session->hasFlash('success')) {?>
    <div class="alert alert-success" role="alert">
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>


    <?php
} else { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
    <?php
}

$form = ActiveForm::begin(['id' => 'emailForm']);
    echo $form->field($model, 'name')->label('Имя');
    echo $form->field($model, 'email')->input('email');
    echo $form->field($model, 'subject');
    echo $form->field($model, 'text')->label('Сообщение')->textarea(['rows'=>6]);
    /*echo $form->field($model, 'verifyCode')->widget(Captcha::className(),
    // ['template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
    ]); */
    echo Html::submitButton('Отправить сообщение', ['class' =>'btn btn-success' ]);
ActiveForm::end();
?>
</div>