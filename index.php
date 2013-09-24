<?php

\OCP\User::checkLoggedIn();
\OCP\App::checkAppEnabled('ocDashboard');
\OCP\App::setActiveNavigationEntry( 'ocDashboard' );

OCP\Util::addscript('ocDashboard', 'ocDashboard');
//OCP\Util::addscript('ocDashboard', 'ajaxService');
OCP\Util::addStyle('ocDashboard', 'ocDashboard');

$user = OCP\User::getUser();
$l=new OC_L10N('ocDashboard');

//OC::$CLASSPATH['widgets'] = 'ocDashboard/appinfo/widgetConfigs.php';
//OC::$CLASSPATH['factory'] = 'ocDashboard/lib/factory.php';
//OC::$CLASSPATH['api'] = 'ocDashboard/lib/api.php';

$widgets = Array();
/*foreach (widgets::$widgets as $widget) {
	// if widget is enabled
	if (OCP\Config::getUserValue($user, "ocDashboard", "ocDashboard_".$widget['id']) == "yes") {
		$w[] = factory::getWidget($widget)->getData();
	}
}*/

//if all deactivated
if(empty($widgets)) {
	OCP\Util::addStyle('ocDashboard', 'ocDashboardWelcome');
	$widgets[0]['id'] = "welcome";
}

$tpl = new OCP\Template("ocDashboard", "main", "user");
$tpl->assign('widgets', $widgets);
$tpl->printPage();