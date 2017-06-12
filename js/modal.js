

window.addEventListener('load', init_modal, false);
window.addEventListener('click', window_click, false);
var action = null;
var modal = null;
var argument = null;
var overlay_error=null;
var modal_error=null;
function init_modal()
{
modal=document.getElementById("myModalConfirm");
modal_error=document.getElementById("modal_error");
overlay_error=document.getElementById("modal_overlay_error");


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


function window_click(event)
{ 
    if (event.target == overlay_error) {
        overlay_error.style.display = "none";
        /*log.value="";
        pass.value="";*/
        modal_error.innerHTML="";
    }
} 

function close_modal_error()
{
 overlay_error.style.display = "none";
 modal_error.innerHTML="";

}
function show_error(string)
{
	modal_error.innerHTML=string;
	overlay_error.style.display="block";



}