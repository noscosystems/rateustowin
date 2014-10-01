<?php

/**
 * This is the model class for table "organasation".
 *
 * The followings are the available columns in table 'organasation':
 * @property integer $id
 * @property integer $branchId
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phoneNumber
 * @property integer $logoImg
 * @property integer $prizeImg
 *
 * The followings are the available model relations:
 * @property Image $logoImg0
 * @property Branch $branch
 * @property Survey[] $surveys
 */
class Organasation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'organasation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('branchId, name, address, email, phoneNumber, logoImg, prizeImg', 'required'),
			array('branchId, logoImg, prizeImg', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('email', 'length', 'max'=>64),
			array('phoneNumber', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, branchId, name, address, email, phoneNumber, logoImg, prizeImg', 'safe', 'on'=>'search'),
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
			'logoImg0' => array(self::BELONGS_TO, 'Image', 'logoImg'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'branchId'),
			'surveys' => array(self::HAS_MANY, 'Survey', 'organasationId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'branchId' => 'Branch',
			'name' => 'Name',
			'address' => 'Address',
			'email' => 'Email',
			'phoneNumber' => 'Phone Number',
			'logoImg' => 'Logo Img',
			'prizeImg' => 'Prize Img',
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
		$criteria->compare('branchId',$this->branchId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phoneNumber',$this->phoneNumber,true);
		$criteria->compare('logoImg',$this->logoImg);
		$criteria->compare('prizeImg',$this->prizeImg);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Organasation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
