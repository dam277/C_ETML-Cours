function loadData() {
    var xhr = new XMLHttpRequest();
    xhr.open('PUT', 'data.php');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
        if (xhr.status === 200) {
            var userInfo = JSON.parse(xhr.responseText);
            size = Object.keys(userInfo).length;
            for(let i = 1; i <= size; i++){
                document.getElementById('data').innerHTML += "<tr><td>" + userInfo[i]['name'] + "</td><td>" +
                userInfo[i]['firstname'] + "</td><td>" + userInfo[i]['age'] +"</td></tr>";
            }
        }
    };
    xhr.onerror = function() {
        console.log("An error occurred during the transaction");
    };
    xhr.send();
}