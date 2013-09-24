<div class="welcome">
	<h1><?php p($l->t("Welcome to your personal dashboard")); ?></h1>
	<p><?php p($l->t("This screen is shown, because no widgets are activated. Go to your personal settings and activate some. You can also set some configurations in there.")); ?></p>
	<?php 
	if(OC_User::isAdminUser(OC_User::getUser())) { ?>
		<p><?php p($l->t("You are admin, so you can edit generel settings:")); ?>
			<ul>
				<li><?php p($l->t("Set if non-commercial widgets are not allowed")); ?></li>
				<li><?php p($l->t("Edit the availible widgets")); ?></li>
			</ul>
		</p>
	<?php	
	} ?>
	<p><?php p($l->t("Some more")); ?></p>
	<p>
		<ul>
			<li><a href="<?php print_unescaped(link_to('index.php', 'settings/personal')) ?>"><?php p($l->t("Go to your personal settings")); ?></a></li>
			<?php 
			if(OC_User::isAdminUser(OC_User::getUser())) { ?>
				<li><a href="<?php print_unescaped(link_to('index.php', 'settings/admin')) ?>"><?php p($l->t("Go to admin settings")); ?></a></li>
			<?php	
			} ?>
		</ul>
	</p>
</div>