<?php

namespace app\models;

use Yii;
//EDGAR SEBASTIAN NOH UC MODIFICACION//
/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string $codigo
 * @property string $descripcion
 * @property float $precioVenta
 * @property float $precioCompra
 * @property float $existencia
 *
 * @property ProductosVendidos[] $productosVendidos
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'descripcion', 'precioVenta', 'precioCompra', 'existencia'], 'required'],
            [['precioVenta', 'precioCompra', 'existencia'], 'number'],
            [['codigo', 'descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripcion',
            'precioVenta' => 'Precio Venta',
            'precioCompra' => 'Precio Compra',
            'existencia' => 'Existencia',
        ];
    }

    /**
     * Gets query for [[ProductosVendidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosVendidos()
    {
        return $this->hasMany(ProductosVendidos::class, ['id_producto' => 'id']);
    }
}
