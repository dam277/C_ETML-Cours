let answer = document.getElementsByName("answer");
let text = document.getElementById("text");

function OnAnswer()
{
    answer.forEach(element => {
        if (element.checked == true) 
        {
            switch (element.id) {
                case "yes":
                    text.innerHTML = "YES";
                    break;
                case "no":
                    text.innerHTML = "NO";
                    break;
                default:
                    break;
            }    
        }
    });
}