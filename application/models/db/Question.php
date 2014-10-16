<?php

    namespace application\models\db;

    use \Yii;
    use \CException as Exception;
    use \application\components\db\ActiveRecord;

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id
 * @property integer $surveyId
 * @property string $questTxt
 * @property integer $answerType
 *
 * The followings are the available model relations:
 * @property Answer[] $answers
 * @property Answertype $answerType0
 * @property Survey $survey
 */
class Question extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('surveyId, questTxt, answerType', 'required'),
			array('surveyId, answerType', 'numerical', 'integerOnly'=>true),
			array('questTxt', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, surveyId, questTxt, answerType', 'safe', 'on'=>'search'),
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
			'Answers' => array(self::HAS_ONE, '\\application\\models\\db\\Answer', 'questId'),
			'AnswerType0' => array(self::HAS_ONE, '\\application\\models\\db\\Answertype', 'answerType'),
			'Survey' => array(self::HAS_ONE, '\\application\\models\\db\\Survey', 'surveyId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'surveyId' => 'Survey',
			'questTxt' => 'Quest Txt',
			'answerType' => 'Answer Type',
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
		$criteria->compare('surveyId',$this->surveyId);
		$criteria->compare('questTxt',$this->questTxt,true);
		$criteria->compare('answerType',$this->answerType);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
