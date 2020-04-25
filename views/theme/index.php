<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Themes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="theme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Theme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'text:ntext',
            ['attribute' => 'status', 'value' => function ($data) {
                return $data->getStatusText();
            }],
            ['attribute' => 'date', 'format' => ['date', 'd-MM-Y H:i:s']],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
