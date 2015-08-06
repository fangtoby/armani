<?php

/**
 * This is the model class for table "reward".
 *
 * The followings are the available columns in table 'reward':
 * @property integer $id
 * @property integer $pid
 * @property double $apercent
 * @property integer $aset
 * @property integer $acount
 * @property double $bpercent
 * @property integer $bset
 * @property integer $bcount
 * @property double $cpercent
 * @property integer $cset
 * @property integer $ccount
 * @property double $dpercent
 * @property integer $dset
 * @property integer $dcount
 * @property string $startTime
 * @property string $endTime
 * @property string $createTime
 * @property string $updateTime
 * @property integer $isDelete
 */
class Reward extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, aset, acount, bset, bcount, cset, ccount, dset, dcount, isDelete', 'numerical', 'integerOnly'=>true),
			array('apercent, bpercent, cpercent, dpercent', 'numerical'),
			array('startTime, endTime, createTime, updateTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pid, apercent, aset, acount, bpercent, bset, bcount, cpercent, cset, ccount, dpercent, dset, dcount, startTime, endTime, createTime, updateTime, isDelete', 'safe', 'on'=>'search'),
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
			'pid' => 'Pid',
			'apercent' => 'Apercent',
			'aset' => 'Aset',
			'acount' => 'Acount',
			'bpercent' => 'Bpercent',
			'bset' => 'Bset',
			'bcount' => 'Bcount',
			'cpercent' => 'Cpercent',
			'cset' => 'Cset',
			'ccount' => 'Ccount',
			'dpercent' => 'Dpercent',
			'dset' => 'Dset',
			'dcount' => 'Dcount',
			'startTime' => 'Start Time',
			'endTime' => 'End Time',
			'createTime' => 'Create Time',
			'updateTime' => 'Update Time',
			'isDelete' => 'Is Delete',
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('apercent',$this->apercent);
		$criteria->compare('aset',$this->aset);
		$criteria->compare('acount',$this->acount);
		$criteria->compare('bpercent',$this->bpercent);
		$criteria->compare('bset',$this->bset);
		$criteria->compare('bcount',$this->bcount);
		$criteria->compare('cpercent',$this->cpercent);
		$criteria->compare('cset',$this->cset);
		$criteria->compare('ccount',$this->ccount);
		$criteria->compare('dpercent',$this->dpercent);
		$criteria->compare('dset',$this->dset);
		$criteria->compare('dcount',$this->dcount);
		$criteria->compare('startTime',$this->startTime,true);
		$criteria->compare('endTime',$this->endTime,true);
		$criteria->compare('createTime',$this->createTime,true);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('isDelete',$this->isDelete);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reward the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
