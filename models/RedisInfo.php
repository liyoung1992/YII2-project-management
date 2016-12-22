<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "redisInfo".
 *
 * @property integer $id
 * @property string $serverName
 * @property string $port
 * @property string $note
 * @property integer $createTime
 * @property integer $updateTime
 * @property integer $userId
 */
class RedisInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'redisInfo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'serverName'], 'required'],
            [['id', 'createTime', 'updateTime', 'userId'], 'integer'],
            [['serverName', 'port', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serverName' => 'redis服务器',
            'port' => '服务器端口',
            'note' => '注释',
            'createTime' => '创建时间',
            'updateTime' => '更新时间',
            'userId' => '创建人',
        ];
    }
}
