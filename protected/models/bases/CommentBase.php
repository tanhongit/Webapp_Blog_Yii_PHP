<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property string $create_time
 * @property integer $author
 * @property string $email
 * @property string $url
 * @property integer $post_id
 *
 * The followings are the available model relations:
 * @property Post $post
 */
class CommentBase extends CActiveRecord
{
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, status, author, email, post_id', 'required'),
			array('status, author, post_id', 'numerical', 'integerOnly' => true),
			array('email, url', 'length', 'max' => 255),
			array('create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content, status, create_time, author, email, url, post_id', 'safe', 'on' => 'search'),
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
			'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Content',
			'status' => 'Status',
			'create_time' => 'Create Time',
			'author' => 'Author',
			'email' => 'Email',
			'url' => 'Url',
			'post_id' => 'Post',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('content', $this->content, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('create_time', $this->create_time, true);
		$criteria->compare('author', $this->author);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('url', $this->url, true);
		$criteria->compare('post_id', $this->post_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
