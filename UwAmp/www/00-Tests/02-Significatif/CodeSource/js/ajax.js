/**
 * Damien Loup
 * 152-Multimedia
 * Test significatif
 * Date: 25.11.2022
 * Ajax file which load and display datas from the database
 */

let index = 0;                                                      // Set the index to 0
let maxImages = 3;                                                  // Set the max of image can place
let reciepes;                                                       // Array of reciepes
let size;                                                           // Size of the array

const imagesPerSlide = 3;                                           // Set the number of image per slide
const BTNLEFT = document.getElementById("btnLeft");                 // Button left of the slider
const BTNRIGHT = document.getElementById("btnRight");               // Button right of the slider
const CONTAINER = document.getElementById("reciepes");              // Get the container

// Set the events of "onclick" on the buttons
BTNLEFT.addEventListener("click", BtnLeft_OnClick);
BTNRIGHT.addEventListener("click", BtnRight_OnClick);

loadData();

/**
 * Function loadData
 * Load the datas got from the database
 */
function loadData() 
{
    let xhr = new XMLHttpRequest();
    xhr.open('PUT', 'datas/datas.php');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() 
    {
        if (xhr.status === 200) 
        {   
            // Get the reciepes
            reciepes = JSON.parse(xhr.responseText);
            
            // Get the size of the array of reciepes
            size = Object.keys(reciepes).length;

            // Display vignettes
            Display();
        }
    };
    xhr.onerror = function() {
        console.log("An error occurred during the transaction");
    };
    xhr.send();
} 

/**
 * Function loadPage
 * Change the page of the slider
 * 
 * @param operator => Operator used to display the vignettes
 */
 function loadPage(operator)
{
    // Check which operator is used
    switch (operator) 
    {
        // Minus case
        case "-":
            // Check if the slider can slide to the precedent page or not
            if (maxImages <= 3) 
            {
                maxImages = size;
                index = size - imagesPerSlide;
            }
            else
            {
                maxImages -= imagesPerSlide;
                index -= imagesPerSlide * 2;
            }
            break;
        // Plus case
        case "+":
            // Check if the slider can slide to the next page or not
            if (maxImages === size) 
            {
                maxImages = 3;
                index = 0;
            }
            else
            {
                maxImages += imagesPerSlide;
            }
        break;
            
        // Default case
        default:
            break;
    }

    Display();
}

/**
 * Function Display
 * Display the vignettes
 */
function Display() 
{
    CONTAINER.innerHTML = "";
    // Display all the vignettes
    for (index; index < maxImages; index++) 
    {
        // Create a vignette
        let vignette = 
            '<div class="vignette">' +
                '<h3>'+ reciepes[index]["bisName"] +'</h3>' +
                '<img src="../Images/Content-resized/'+ reciepes[index]["bisPathImage"] +'" alt="">' +
                '<h4>'+ reciepes[index]["bisText"] +'</h4>' +
                '<p>' +
                    '<a class="source" href="'+ reciepes[index]["bisLink"] +'">' + 
                        reciepes[index]["bisSource"] + 
                    '</a>' +
                '</p>' +
                '<div class="ingredients">';

                // Check if the reciepes contains some ingredients and display it on the vignette or not
                if (reciepes[index]["bisMilk"] == 1) 
                {
                    vignette += '<img src="../Images/Icon/milk.png" alt="">';
                }
                if (reciepes[index]["bisEgg"] == 1) 
                {
                    vignette += '<img src="../Images/Icon/eggs.png" alt="">';
                }
                if (reciepes[index]["bisFlour"] == 1) 
                {
                    vignette += '<img src="../Images/Icon/flour.png" alt="">';
                }
                if (reciepes[index]["bisSugar"] == 1) 
                {
                    vignette += '<img src="../Images/Icon/sugar.png" alt="">';
                }
                if (reciepes[index]["bisButter"] == 1) 
                {
                    vignette += '<img src="../Images/Icon/butter.png" alt="">';
                }

        // End vignette
        vignette += '</div>' +
            '</div>';
        

        // Add to container
        CONTAINER.innerHTML += vignette;
    }
}

/**
 * Function BtnLeft_OnClick
 * Activate when the left button was clicked
 */
 function BtnLeft_OnClick()
 {
     loadPage("-")
 }
 
 /**
  * Function BtnRight_OnClick
  * Activate when the right button was clicked
  */
 function BtnRight_OnClick() 
 {
     loadPage("+");
 }
 