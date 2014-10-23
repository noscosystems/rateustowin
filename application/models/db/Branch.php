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
 * @property string $company
 * @property string $address
 * @property string $county
 * @property string $phoneNum
 * @property string $town
 * @property string $postcode
 * @property string $email
 * @property integer $organisationId
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Answersheet[] $answersheets
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
			array('name, address, phoneNum, town, email, organisationId', 'required'),
			array('organisationId, active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('company, county, town', 'length', 'max'=>64),
			array('address, email', 'length', 'max'=>255),
			array('phoneNum', 'length', 'max'=>11),
			array('postcode', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, address, county, phoneNum, town, postcode, email, organisationId, active', 'safe', 'on'=>'search'),
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
			'Organisation' => array(self::BELONGS_TO, '\\application\\models\\db\\Organisation', 'organisationId'),
			'Answersheets' => array(self::HAS_MANY, '\\application\\models\\db\\Answersheet', 'branchId'),
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
			'county' => 'County',
			'phoneNum' => 'Phone Num',
			'town' => 'Town',
			'postcode' => 'Postcode',
			'email' => 'Email',
			'organisationId' => 'Organisation',
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
		$criteria->compare('company',$this->company,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('county',$this->county,true);
		$criteria->compare('phoneNum',$this->phoneNum,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('organisationId',$this->organisationId);
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
