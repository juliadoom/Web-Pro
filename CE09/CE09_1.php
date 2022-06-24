<html>   
   <head>
      <title>Form Validation</title>
      <style>
            .error{
                border: 2px solid red;
                border-radius: 4px;
            }
        </style>
        <script type="text/javascript" src="ExternalJS.js"></script>

    </head>   
    <body>
        <noscript>You need to enable JavaScript</noscript>
        <form action="#" name="myForm" onsubmit="return(validate());" method="post">
            <table cellspacing="2" cellpadding="2" border="1">            
                <tr>
                    <td align="right">Name</td>
                    <td><input type="text" name="Name" id='Name' /><div id="nameError"></div></td>
                </tr>            
                <tr>
                    <td align="right">EMail</td>
                    <td><input type="text" name="EMail" id="EMail"/></td>
                </tr>            
                <tr>
                    <td align="right">Zip Code</td>
                    <td><input type="text" name="Zip" id="Zip" /></td>
                </tr>            
                <tr>
                    <td align="right">Country</td>
                    <td>
                        <select name="Country" id="Country">
                            
                        </select>
                    </td>
                </tr>            
                <tr>
                    <td align="right"></td>
                    <td><input type="submit" value="Submit" onclick="return(validate());" /></td>
                </tr>            
            </table>
            <div id="errorlog">

            </div>
        </form>      
    </body>
        <script>
        countryList = ["USA", "Canada", "UK", "India"];
        countryDrp = "<option value=\"-1\" selected>[choose yours]</option>"
        for(l = 0;l<countryList.length;l++){
            countryDrp = countryDrp + "<option value=\""+l+"\">"+countryList[l]+"</option>"
        }
        document.myForm.Country.innerHTML = countryDrp
    </script>
</html>
