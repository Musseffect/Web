function remove(a)
{
	var id=a.id;
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
			a.disabled = false;

		}else{
			if(this.responseText.substr(0,2)=='ok')
				{
				//setTimeout(' window.location.href = "main.html"; ',2000);
				str="articles.php";
				setTimeout(' window.location.href="'+str+'"; ',1000);
				}
			else
			{	
				//error.innerHTML =this.responseText;
				//a.value='Удалить';
				a.disabled = false;
			}
		}
	}
};
//a.value = 'Подождите...'; // (2)
a.disabled = true;
xhr.timeout=30000;
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.ontimeout=function()
{
	//error.innerHTML='Время ожидание ответа сервера превысило допустимое значение.';
	//a.value ='Удалить';
	a.disabled = false;
};
//error.innerHTML="";
xhr.send();
return false;
}


function article_remove(a)
{
if (confirm("Вы уверены, что вы хотите удалить эту статью?") == true) {
        remove(a);
    } else {
        return;
    }



}