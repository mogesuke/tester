<?php
class Selection extends AppModel {
	public $name = 'Selection';
    public $belongsTo = array(
        'Question' => array(
            'className'    => 'Question',
            'foreignKey'   => 'question_id'
        )
    );

    public $validate = array(
        'selection' => array(
            'rule' => 'notEmpty'
        )
    );
}