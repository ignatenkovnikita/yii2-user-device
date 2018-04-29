<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserDevice */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user-device', 'User Devices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-device-view">

    <p>
        <?php echo Html::a(Yii::t('user-device', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('user-device', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'uuid',
            'status_id',
            'json:ntext',
            'token',
            'created_at:datetime',
            'updated_at:datetime',
            'author_id',
            'updater_id',
        ],
    ]) ?>

</div>
