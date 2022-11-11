const CONTAINER = document.getElementById("Container");

let maxArticles = 2;
let articlesObjects = Array();

DisplayArticle();

window.onscroll = function()
{
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) 
    {
        maxArticles += 2;
        DisplayArticle();
    }
}


function DisplayArticle()
{
    let xhr = new XMLHttpRequest();
    xhr.open("PUT", "../datas.php");
    xhr.setRequestHeader("Content-Type", "image/jpeg");
    xhr.onload = function()
    {
        if(xhr.status === 200)
        {
            let articlesInfos = JSON.parse(xhr.responseText);
            let size = Object.keys(articlesInfos).length;

            SetArray(articlesInfos);
        }
    };
    xhr.onerror = function()
    {
        console.log("An error as occured during the transaction")
    };
    xhr.send();
}

function SetArray(articlesInfos) 
{
    articles = new Array();
    articlesInfos.forEach(article => 
    {
        
    });
}