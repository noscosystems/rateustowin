<?php

    namespace application\models\db;

    use \Yii;
    use \CException as Exception;
    use \application\components\db\ActiveRecord;

/**
 * This is the model class for table "answer".
 *
 * The followings are the available columns in table 'answer':
 * @property integer $id
 * @property integer $questId
 * @property integer $ansSheetId
 * @property string $answerTxt
 *
 * The followings are the available model relations:
 * @property Answersheet $ansSheet
 * @property Question $quest
 */
class Answer extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('questId, ansSheetId, answerTxt', 'required'),
			array('questId, ansSheetId', 'numerical', 'integerOnly'=>true),
			array('answerTxt', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, questId, ansSheetId, answerTxt', 'safe', 'on'=>'search'),
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
			'Quest' => array(self::HAS_ONE, '\\application\\models\\db\\Question', 'questId'),
			'AnsSheet' => array(self::HAS_ONE, '\\application\\models\\db\\Answersheet', 'ansSheetId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'questId' => 'Quest',
			'ansSheetId' => 'Ans Sheet',
			'answerTxt' => 'Answer Txt',
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
		$criteria->compare('questId',$this->questId);
		$criteria->compare('ansSheetId',$this->ansSheetId);
		$criteria->compare('answerTxt',$this->answerTxt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Answer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
