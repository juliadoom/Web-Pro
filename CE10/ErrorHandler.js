function Takeoff() {
    try{
        statusInd = document.getElementbyId('status');
        statusInd.innerHTML = "";
        //checking Engine coolant
        if (document.getElementbyId('ECOn').checked) {
            statusInd.innerHTML += "<li>Too much engine coolant, cannot keep engines hot</li>";
            return false;
        }
        //checking to see if burn is in proper  values
        if (document.getElementbyId('Burn').value < 20) {
            statusInd.innerHTML += "<li>Burn is too low</li>";
            return false;
        } else if (document.getElementbyId('Burn').value >30) {
            statusInd.innerHTML += "<li>Burn is too high</li>";
            return false;
        } else {
            
            statusInd.innerHTML += "<li>Burn is just right</li>";
            
        }
        //check the code is entered
        codeString = document.getElementbyId('Code').value;
        if (codeString != "") {
            statusInd.innerHTML += "<li>" + codeString.toUpperCase() + "</li>";
        } else {
            statusInd.innerHTML += "<li>You are missing a Launch Code</li>";
            return false;
        }
        for (i = 10; i > 0; i--) {
            statusInd.innerHTML += "<li>" + i + "</li>";
            
        }
        statusInd.innerHTML += "<li>Launch</li>";
    } catch (err) {
        console.log(err);
    }
}

function errorHandler(message, url, line)
{
    out = "Sorry, an error was encountered \n\n";
    out += "Error: " + message + "\n";
    out += "URL: " + url + "\n";
    out += "Line: " + line +"\n\n";
    out += "Click OK to continue. \n\n";
    alert(out);
    return true;
}

