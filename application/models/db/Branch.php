<?php

    namespace application\models\db;

    use \Yii;
    use \CException as Exception;
    use \application\components\db\ActiveRecord;

/**
 * This is the model class for table "branches".
 *
 * The followings are the available columns in table 'branches':
 * @property integer $id
 * @property string $name
 * @property integer $company
 * @property string $address
 * @property string $postcode
 * @property string $sales
 * @property string $internal
 * @property string $fax
 * @property string $email
 * @property string $vat
 * @property string $reg
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Companies $company0
 * @property Customers[] $customers
 * @property Events[] $events
 * @property Jobs[] $jobs
 * @property Users[] $users
 */
class Branch extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'branches';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address', 'required'),
			array('company, active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('address, email', 'length', 'max'=>255),
			array('postcode', 'length', 'max'=>8),
			array('sales, internal, fax, vat, reg', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, company, address, postcode, sales, internal, fax, email, vat, reg, active', 'safe', 'on'=>'search'),
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
			// 'company0' => array(self::BELONGS_TO, 'Companies', 'company'),
			// 'customers' => array(self::HAS_MANY, 'Customers', 'branch'),
			'Events' => array(self::HAS_MANY, '\\application\\models\\db\\calendar\\Event', 'branch'),
			'Jobs' => array(self::HAS_MANY, '\\application\\models\\db\\job\\Job', 'branch'),
			'Users' => array(self::HAS_MANY, '\\application\\models\\db\\auth\\User', 'branch'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'company' => 'Company',
			'address' => 'Address',
			'postcode' => 'Postcode',
			'sales' => 'Sales',
			'internal' => 'Internal',
			'fax' => 'Fax',
			'email' => 'Email',
			'vat' => 'Vat',
			'reg' => 'Reg',
			'active' => 'Active',
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
		$criteria->compare('company',$this->company);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('sales',$this->sales,true);
		$criteria->compare('internal',$this->internal,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('vat',$this->vat,true);
		$criteria->compare('reg',$this->reg,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Branch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
