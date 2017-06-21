
var error;
var text;
var title;
var button;
window.addEventListener('load', init_article_add, false);

function init_article_add()
{
text=document.getElementById("text");
title=document.getElementById("title");
error=document.getElementById("article_add_error");
button=document.getElementById('submit');
}
function send()
{
var xhr = new XMLHttpRequest();
xhr.open('POST', 'article_add.php', true);
xhr.onreadystatechange=function()
{
	if(this.readyState==4)
	{
		if(this.status!=200)
		{
			error.innerHTML="Произошла ошибка.";

			button.value ='Подтвердить';
			button.disabled = false;

		}else{
			if(this.responseText.substr(0,2)=='ok')
				{
				//setTimeout(' window.location.href = "main.html"; ',2000);
				var str="articles.php?id="+this.responseText.substr(2);
				setTimeout(' window.location.href="'+str+'"; ',1000);
				}
			else
			{	
				error.innerHTML =this.responseText;
				button.value='Подтвердить';
				button.disabled = false;
			}
		}
	}
};
button.value = 'Подождите...'; // (2)
button.disabled = true;
var mess='title='+encodeURIComponent(title.value)+'&text='+encodeURIComponent(text.value);
xhr.timeout=30000;
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.ontimeout=function()
{
	error.innerHTML='Время ожидание ответа сервера превысило допустимое значение.';
	button.value ='Подтеврдить';
	button.disabled = false;
};
error.innerHTML="";
xhr.send(mess);
return false;
}






