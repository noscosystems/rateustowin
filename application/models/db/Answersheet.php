<?php

    namespace application\models\db;

    use \Yii;
    use \CException as Exception;
    use \application\components\db\ActiveRecord;
/**
 * This is the model class for table "answersheet".
 *
 * The followings are the available columns in table 'answersheet':
 * @property integer $id
 * @property integer $customerId
 * @property integer $branchId
 * @property integer $surveyId
 *
 * The followings are the available model relations:
 * @property Answer[] $answers
 * @property Survey $survey
 * @property Branches $branch
 * @property Users $customer
 */
class Answersheet extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'answersheet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customerId, branchId, surveyId', 'required'),
			array('customerId, branchId, surveyId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, customerId, branchId, surveyId', 'safe', 'on'=>'search'),
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
			'answers' => array(self::HAS_MANY, '\\application\\models\\db\\Answer', 'ansSheetId'),
			'survey' => array(self::BELONGS_TO, '\\application\\models\\db\\Survey', 'surveyId'),
			'branch' => array(self::BELONGS_TO, '\\application\\models\\db\\Branches', 'branchId'),
			'customer' => array(self::BELONGS_TO, '\\application\\models\\db\\Users', 'customerId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'customerId' => 'Customer',
			'branchId' => 'Branch',
			'surveyId' => 'Survey',
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
		$criteria->compare('customerId',$this->customerId);
		$criteria->compare('branchId',$this->branchId);
		$criteria->compare('surveyId',$this->surveyId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Answersheet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}