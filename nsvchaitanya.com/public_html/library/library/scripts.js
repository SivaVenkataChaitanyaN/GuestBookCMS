var mainElement = document.getElementsByTagName("body")[0];

//var loginElement = document.getElementById("div_login");

var signformElement = document.getElementById("div_signup");

var menuElement = document.getElementById("menu");

//loginElement.addEventListener("click", loginToggle);

window.onload = 
	function ()
	{
		if(mainElement.offsetWidth > 640)
		{
			menuElement.className = "menu";
			//loginElement.style.left = "75%";
		}
		if(mainElement.offsetWidth < 640)
		{
			menuElement.className = "menu";
			//loginElement.style.left = "80%";
		}
	};

window.onresize = 
	function ()
	{
		if(mainElement.offsetWidth > 640)
		{
			menuElement.className = "menu";
			//loginElement.style.left = "75%";
		}
		if(mainElement.offsetWidth < 640)
		{
			menuElement.className = "menu";
			//loginElement.style.left = "80%";
		}
	};

function loginToggle()
{
	if(signformElement.className == "div_signup" || signformElement.className == "div_signup_off")
	{
		signformElement.className = "div_signup_on";
	}
	else
	{
		signformElement.className = "div_signup_off";
	}
}
/*
var eventElement = $("div[id*='eventToDisplay']");
var displayElement = $("div[id*='displayProfile']");
eventElement[0].addEventListener("click", profilePic(0));
function profilePic(i)
{
	console.log(i);
	if(displayElement[i].className == "displayProfile")
	{
		displayElement[i].className = "profile_on";
	}
	else
	{
		displayElement[i].className = "displayProfile";
	}
}
function addBlurEvent(curElement, curBlockNum)
{
	curElement
		.addEventListener("blur", function(){
			this.setAttribute("readonly", "true");
			this.style.border = "0px";
			this.style.background = "inherit";
			curBlockNum++
			sendData(curBlockNum);
	});
}

function eventCreation()
{
	var blocks = document.getElementsByClassName("div_border_on");
	
	for(var curBlockNum = 0;curBlockNum < blocks.length; curBlockNum++)
	{
		var curForm = blocks[curBlockNum].children[1].children[0];
		
		for(var curFormNum = 0;curFormNum < curForm.length; curFormNum++) 
		{
			var curElement = curForm.elements[curFormNum];
			
			curElement
				.addEventListener("focus", function(){
					this.removeAttribute("readonly");
					this.style.border = "2px";
					this.style.backgroundColor = "white";
			});
			
			addBlurEvent(curElement, curBlockNum);
		}
		
	}
}*/


function toEditElement()
{
	this.removeAttribute("readonly");
	this.style.border = "2px";
	this.style.backgroundColor = "white";
}

function toSubmit()
{
	this.setAttribute("readonly", "true");
	this.style.border = "0px";
	this.style.background = "inherit";
	sendData(this);
}

function eventCreation()
{
	var blocks = document.getElementsByClassName("div_border_on");
	
	for(var curBlockNum = 0; curBlockNum < blocks.length; curBlockNum++)
	{
		
		var curForm = blocks[curBlockNum].children[1].children[0];
		
		for(curElement of curForm) 
		{
			curElement
				.addEventListener("focus", toEditElement);
				
			curElement
				.addEventListener("blur", toSubmit);
		}
	}
}
function updateEventCreation()
{
	var buttons = document.getElementsByClassName("updateButton");
	
	for(var curButtonNum = 0; curButtonNum < buttons.length; curButtonNum++)
	{
		
		buttons[curButtonNum]
			.addEventListener("click", updateData);
	}
	
	
}