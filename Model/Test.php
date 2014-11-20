<?php
class Test extends AppModel {
	public $name = 'Test';
	public $hasMany = array(
        'Question' => array(
            'className'  => 'Question',
            'order'      => 'Question.created asc'
        )
    );

	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
    	)
    );
}