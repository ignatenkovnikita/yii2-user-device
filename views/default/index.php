<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserDeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('user-device', 'User Devices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-device-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'uuid',
            'status_id',
            'json:ntext',
            'token',
            'created_at:datetime',
            'updated_at:datetime',
            // 'author_id',
            // 'updater_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>

</div>
