<?php

class factory {
	
	/*
	 * loads all *.php files in the folder of the widget
	 * return a instance of a widget
	 * 
	 * @param $widgetId : unique name of the widget
	 * @return instance of the widget
	 */
	static function getWidgetObject($widgetId) {
		$nonClassesPhpFiles = Array("template", "l10n"); // this files should be not included as classes
		OC::$CLASSPATH['widget'] = 'ocDashboard/lib/widget.php'; //load superclass
		OC::$CLASSPATH['widgetInterface'] = 'ocDashboard/lib/widgetInterface.php'; //load interface for widget
		$widgetPath = OC::$SERVERROOT."/apps/ocDashboard/widgets/".$widgetId;
		foreach (scandir($widgetPath) as $file) {
			$fileInfo = pathinfo($widgetPath."/".$file);
			// only load php files which contains a class
			if($fileInfo['extension'] == "php" && !in_array($fileInfo['filename'], $nonClassesPhpFiles) ) {
				OC::$CLASSPATH[$fileInfo['filename']] = 'ocDashboard/widgets/'.$widgetId.'/'.$fileInfo['basename'];
			}
		}
		return new $widgetId();
	}
	
	/*
	 * check which widgets are availible and 
	 * contains the class and template file 
	 * 
	 * @return Array with all widget IDs
	 */
	static function getWidgetsIds() {
		$widgets = scandir(OC::$SERVERROOT."/apps/ocDashboard/widgets");
		$return = Array();
		
		foreach ($widgets as $widget) {
			if(file_exists(OC::$SERVERROOT."/apps/ocDashboard/widgets/".$widget."/".$widget.".php") && 
				file_exists(OC::$SERVERROOT."/apps/ocDashboard/widgets/".$widget."/template.php")) {
				$return[] = $widget;
			}
		}
		
		return $return;
	}
	
	/*
	 * @param $user
	 * @return enabled widgets (Array of ids) for the $user
	 */
	static function getEnabledWidgetIds($user) {
		$enabledWidgets = Array();
		
		foreach (factory::getWidgetsIds() as $widgetId) {
			if (OCP\Config::getUserValue($user, "ocDashboard", "ocDashboard_".$widgetId, "no") == "yes") {
				$enabledWidgets[] = $widgetId;
			}
		}
		
		return $enabledWidgets;
	}

}