<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property int $user_id
 * @property string $description
 * @property string $content
 * @property int $count_view
 * @property string|null $status
 * @property string $created_at
 *
 * @property User $user
 * @property TagAssign[] $tagAssigns
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'description', 'content', 'count_view'], 'required'],
            [['user_id', 'count_view'], 'integer'],
            [['content', 'status'], 'string'],
            [['created_at'], 'safe'],
            [['title', 'description'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'user_id' => 'User ID',
            'description' => 'Description',
            'content' => 'Content',
            'count_view' => 'Count View',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[TagAssigns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagAssigns()
    {
        return $this->hasMany(TagAssigns::className(), ['post_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
