function remove(a)
{
	var id=a.id;
	var throbber=document.getElementById("throbber");
var xhr = new XMLHttpRequest();
xhr.open('GET', 'article_remove.php?id='+encodeURIComponent(id), true);
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

		}else{
			if(this.responseText.substr(0,2)=='ok')
				{
				//setTimeout(' window.location.href = "main.html"; ',2000);
				throbber.querySelector(".loader").style.display="none";
				str="articles.php";
				setTimeout(' window.location.href="'+str+'"; ',1000);
				}
			else
			{	
				//error.innerHTML =this.responseText;
				//a.value='Удалить';
				
				throbber.style.display="none";
				a.disabled = false;
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
};
//error.innerHTML="";
xhr.send();
return false;
}


function article_remove(a)
{
//if (confirm("Вы уверены, что вы хотите удалить эту статью?") == true) {
        remove(a);
    //} else {
    //    return;
   // }
}


