const CONTAINER = document.getElementById("Container");

let maxArticles = 2;
let index = 0;
let articleArraySize;
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
    xhr.open("PUT", "datas/datas.php");
    xhr.setRequestHeader("Content-Type", "image/jpeg");
    xhr.onload = function()
    {
        if(xhr.status === 200)
        {
            let articlesInfos = JSON.parse(xhr.responseText);
            articleArraySize = Object.keys(articlesInfos).length;

            SetArray(articlesInfos);

            for (index; index < maxArticles; index++) 
            {
                if (index < articleArraySize) 
                {
                    // Article
                    let articleHtml = 
                    "<article class='article center'>" +
                        // Section title
                        "<section>" +
                            "<h3>" +
                                articlesObjects[index].title +
                            "</h3>" +
                        "</section>" +
                        // Section image
                        "<section>" +
                            "<a class='example-image-link' href='Images/lightboxs/"+ articlesObjects[index].image +"' data-lightbox='example-set' data-title='"+ articlesObjects[index].title +"'>" +
                                "<img class='example-image' src='Images/articles/"+ articlesObjects[index].image +"'/>" +
                            "</a>" +
                        "</section>" +
                        // Section text
                        "<section>" +
                            "<aside>" +
                                articlesObjects[index].text +
                            "</aside>" +
                        "</section>" +
                        // Section source
                        "<section class='source'>" +
                            "<a href='"+ articlesObjects[index].source +"'>" +
                                "Source" +
                            "</a>" +
                        "</section>" +
                    "</article>";

                    CONTAINER.innerHTML += articleHtml;
                }
            }
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
    articlesInfos.forEach(article => 
    {
        let articleObject = new Article(article['artTitle'], article['artText'], article['artImage'], article['artSource']);
        articlesObjects.push(articleObject);
    });
}