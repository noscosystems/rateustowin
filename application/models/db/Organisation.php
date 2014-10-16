<?php
	namespace application\models\db;

    use \Yii;
    use \CException as Exception;
    use \application\components\db\ActiveRecord;

/**
 * This is the model class for table "organisation".
 *
 * The followings are the available columns in table 'organisation':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phoneNumber
 * @property integer $logoImg
 * @property integer $prizeImg
 *
 * The followings are the available model relations:
 * @property Image $prizeImg0
 * @property Image $logoImg0
 * @property Survey[] $surveys
 */
class Organisation extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'organisation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, email, phoneNumber, logoImg, prizeImg', 'required'),
			array('logoImg, prizeImg', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('email', 'length', 'max'=>255),
			array('phoneNumber', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, address, email, phoneNumber, logoImg, prizeImg', 'safe', 'on'=>'search'),
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
			'PrizeImg' => array(self::BELONGS_TO, '\\application\\models\\db\\Image', 'prizeImg'),
			'LogoImg' => array(self::BELONGS_TO, '\\application\\models\\db\\Image', 'logoImg'),
			'Surveys' => array(self::HAS_MANY, '\\application\\models\\db\\Survey', 'orgId'),
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
	 * @return Organisation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
