<?php

/**
 * This is the model class for table "seguro".
 *
 * The followings are the available columns in table 'seguro':
 * @property integer $id
 * @property string $tipo
 * @property integer $r1
 * @property integer $r2
 * @property double $valor
 */
class Seguro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Seguro the static model class
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
		return 'seguro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, r1, r2, valor', 'required'),
			array('r1, r2', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('tipo', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tipo, r1, r2, valor', 'safe', 'on'=>'search'),
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
			'r1' => 'R1',
			'r2' => 'R2',
			'valor' => 'Valor',
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
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('r1',$this->r1);
		$criteria->compare('r2',$this->r2);
		$criteria->compare('valor',$this->valor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}