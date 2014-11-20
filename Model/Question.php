<?php
class Question extends AppModel {
	public $name = 'Question';
    public $belongsTo = array(
        'Test' => array(
            'className'    => 'Test',
            'foreignKey'   => 'test_id'
        )
    );
    public $hasMany = array(
        'Selection' => array(
            'className'  => 'Selection',
            'order'      => 'Selection.id ASC'
        )
    );

    public $validate = array(
        'question' => array(
            'rule' => 'notEmpty'
        )
    );
}