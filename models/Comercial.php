<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comercial".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido1
 * @property string|null $apellido2
 * @property float|null $comisión
 *
 * @property Pedido[] $pedidos
 */
class Comercial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comercial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido1'], 'required'],
            [['comisión'], 'number'],
            [['nombre', 'apellido1', 'apellido2'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido1' => Yii::t('app', 'Apellido1'),
            'apellido2' => Yii::t('app', 'Apellido2'),
            'comisión' => Yii::t('app', 'Comisión'),
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_comercial' => 'id']);
    }
}
