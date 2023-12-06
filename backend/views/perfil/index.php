<?php
 
use yii\helpers\Html;
use yii\grid\GridView;
use \yii\bootstrap\Collapse;
 
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 
$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">
 
    <h1><?= Html::encode($this->title) ?></h1>

 
  
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
            //'id',
            ['attribute'=>'perfilIdLink', 'format'=>'raw'],
            ['attribute'=>'userLink', 'format'=>'raw'],
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'generoNombre',
            ['class' => 'yii\grid\ActionColumn'],
             
            // 'created_at',
            // 'updated_at',
            // 'user_id',
 
            
        ],
    ]); ?>
 
</div>