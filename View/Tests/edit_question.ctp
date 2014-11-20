<h2>Edit Question</h2>
<?php
	echo $this->Form->create('Question');
	echo '<p>';
	echo $this->Form->input('question', array('rows' => '3', 'class' => 'form-control'));
	echo $this->Form->input('comment', array('rows' => '3', 'class' => 'form-control'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo '</p>';
?>
<p>
<input type="button" id="addSelection" class="btn btn-sm btn-success" value="AddSelection">
</p>

<div id="selections">
<?php
	foreach ($this->data['Selection'] as $key => $selection):
?>
<div class="selection">
	<p>
	<?php
			echo $this->Form->input('Selection.' .$key .'.selection', 
					array('rows' => '1', 'class' => 'form-control selection'));
			echo $this->Form->checkbox('Selection.' .$key .'.correct_flg',
					array('class' => 'correct')) .'Correct';
			echo $this->Form->input('Selection.' .$key .'.id', 
					array('type' => 'hidden'));
	?>
	</p>
</div>
<?php 
    endforeach;
    unset($test);
?>
</div>

<p>
<input type="button" class="btn btn-sm btn-success" id="demo" value="Demo">
</p>

<?php
  	echo $this->Form->submit('Save', array('class' => 'btn btn-sm btn-primary form-group'));
	echo $this->Form->end();
?>

<hr>
<script src="/js/stringUtil.js"></script>
<script src="/js/demoQuestion.js"></script>
<script src="/js/createQuestion.js"></script>
<script src="/js/questions.js"></script>
<script>
$(function() {
	addAllRemoveSelectionButton();

	$("#addSelection").on("click", function() {
		addSelectionField();
	});

	$(document).on("click", ".removeSelection", function() {
		return removeSelectionField($(this));
	});

	$("#demo").on("click", function() {
		$('html,body').animate({ scrollTop: 0 }, 'fast');
  		$testJson = $.parseJSON(createDemoJson());
		demoPreparation();
		question();
	});

	$('#aBtn').click(function() {
		answer();
	});

	$('#nqBtn').click(function() {
		question();
	});
	
	$("#cover").on("click", function() {
		$("#demoArea").addClass("hide");
	});
});
</script>

<div class="hide" id="demoArea">
	<div id="cover"></div>
	<div id="demoTestArea">
		<?php echo $this->element('test/test_area'); ?>
	</div>
</div>

<div class="hide">
	<div id="template">
		<p>
		<?php
			echo $this->Form->input('Selection.key.selection', array('rows' => '1', 'class' => 'form-control selection'));
			echo $this->Form->checkbox('Selection.key.correct_flg', array('class' => 'correct')) ."correct";
		?>
		</p>
	</div>
</div>
