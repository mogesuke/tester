<h2>
	<?php echo h($test['Test']['title']); ?>
	<?php echo $this->Html->link('Edit',
			array('action' => 'edit', $test['Test']['id']),
			array('class' => 'btn btn-xs btn-warning')); ?>
  	<?php echo $this->Form->postLink('Delete', 
  			array('action' => 'delete', $test['Test']['id']),
            array('class' => 'btn btn-xs btn-danger', 'confirm' => 'Are you sure?'));
        ?>
</h2>

<p><small>Created: <?php echo $test['Test']['created']; ?></small></p>
<p>
<?php echo $this->Html->link('Add', array('action' => 'addQuestion'), 
		array('class' => 'btn btn-sm btn-success')); ?>
</p>

<table class="table table-striped">
  <?php foreach ($test['Question'] as $index => $question): ?>
	<tr>
      <td>
        <?php echo $index + 1 ?>
      </td>
      <td>
      	<?php echo $this->Html->link(String::truncate($question['question'], 30), 
      			array('action' => 'editQuestion', $question['id'])); ?>
      </td>
      <td>
      	<?php echo $this->Form->postLink('Delete', 
      			array('action' => 'deleteQuestion', $question['id']),
                array('class' => 'btn btn-xs btn-danger', 'confirm' => 'Are you sure?'));
            ?>
      </td>
	</tr>
  <?php endforeach; ?>
  <?php unset($test); ?>
</table>
<hr>

