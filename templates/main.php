<div id="ocDashboard">

<?php 

	// show start screen
	if(isset($_['welcome']) && $_['welcome'] == 1) {
		print_unescaped($this->inc('inc.welcome'));
	} else {
		// go threw all activated widgets
		foreach ( $_['widgets'] as $widget) { ?>
			<div class="widget" id="<?php print_unescaped($widget->getId); ?>" style="display: none; background-image: <?php print_unescaped($widget->getIconPath); ?>"  data-interval="<?php print_unescaped($widget->interval); ?>" data-status="<?php print_unescaped($widget->status); ?>">
			<div class="reloadSymbol <?php print_unescaped($widget->getId); ?>">&nbsp;</div>
			
			<?php if($widget->getLink != "") { ?>
				<div class="ocDashboard head"><a href="<?php print_unescaped($base.$widget['link']); ?>"><?php print_unescaped($l->t($widget['name'])); ?></a><?php print_unescaped( ($widget->getInterval > 0) ? "<span>&nbsp;&#8635;</span>" : ""); ?></div>
			<?php } else { ?>
				<div class="ocDashboard head"><?php print_unescaped($l->t($widget['name'])); ?><?php print_unescaped( ($widget->getInterval > 0) ? "<span>&nbsp;&#8635;</span>" : ""); ?></div>
			<?php } ?>
						
			
			
			
			
			
			
			
			// if error exists, just show error message for this widget
			if(isset($widget['error']) && $widget['error'] != "") {
				print_unescaped($this->inc('inc.widgetError'));
			} 
			
			// show widget
			else { ?>
				
				
				
				<?php			
				print_unescaped($this->inc('/widgets/'.$widget['id'].'.inc', $widget));
				?>
				
				</div>
				
			<?php
			}
		}
	}
?>

</div>
