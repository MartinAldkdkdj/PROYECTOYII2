<?php

use \yii\bootstrap\Modal;
use kartik\social\FacebookPlugin;
use \yii\bootstrap5\Collapse;
use \yii\bootstrap5\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'ServiRefri';
?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-2">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">ServiRefri Valladolid</h1>
        </div>
    </div>

    <div class="body-content" style="display: block; margin: 0 auto;">

        <div class="row" style="text-alight">
            <div class="col-lg-3">
                <h2>INVENTARIO</h2>
                <img src="../web" alt="">
                <p>Administrar y controlar todas los productos del almacen servirefri</p>
                <IMG src=  <?php echo Url::to('@web/archivos/vectorinventario.png',true); ?> style="display: block; margin: 0 auto;" width="50%" height="50%"  BORDER=0 ALT="Imagen de Enzabezado" align="center">
                <hr>
                <?= \yii\helpers\Html::a('Inventario de Productos', 'http://localhost/cursoyii2048/frontend/acciones/principal.php', ['target' => '_blank', 'class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-lg-3">
                <h2>VENDER PRODUCTOS</h2>
                <p>realizar ventas de productos</p>
                <IMG src=  <?php echo Url::to('@web/archivos/vectoringresos.png',true); ?> style="display: block; margin: 0 auto;" width="52%" height="52%"  BORDER=0 ALT="Imagen de Enzabezado">
                <hr>
                <?= \yii\helpers\Html::a('Vender productos', 'http://localhost/cursoyii2048/frontend/acciones/vender.php', ['target' => '_blank', 'class' => 'btn btn-primary']) ?> 
            </div>
            <div class="col-lg-3">
                <h2>HISTORIAL DE VENTAS</h2>
                <p>Impresion de tickets y detalles de las ventas realizadas</p>
                <IMG src=  <?php echo Url::to('@web/archivos/vectorventas.png',true); ?> style="display: block; margin: 0 auto;" width="45%" height="45%"  BORDER=0 ALT="Imagen de Enzabezado" >
                <hr>
                <?= \yii\helpers\Html::a('Historial de ventas y tickets', 'http://localhost/cursoyii2048/frontend/acciones/ventas.php', ['target' => '_blank', 'class' => 'btn btn-primary']) ?>
            </div>

            <div class="col-lg-3">
                <h2>CATEGORIAS</h2>
                <p>Crear categorias para los productos</p>
                <IMG src=  <?php echo Url::to('@web/archivos/vectorcategorias.png',true); ?> style="display: block; margin: 0 auto;" width="70%" height="61%"  BORDER=0 ALT="Imagen de Enzabezado" >
                <hr>
                <?= \yii\helpers\Html::a('Categorias en desarrollo', 'http://localhost/cursoyii2048/acciones/login.php', ['target' => '_blank', 'class' => 'btn']) ?>
            </div>
            <br>
        </div>

    </div>
</div>
