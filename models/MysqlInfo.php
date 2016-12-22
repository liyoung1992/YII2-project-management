<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mysqlInfo".
 *
 * @property integer $id
 * @property string $dbName
 * @property string $userName
 * @property string $passWord
 * @property string $serverName
 * @property string $note
 * @property integer $createTime
 * @property integer $updateTime
 * @property integer $userId
 * @property integer $state
 */
class MysqlInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mysqlInfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createTime', 'updateTime', 'userId', 'state'], 'integer'],
            [['dbName', 'userName', 'passWord', 'serverName', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dbName' => 'Db Name',
            'userName' => '数据库用户名',
            'passWord' => '数据库用户密码',
            'serverName' => '服务器ip',
            'note' => '备注',
            'createTime' => '创建时间',
            'updateTime' => '更新时间',
            'userId' => '创建人',
            'state' => '1：可用，0不可用',
        ];
    }

    /**
     * @inheritdoc
     * @return MysqlInfoQuery the active query used by this AR class.
     */
}
