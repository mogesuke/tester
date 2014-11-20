<h2>
Tests
<?php echo $this->Html->link('Add', 
		array('controller' => 'tests', 'action' => 'add'), 
		array('class' => 'btn btn-sm btn-success')); ?>
</h2>
<table class="table table-striped">
  <tbody>
  <?php foreach ($tests as $test): ?>
	<tr>
      <td>
    	<?php echo $this->Html->link($test['Test']['title'],
			array('controller' => 'tests', 'action' => 'exec', $test['Test']['id'])); ?>
      </td>
      <td>
        <?php echo $test['Test']['created']; ?>
      </td>
      <td>
    	<?php echo $this->Html->link('Edit',
			array('controller' => 'tests', 'action' => 'view', $test['Test']['id']),
			array('class' => 'btn btn-xs btn-warning')); ?>
      </td>
      <td>
      	<?php echo $this->Form->postLink('Delete', 
      			array('action' => 'delete', $test['Test']['id']),
                array('class' => 'btn btn-xs btn-danger', 'confirm' => 'Are you sure?'));
            ?>
      </td>
	</tr>
  <?php endforeach; ?>
  <?php unset($test); ?>
  </tbody>
</table>
<hr>
