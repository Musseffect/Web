//passwords : pass pass2 pass2
var modal_login;
var auth;
var span;
var log;
var pass;
var err;
if( document.readyState != 'loading' ) {
	init_loginform();
} else {
document.addEventListener("DOMContentLoaded",init_loginform , false);
}
function init_loginform()
{
modal_login = document.getElementById('myModal');

// Get the button that opens the modal
auth = document.getElementById('auth');

// Get the <span> element that closes the modal
span = document.getElementsByClassName("close")[0];

log=document.getElementById('login');
pass=document.getElementById('password');
err=document.getElementById('error');
auth.onclick = function() {
    modal_login.style.display = "block";
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal_login.style.display = "none";
        err.innerHTML="";
        log.value="";
        pass.value="";
}

}
// When the user clicks on the button, open the modal
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal_login.style.display = "none";
        err.innerHTML="";
        log.value="";
        pass.value="";
    }
} 

function subm()
{
var xhr = new XMLHttpRequest();
xhr.open('POST', 'authorize.php', true);
button=document.getElementById('btn-submit');
xhr.onreadystatechange=function()
{
	if(this.readyState==4)
	{
		if(this.status!=200)
		{
			err.innerHTML="Произошла ошибка.";

			button.innerHTML='Авторизоваться';
			button.disabled = false;

		}else{
			if(this.responseText=='ok')
				{
				//setTimeout(' window.location.href = "main.html"; ',2000);
				setTimeout(' location.reload(true); ',1000);
				}
			else
			{	
				err.innerHTML=this.responseText;
				button.innerHTML='Авторизоваться';
				button.disabled = false;
			}
		}

	}

};
button.innerHTML = 'Подождите...'; // (2)
button.disabled = true;
var name=log.value;
var passw=pass.value;
var mess='username='+encodeURIComponent(name)+'&password='+encodeURIComponent(passw)+'&submit=true';
xhr.timeout=30000;
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.ontimeout=function()
{
	document.getElementById('error').innerHTML='Время ожидание превысило допустимое значение.';
	button.innerHTML='Авторизоваться';
	button.disabled = false;
};
err.innerHTML="";
xhr.send(mess);
return false;
}