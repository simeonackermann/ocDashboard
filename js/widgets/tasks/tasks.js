$(document).ready(function() {
	bindMarkAsRead(); 
	}
);

function bindMarkAsRead() {
	$('.ocDashboard.tasks.item span').each(function(i, current){
			tmp = current.id.split("-");
			id = tmp[1];
			$("#task-" + id).bind('click',function(){
					tmp = this.id.split("-");
					id = tmp[1];
					markAsRead(id);
				}
			);
		}
	);	
}

function markAsRead(id) {
	showWaitSymbol('tasks');
	$("#task-" + id).fadeOut();
	ajaxService('tasks',
				'markAsDone',
				id,
				function(res) {
					loadWidget('tasks',function () {bindMarkAsRead();}
					);
				}
	);
}