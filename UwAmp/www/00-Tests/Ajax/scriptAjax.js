function loadData() 
{
    var xhr = new XMLHttpRequest();
    xhr.open('PUT', 'data.php');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() 
    {
        if (xhr.status === 200) 
        {
            var userInfo = JSON.parse(xhr.responseText);
            size = Object.keys(userInfo).length;
        }
    };
    xhr.onerror = function() {
        console.log("An error occurred during the transaction");
    };
    xhr.send();
}