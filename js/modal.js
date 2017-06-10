

window.addEventListener('load', init_modal, false);

var action = null;
var modal = null;
var argument = null;
function init_modal()
{
modal=document.getElementById("myModalConfirm");
}
function invoke_modal(act,arg)
{
argument=arg;
action=act;
modal.style.display="block";
}
function accept_modal()
{
	modal.style.display="none";
	action(argument);
	argument=null;
	action=null;
}

function reject_modal()
{
	modal.style.display="none";
	argument=null;
	action=null;
}