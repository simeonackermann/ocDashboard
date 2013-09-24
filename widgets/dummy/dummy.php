<?php
/*
 * shows the next meetings from the cownCloud calender app
 * copyright 2013
 * 
 * @version 0.1
 * @date 01-08-2013
 * @author Florian Steffens (flost@live.no)
 */
class dummy extends widget implements widgetInterface {	

	// ======== INTERFACE METHODS ================================

	/*
	 * @return Array of all data for output
	 * this array will be routed to the subtemplate for this widget 
	 */
	public function getWidgetData() {
		return Array("content" => "Lore ipsum...");
	}

	// ======== END INTERFACE METHODS =============================
		
}