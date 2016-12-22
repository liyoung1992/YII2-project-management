<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userInfo".
 *
 * @property integer $id
 * @property string $userName
 * @property string $email
 * @property string $password
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userInfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['userName', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userName' => '用户名',
            'email' => '邮箱',
            'password' => '密码',
        ];
    }
}
