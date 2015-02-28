<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "gender".
 *
 * @property integer $id
 * @property string $gender_name
 *
 * @property Profile $id0
 */
class Gender extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender_name'],'required'],
            [['gender_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gender_name' => 'Gender',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Profile::className(), ['gender_id' => 'id']);
    }
    
    public function getProfiles()
    {
        return $this->hasMany(\yii\debug\models\search\Profile::className(), ['gender_id'=>'id']);
    }
}
