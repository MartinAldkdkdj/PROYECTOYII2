<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $fecha_nacimiento
 * @property int $genero_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Genero $genero
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

        /**
    * behaviors
    */

     public function behaviors()
    {
        return [
            'timestamp' => [
            'class' => 'yii\behaviors\TimestampBehavior',
            'attributes' => [
                                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                            ],
            'value' => new Expression('NOW()'),
                            ],
                ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'genero_id'], 'required'],
            [['user_id', 'genero_id'], 'integer'],
            [['genero_id'],'in', 'range'=>array_keys($this->getGeneroLista())],
            [['nombre', 'apellido'], 'string'],
            [['fecha_nacimiento', 'created_at', 'updated_at'], 'safe'],
            [['fecha_nacimiento'], 'date', 'format'=>'Y-m-d'],
            //[['fecha_nacimiento'], 'date', 'format'=>'php:Y-m-d'],
            //[['genero_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::class, 'targetAttribute' => ['genero_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'genero_id' => 'Genero ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'generoNombre' => Yii::t('app', 'Genero'),
            'userLink' => Yii::t('app', 'User'),
            'perfilIdLink' => Yii::t('app', 'Perfil'),
        ];
    }

    /**
     * Gets query for [[Genero]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Genero::class, ['id' => 'genero_id']);
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return \yii\db\ActiveQuery
     */

    public function getGeneroNombre()
    {
        return $this->genero->genero_nombre;
    }
    /**
     * get lista de generos para lista desplegable
     */

    public static function getGeneroLista()
    {
        $droptions = Genero::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'genero_nombre');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @get Username
     */
    public function getUsername()
    {
        return $this->user->username;
    }
    /**
     * @getUserId
     */
    public function getUserId()
    {
        return $this->user ? $this->user->id : 'ninguno';
    }

    /**
     * @getUserLink
     */

    public function getUserLink()
    {
        $url = Url::to(['user/view', 'id'=>$this->UserId]);
        $opciones = [];
        return Html::a($this->getUserName(), $url, $opciones);
    }
    /**
     * @getProfileLink
     */

    public function getPerfilIdLink()
    {
        $url = Url::to(['perfil/update', 'id'=>$this->id]);
        $opciones = [];
        return Html::a($this->id, $url, $opciones);
    }

    public function beforeValidate()
{
    if ($this->fecha_nacimiento != null) {
                            
        $nuevo_formato_fecha = date('Y-m-d', strtotime($this->fecha_nacimiento));
        $this->fecha_nacimiento = $nuevo_formato_fecha;
    }

        return parent::beforeValidate();
}
    
}
