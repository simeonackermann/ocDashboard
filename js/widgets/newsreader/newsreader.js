$(document).ready(function() {
	bindMarkNewsAsRead(); 
	}
);

function bindMarkNewsAsRead() {
	$("#markNewsAsRead").bind('click',function(){
			markNewsAsRead();
		}
	);
}

function markNewsAsRead() {
	showWaitSymbol('newsreader'); 
	ajaxService('newsreader','markAsRead','',function() {
		loadWidget('newsreader',function () { bindMarkNewsAsRead(); });
		}
	);
}