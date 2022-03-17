//Variables
let idGender = document.getElementById("gender");				//Get the ID of the html DIV
let gender = idGender.innerText;								//Get the text in the html DIV

//Call the function to check the good radio button
checkRdoBtn(gender);								

///<Sum>
/// Rempli automatiquement les radio boutons sur la page HTML
///</Sum>
function checkRdoBtn(gender)
{
	let rdobtnGender;			//rdobtnGender variable

	//Set the rdobtnGender variable to the which have to be checked
	if(gender.toLowerCase() == "m")
	{
		rdobtnGender = document.getElementById("man");
	}
	else if(gender.toLowerCase() == "w")
	{
		rdobtnGender = document.getElementById("woman");
	}
	else
	{
		rdobtnGender = document.getElementById("other");
	}

	//Check the radio button
	rdobtnGender.checked = true;
}
