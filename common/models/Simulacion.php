<?php

/**
 * This is the model class for table "simulacion".
 *
 * The followings are the available columns in table 'simulacion':
 * @property integer $id
 * @property string $prospecto_id
 * @property integer $pie
 * @property integer $c1
 * @property integer $m1
 * @property integer $c2
 * @property integer $m2
 * @property integer $c3
 * @property integer $m3
 * @property integer $monto
 * @property integer $estado
 * @property string $fecha
 * @property string $prospecto
 *
 * The followings are the available model relations:
 * 
 */
class Simulacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Simulacion the static model class
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
		return 'simulacion';
	}

        
    public function beforeSave(){
            $this->fecha = new CDbExpression('NOW()');
            return parent::beforeSave();
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prospecto_id, pie, c1, m1, c2, m2, c3, m3, monto', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('prospecto_id', 'length', 'max'=>11),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, prospecto_id, pie, c1, m1, c2, m2, c3, m3, monto, estado, fecha', 'safe', 'on'=>'search'),
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
			/*'prospecto' => array(self::BELONGS_TO, 'Prospecto', 'prospecto_id'),*/
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'prospecto_id' => 'Prospecto',
			'pie' => 'Pie',
			'c1' => 'C1',
			'm1' => 'M1',
			'c2' => 'C2',
			'm2' => 'M2',
			'c3' => 'C3',
			'm3' => 'M3',
			'monto' => 'Monto',
			'estado' => 'Estado',
			'fecha' => 'Fecha',
			'prospecto' => 'Prospecto Data',
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
		$criteria->compare('prospecto_id',$this->prospecto_id,true);
		$criteria->compare('pie',$this->pie);
		$criteria->compare('c1',$this->c1);
		$criteria->compare('m1',$this->m1);
		$criteria->compare('c2',$this->c2);
		$criteria->compare('m2',$this->m2);
		$criteria->compare('c3',$this->c3);
		$criteria->compare('m3',$this->m3);
		$criteria->compare('monto',$this->monto);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}