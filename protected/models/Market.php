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
 */
class Market extends CActiveRecord
{
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
			'ShopID' => 'Shop',
			'CityID' => 'City',
			'CounterManager' => 'Counter Manager',
			'DirectorName' => 'Director Name',
			'ShopAddress' => 'Shop Address',
			'ShopCode' => 'Shop Code',
			'ShopEmail' => 'Shop Email',
			'ShopLocation_X' => 'Shop Location X',
			'ShopLocation_Y' => 'Shop Location Y',
			'ShopName' => 'Shop Name',
			'ShopPhone' => 'Shop Phone',
			'createTime' => 'Create Time',
			'updateTime' => 'Update Time',
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
