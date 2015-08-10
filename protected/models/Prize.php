<?php

/**
 * This is the model class for table "prize".
 *
 * The followings are the available columns in table 'prize':
 * @property integer $id
 * @property string $name
 * @property string $note
 * @property integer $count
 * @property integer $number
 * @property double $rate
 * @property integer $hourNumber
 * @property integer $dayNumber
 * @property integer $type
 * @property string $startTime
 * @property string $endTime
 * @property string $createTime
 * @property string $updateTime
 * @property integer $isDel
 */
class Prize extends CActiveRecord
{
	public $Status;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prize';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, count, number, hourNumber, dayNumber, type, isDel', 'numerical', 'integerOnly'=>true),
			array('rate', 'numerical'),
			array('name, note, startTime, endTime, createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, note, count, number, rate, hourNumber, dayNumber, type, startTime, endTime, createTime, updateTime, isDel', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Status' => '状态',
			'name' => '名称',
			'note' => '规格',
			'count' => '奖品总数',
			'number' => '已中奖人数',
			'rate' => '中奖概率',
			'type' => '奖品类型',
			'startTime' => '开始时间',
			'endTime' => '结束时间',
			'createTime' => '创建时间',
			'updateTime' => '更新时间',
			'hourNumber' => '小时上限',
			'dayNumber' => '单日上限',
			'isDel' => '是否已被删除',

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
		$criteria->compare('note',$this->note,true);
		$criteria->compare('count',$this->count);
		$criteria->compare('number',$this->number);
		$criteria->compare('rate',$this->rate);
		$criteria->compare('hourNumber',$this->hourNumber);
		$criteria->compare('dayNumber',$this->dayNumber);
		$criteria->compare('type',$this->type);
		$criteria->compare('startTime',$this->startTime,true);
		$criteria->compare('endTime',$this->endTime,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('isDel',$this->isDel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Prize the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
