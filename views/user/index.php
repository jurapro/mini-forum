<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            'name',
            'surname',
            [
                'attribute' => 'Администрирование',
                'format' => 'html',
                'value' => function ($data) {
                    switch ($data->active) {
                        case 0:
                            return Html::a('Разбанить', 'active/?id=' . $data->id);
                        case 1:
                            return Html::a('Забанить', 'ban/?id=' . $data->id);
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
