
var comment_text;
var add_comment_button;

function comment_delete(a)
{
	var id=a.id;
	var throbber=document.getElementById("throbber");
var xhr = new XMLHttpRequest();
xhr.open('GET', 'comment_delete.php?id='+encodeURIComponent(id), true);
xhr.onreadystatechange=function()
{
	if(this.readyState==4)
	{
		if(this.status!=200)
		{
			//error.innerHTML="Произошла ошибка.";
			//a.value ='Удалить';
			throbber.style.display="none";
			a.disabled = false;
			show_error("Произошла ошибка.");

		}else{
			if(this.responseText.substr(0,2)=='ok')
				{
				//setTimeout(' window.location.href = "main.html"; ',2000);
				throbber.querySelector(".loader").style.display="none";
				//str="articles.php";
				//setTimeout(' window.location.href="'+str+'"; ',1000);
				setTimeout('location.reload(true); ',1000);
				}
			else
			{	
				//error.innerHTML =this.responseText;
				//a.value='Удалить';
				
				throbber.style.display="none";
				a.disabled = false;
				show_error(this.responseText);
			}
		}
	}
};
//a.value = 'Подождите...'; // (2)
a.disabled = true;
throbber.style.display="block";
xhr.timeout=30000;
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.ontimeout=function()
{
	//error.innerHTML='Время ожидание ответа сервера превысило допустимое значение.';
	//a.value ='Удалить';
	throbber.style.display="none";
	a.disabled = false;
	show_error('Время ожидание ответа сервера превысило допустимое значение.');
};
//error.innerHTML="";
xhr.send();
return false;









	
}


window.addEventListener('load', init_comment_add, false);

function init_comment_add()
{
	comment=document.getElementById('comment_add_text');
	add_comment_button=document.getElementById('add_commentary');
}

function add_comment(article_id)
{
var xhr = new XMLHttpRequest();
xhr.open('POST', 'comment_add.php', true);
xhr.onreadystatechange=function()
{
	if(this.readyState==4)
	{
		if(this.status!=200)
		{

			add_comment_button.value ='Добавить комментарий';
			add_comment_button.disabled = false;
			show_error("Произошла ошибка.");

		}else{
			if(this.responseText.substr(0,2)=='ok')
				{
				//setTimeout(' window.location.href = "main.html"; ',2000);
				//str="articles.php?id="+this.responseText.substr(2);
				setTimeout(' location.reload(true);',1000);
				}
			else
			{	
				add_comment_button.value='Добавить комментарий';
				add_comment_button.disabled = false;
				show_error(this.responseText);
			}
		}
	}
};
add_comment_button.value = 'Подождите...'; // (2)
add_comment_button.disabled = true;
var mess='ID_article='+encodeURIComponent(article_id)+'&comment='+encodeURIComponent(comment.value);
xhr.timeout=30000;
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.ontimeout=function()
{
	add_comment_button.value ='Добавить комментарий';
	add_comment_button.disabled = false;
	show_error('Время ожидание ответа сервера превысило допустимое значение.');
};
xhr.send(mess);
return false;
}