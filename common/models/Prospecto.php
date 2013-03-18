<?php

/**
 * This is the model class for table "prospecto".
 *
 * The followings are the available columns in table 'prospecto':
 * @property integer $id
 * @property string $pe_nombre
 * @property string $pe_apellido
 * @property string $pe_rut
 * @property string $pe_telefono
 * @property string $pe_celular
 * @property string $pe_email
 * @property integer $em
 * @property string $em_nombre
 * @property string $em_rut
 * @property string $eq_tipo
 * @property string $eq_marca
 * @property string $eq_modelo
 * @property integer $eq_ano
 * @property string $eq_estado
 * @property string $co_moneda
 * @property integer $co_monto
 * @property integer $co_monto_nuevo
 * @property integer $co_plazo
 * @property integer $co_pie
 * @property integer $co_pie_tipo
 * @property integer $eq_qty
 * @property integer $estado
 * @property string $user_id
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property Estado $eqEstado
 * @property User $user
 * @property Tipoequipo $eqTipo
 */
class Prospecto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Prospecto the static model class
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
		return 'prospecto';
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
			array('pe_nombre, pe_apellido, pe_email, eq_tipo, eq_estado,eq_moneda, co_monto,co_moneda, co_plazo, co_pie,co_tasa, eq_qty, user_id,tasa,compro,comeje', 'required'),
			array('em, eq_ano, co_monto,co_monto_nuevo, co_plazo, co_plazo2,co_plazo3, co_pie_tipo, eq_qty, estado', 'numerical', 'integerOnly'=>true),
			array('pe_nombre, pe_apellido, pe_telefono, pe_celular, pe_email, em_nombre, eq_marca, eq_modelo', 'length', 'max'=>255),
                        array('co_tasa', 'length', 'max'=>2),
			array('pe_rut, em_rut', 'length', 'max'=>12),
			array('eq_tipo, eq_estado', 'length', 'max'=>11),
			//array('co_moneda', 'length', 'max'=>3),
			array('user_id', 'length', 'max'=>10),
                        array('organizacion_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,pe_apellido,pe_email,em_nombre', 'safe', 'on'=>'search'),
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
			'eqEstado' => array(self::BELONGS_TO, 'Estado', 'eq_estado'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                        'organizacion' => array(self::BELONGS_TO, 'Organizacion', 'organizacion_id'),
			'eqTipo' => array(self::BELONGS_TO, 'Tipoequipo', 'eq_tipo'),
                        'coMoneda' => array(self::BELONGS_TO, 'Moneda', 'co_moneda'),
                        'eqMoneda' => array(self::BELONGS_TO, 'Moneda', 'eq_moneda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pe_nombre' => 'Nombre',
			'pe_apellido' => 'Apellido',
			'pe_rut' => 'Rut',
			'pe_telefono' => 'Teléfono',
			'pe_celular' => 'Celular',
			'pe_email' => 'Email',
			'em' => 'Empresa',
			'em_nombre' => 'Nombre',
			'em_rut' => 'Rut',
			'eq_tipo' => 'Tipo Equipo',
			'eq_marca' => 'Marca',
			'eq_modelo' => 'Modelo',
			'eq_ano' => 'Año',
			'eq_estado' => 'Estado',
                        'eq_moneda' => 'Moneda Equipo',
			'co_moneda' => 'Moneda Cotización',
			'co_monto' => 'Valor Equipo',
			'co_monto_nuevo' => 'Valor Equipo Nuevo',
			'co_plazo' => 'Plazo',
                        'co_plazo2' => 'Plazo 2',
                        'co_plazo3' => 'Plazo 3',
			'co_pie' => 'Pie',
                        'co_tasa' => 'Tasa',
			'co_pie_tipo' => 'Pie Tipo',
			'eq_qty' => 'Cantidad',
			'estado' => 'Estado',
			'user_id' => 'Usuario',
                        'organizacion_id' => 'Organización',
			'fecha' => 'Fecha',
                        'tasa' => 'Tasa',
                        'compro' => 'Comisión Proveedor',
                        'comeje' => 'Comisión Ejecutivo',
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
		$criteria->compare('pe_nombre',$this->pe_nombre,true);
		$criteria->compare('pe_apellido',$this->pe_apellido,true);
		$criteria->compare('em_nombre',$this->em_nombre,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('user_id',$this->user_id,true);
                $criteria->compare('organizacion_id',$this->organizacion_id,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
