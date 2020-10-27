$(document).ready(function(){
	
	history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
   });
	
	$("#btn1").mouseenter(function(){
	     $("#btn1").css("background-color","grey");
	});
	
	$("#btn1").mouseleave(function(){
	     $("#btn1").css("background-color","#088A08");
	});
	
	
	$("#btn2").mouseenter(function(){
	     $("#btn2").css("background-color","grey");
	});
	
	$("#btn2").mouseleave(function(){
	     $("#btn2").css("background-color","#088A08");
	});
	
	$("#btn3").mouseenter(function(){
	     $("#btn3").css("background-color","grey");
	});
	
	$("#btn3").mouseleave(function(){
	     $("#btn3").css("background-color","#088A08");
	});
});