<?php 
	$colors = Array(9 => "rgb(50,180,50)", 5 => "blue", 1 => "red");
?>
		
<div class='ocDashboard tasks items'>
			
<?php 
	foreach ($additionalparams['tasks'] as $task) {
		if(isset($task['priority']) && $task['priority'] != "") {
			$style = ' style="color: '.$colors[$task['priority']].'" ';
		} else {
			$style = "";
		}
		?>
		
		<div class='ocDashboard tasks item' <?php print_unescaped($style); ?>>
        	<span id="task-<?php p($task['tid']); ?>">&#10003;&nbsp;</span>
        	<?php p($task['summary']); ?>
        </div>
    <?php 
	}	
	?>
</div>