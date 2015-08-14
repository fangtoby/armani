<?php

/**
 * This is the model class for table "lottery".
 *
 * The followings are the available columns in table 'lottery':
 * @property integer $id
 * @property integer $uid
 * @property string $phone
 * @property integer $cityId
 * @property integer $marketId
 * @property integer $type
 * @property string $createTime
 * @property string $updateTime
 * @property integer $win
 */
class Lottery extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $username;
	
	public $path;
	
	public function tableName()
	{
		return 'lottery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
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
			'user'=>array(self::BELONGS_TO, 'User', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => 'Uid',
			'phone' => '手机号码',
			'cityId' => '店铺所在城市',
			'marketId' => '店铺名称',
			'type' => '中奖类型',
			'createTime' => '中奖时间',
			'win' => '是否中奖',
			'giftId'=>'奖品描述',
			'username'=>'昵称',
			'path'=>'平台',
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
		$criteria->with = array('user');
		$criteria->compare('id',$this->id);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('cityId',$this->cityId);
		$criteria->compare('marketId',$this->marketId);
		$criteria->compare('type',$this->type);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('win',1);
		$criteria->compare('nickname',$this->username);
		$criteria->compare('path',$this->path);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>20,
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lottery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
