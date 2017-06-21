



function company_remove(a)
{
	var id=a.id;
	var throbber=document.getElementById("throbber");
var xhr = new XMLHttpRequest();
xhr.open('GET', 'company_remove.php?id='+encodeURIComponent(id), true);
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
			show_error("Произошла ошибка при соединении с сервером.");

		}else{
			if(this.responseText.substr(0,2)=='ok')
				{
				//setTimeout(' window.location.href = "main.html"; ',2000);
				throbber.querySelector(".loader").style.display="none";
				var str="companies.php";
				setTimeout(' window.location.href="'+str+'"; ',1000);
				}
			else
			{	
				//error.innerHTML =this.responseText;
				//a.value='Удалить';
				
				throbber.style.display="none";
				a.disabled = false;
				show_error("Произошла ошибка."+this.responseText);
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
			show_error("Время ожидание ответа сервера превысило допустимое значение.");
};
//error.innerHTML="";
xhr.send();
return false;
}