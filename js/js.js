// JavaScript Document
$(document).ready(function(e) {
    $(".main").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".main").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});
function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	$(x).fadeIn()
	if(y)
	$(y).fadeIn()
	if(y&&url)
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}
