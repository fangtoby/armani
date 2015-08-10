<?php

/**
 * This is the model class for table "market".
 *
 * The followings are the available columns in table 'market':
 * @property integer $ShopID
 * @property integer $CityID
 * @property string $CounterManager
 * @property string $DirectorName
 * @property string $ShopAddress
 * @property string $ShopCode
 * @property string $ShopEmail
 * @property string $ShopLocation_X
 * @property string $ShopLocation_Y
 * @property string $ShopName
 * @property string $ShopPhone
 * @property string $createTime
 * @property string $updateTime
 * @property integer $prize
 * @property integer $count
 * @property string $startTime
 * @property string $endTime
 * @property double $rate
 */
class Market extends CActiveRecord
{
	public $Status;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'market';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CityID, CounterManager, DirectorName, ShopAddress, ShopCode, ShopEmail,ShopName, ShopPhone, prize, startTime, endTime, rate', 'required'),
			array('ShopID, CityID, prize, count', 'numerical', 'integerOnly'=>true),
			array('rate', 'numerical'),
			array('CounterManager, DirectorName, ShopLocation_X, ShopLocation_Y, ShopPhone', 'length', 'max'=>100),
			array('ShopAddress, ShopName', 'length', 'max'=>200),
			array('ShopCode', 'length', 'max'=>50),
			array('ShopEmail', 'length', 'max'=>300),
			array('createTime, updateTime, startTime, endTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ShopID, CityID, CounterManager, DirectorName, ShopAddress, ShopCode, ShopEmail, ShopLocation_X, ShopLocation_Y, ShopName, ShopPhone, createTime, updateTime, prize, count, startTime, endTime, rate', 'safe', 'on'=>'search'),
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
			'ShopID' => '店铺ID',
			'Status' => '状态',
			'CityID' => '城 市',
			'CounterManager' => '经理',
			'DirectorName' => '店长',
			'ShopAddress' => '柜台地址',
			'ShopCode' => 'Shop Code',
			'ShopEmail' => 'Shop Email',
			'ShopLocation_X' => 'Shop Location X',
			'ShopLocation_Y' => 'Shop Location Y',
			'ShopName' => '柜台名称',
			'ShopPhone' => 'Shop Phone',
			'startTime' => '开始时间',
			'endTime' => '结束时间',
			'createTime' => '创建时间',
			'updateTime' => '更新时间',
			'rate' => '中奖概率',
			'count' => '中奖人数',
			'prize' => '奖品数量',
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
		$criteria->compare('Status',$this->Status);
		$criteria->compare('ShopID',$this->ShopID);
		$criteria->compare('CityID',$this->CityID);
		$criteria->compare('CounterManager',$this->CounterManager,true);
		$criteria->compare('DirectorName',$this->DirectorName,true);
		$criteria->compare('ShopAddress',$this->ShopAddress,true);
		$criteria->compare('ShopCode',$this->ShopCode,true);
		$criteria->compare('ShopEmail',$this->ShopEmail,true);
		$criteria->compare('ShopLocation_X',$this->ShopLocation_X,true);
		$criteria->compare('ShopLocation_Y',$this->ShopLocation_Y,true);
		$criteria->compare('ShopName',$this->ShopName,true);
		$criteria->compare('ShopPhone',$this->ShopPhone,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('prize',$this->prize);
		$criteria->compare('count',$this->count);
		$criteria->compare('startTime',$this->startTime,true);
		$criteria->compare('endTime',$this->endTime,true);
		$criteria->compare('rate',$this->rate);

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
	 * @return Market the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
