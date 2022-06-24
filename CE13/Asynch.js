
function AJAXRequest(){
    try {
        // Opera 5.0+, Firefox, Chrome, Safari
        http_request = new XMLHttpRequest();
        
    } catch (e) {
        //Internet Explorer Browsers
        try {
                http_request = new ActiveXObject ("Msxm12.XMLHTTP"); 
            } catch (e) {
                try {
                    http_request = new ActiveXObject ("Microsoft.XMLHTTP");
                } catch (e) {
                    //Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
        return http_request;
}

