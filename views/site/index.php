<?php

/* @var $this yii\web\View */
$this->title = 'Главная страница';

use yii\grid\GridView;
use yii\helpers\Html; ?>

<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format'=>'html',
                'value' => function ($data) {
                    return Html::a($data->name, '/theme/view/?id=' . $data->id);
                }],
            'text:ntext',
            ['attribute' => 'Ответы', 'value' => function ($data) {
                return count($data->answers);
            }],

        ],
    ]); ?>
</div>
