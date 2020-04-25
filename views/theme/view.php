<?php

use app\models\Answer;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Theme */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Themes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="theme-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            ['attribute' => 'date', 'format' => ['date', 'd-MM-Y H:i:s']],
            'text:ntext',
        ],
    ]) ?>

    <?php
    $form = ActiveForm::begin(['action'=>'/answer/create']);
    $answer = new Answer();
    ?>
    <?= $form->field($answer, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($answer, 'id_theme')->hiddenInput(['value'=>$model->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Ответить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'user.name',
            'text:ntext',
            ['attribute' => 'date', 'format' => ['date', 'd-MM-Y H:i:s']],
        ],
    ]); ?>



</div>
