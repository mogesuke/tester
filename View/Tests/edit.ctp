<h2>Edit Test</h2>
<?php
	echo $this->Form->create('Test');
	echo $this->Form->input('title', array('class' => 'form-control'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo '<p></p>';
  	echo $this->Form->submit('Save', array('class' => 'btn btn-sm btn-primary form-group'));
	echo $this->Form->end();
?>
<hr>
