<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property float $total
 * @property string|null $fecha
 * @property int $id_cliente
 * @property int $id_comercial
 *
 * @property Cliente $cliente
 * @property Comercial $comercial
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total', 'id_cliente', 'id_comercial'], 'required'],
            [['total'], 'number'],
            [['fecha'], 'safe'],
            [['id_cliente', 'id_comercial'], 'integer'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
            [['id_comercial'], 'exist', 'skipOnError' => true, 'targetClass' => Comercial::className(), 'targetAttribute' => ['id_comercial' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'total' => Yii::t('app', 'Total'),
            'fecha' => Yii::t('app', 'Fecha'),
            'id_cliente' => Yii::t('app', 'Id Cliente'),
            'id_comercial' => Yii::t('app', 'Id Comercial'),
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }

    /**
     * Gets query for [[Comercial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComercial()
    {
        return $this->hasOne(Comercial::className(), ['id' => 'id_comercial']);
    }
}
