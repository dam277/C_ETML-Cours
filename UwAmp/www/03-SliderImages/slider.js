const SLIDER = document.getElementById("Slider");
const btnLeft = document.getElementById("btnLeft");
const btnRight = document.getElementById("btnRight");
const sliderImage = document.getElementById("SliderImage");

let slides;
let silderPosition = 0;

let text = Array
(
    {
        "Title":"Les courges d'halloween",
        "SubTitle":"Les créations de la région"
    },
    {
        "Title":"Les courges d'halloween 2",
        "SubTitle":"Les créations de la région 2"
    },
    {
        "Title":"Les courges d'halloween 3",
        "SubTitle":"Les créations de la région 3"
    },
    {
        "Title":"Les courges d'halloween 4",
        "SubTitle":"Les créations de la région 4"
    },
    {
        "Title":"Les courges d'halloween 5",
        "SubTitle":"Les créations de la région 5"
    }
)

DisplayImage();

btnLeft.addEventListener("click", function BtnLeft_OnClick()
{
    silderPosition--;
    DisplayImage();
});

btnRight.addEventListener("click", function BtnRight_OnClick()
{
    silderPosition++;
    DisplayImage();
});

function DisplayImage() 
{
    let xhr = new XMLHttpRequest();
    xhr.open("PUT", "datas.php");
    xhr.setRequestHeader("Content-Type", "image/jpeg");
    xhr.onload = function()
    {
        if(xhr.status === 200)
        {
            let container = document.getElementById("data");
            let images = JSON.parse(xhr.responseText);
            let size = Object.keys(images).length;

            SetElements()

            
            let image = images[silderPosition];
            sliderImage.src = image;
        }
    };
    xhr.onerror = function()
    {
        console.log("An error as occured during the transaction")
    };
    xhr.send();
}

function SetElements(images) 
{
    slides  = new Array();
    images.forEach((image, index) => 
    {
        let slide = new Slide(image, text[index][0], text[index][1]);
        slides.push(slide);
    });
}