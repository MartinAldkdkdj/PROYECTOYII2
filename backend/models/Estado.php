<?php

namespace backend\models;
use common\models\User;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property int $id
 * @property string $estado_nombre
 * @property int $estado_valor
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado_nombre', 'estado_valor'], 'required'],
            [['estado_valor'], 'integer'],
            [['estado_nombre'], 'string', 'max' => 45],
            [['estado_id'],'in', 'range'=>array_keys($this->getEstadoLista())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado_nombre' => 'Estado Nombre',
            'estado_valor' => 'Estado Valor',
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['estado_id' => 'id']);
    }

    /**
 * get lista de estados para lista desplegable
 */
public static function getEstadoLista()
{
    $dropciones = Estado::find()->asArray()->all();
    return ArrayHelper::map($dropciones, 'id', 'estado_nombre');
}
}
