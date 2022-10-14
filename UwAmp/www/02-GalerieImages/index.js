const btnDisplayImages = document.getElementById("displayImg");
let maxImages = 6;
displayImages();

btnDisplayImages.addEventListener("click", function btnDisplayNewImages_OnClick() 
{
    maxImages += 6;
    displayImages();
});

function displayImages() 
{
    let xhr = new XMLHttpRequest();
    xhr.open("PUT", 'datas.php');
    xhr.setRequestHeader("Content-Type", "image/jpeg");
    xhr.onload = function() 
    {
        if(xhr.status === 200)
        {
            let container = document.getElementById("data");
            container.innerHTML = "";
            let images = JSON.parse(xhr.responseText);
            let size = Object.keys(images).length;
            for (let i = 0; i < maxImages; i++) 
            {
                if(i < size)
                {
                    let image = '<img src="' + images[i] + '">';
                    container.innerHTML += image;
                }
                else
                {
                    btnDisplayImages.style.display = false;
                    break;
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

