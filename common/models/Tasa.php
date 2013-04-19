<?php

/**
 * This is the model class for table "tasa".
 *
 * The followings are the available columns in table 'tasa':
 * @property integer $id
 * @property string $tipo
 * @property integer $rango
 * @property double $tasa
 */
class Tasa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tasa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tasa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, rango, tasa, compro, comeje', 'required'),
			//array('tipo, rango', 'numerical', 'integerOnly'=>true),
			//array('tasa', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipo, rango, tasa', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipo' => 'Tipo',
			'rango' => 'Rango',
			'tasa' => 'Tasa',
			'compro' => 'Compro',
			'comeje' => 'Comeje',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('rango',$this->rango);
		$criteria->compare('tasa',$this->tasa);

		//$criteria->compare('compro',$this->compro);
		//$criteria->compare('comeje',$this->comeje);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
