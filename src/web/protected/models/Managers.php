<?php

/**
 * This is the model class for table "managers".
 *
 * The followings are the available columns in table 'managers':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $record_date
 * @property string $position
 * @property string $lastname
 *
 * The followings are the available model relations:
 * @property CarrierManagers[] $carrierManagers
 */
class Managers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'managers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, record_date', 'required'),
			array('name, position, lastname', 'length', 'max'=>50),
			array('address', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, address, record_date, position, lastname', 'safe', 'on'=>'search'),
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
			'carrierManagers' => array(self::HAS_MANY, 'CarrierManagers', 'id_managers'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nombre',
			'address' => 'Direccion',
			'record_date' => 'Fecha de ingreso',
			'position' => 'Posición',
			'lastname' => 'Apellido',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('record_date',$this->record_date,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('lastname',$this->lastname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Managers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function getListCarriersAsignados($idManager)
	{
            $sql="Select c.id, c.name
                  From carrier c, carrier_managers x
                  Where x.id_managers =$idManager and x.id_carrier = c.id and x.end_date IS NULL ORDER BY c.name ASC";
            
            return CHtml::listData(Carrier::model()->findAllBySql($sql),'id','name');
	}
        
          public static function getListCarriersNOAsignados()
	{
            $sql="Select c.id, c.name
                  From carrier c, carrier_managers x
                  Where x.id_managers ='8' and x.id_carrier = c.id and c.id!='1130' and  x.end_date IS NULL ORDER BY c.name ASC ";
            return CHtml::listData(Carrier::model()->findAllBySql($sql),'id','name');
	}
         public static function getName($manager){           
            return self::model()->find("id=:id", array(':id'=>$manager))->lastname;
        }
        
        public static function getNameList()
        {
            return CHtml::listData(Managers::model()->findAll(array('order'=>'lastname')),'id','lastname');
        }

               
                
                
}



