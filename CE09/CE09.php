<html>   
   <head>
      <title>Form Validation</title>
      
      <script type="text/javascript">
          //Form validation code will come here
        function validate()
          console.log("We are validating");
          console.log(document.myForm.Name.value);
          var errorArray = new Array();
         if( document.myForm.Name.value == "" )
         {
            alert( "Please provide your name!" );
            document.myForm.Name.focus() ;
            return false;
            errorArray.push("You need a name")
         }
         
         if( document.myForm.EMail.value == "" )
         {
            alert( "Please provide your Email!" );
            document.myForm.EMail.focus() ;
            return false;
            errorArray.push("You need an Email")
         }
         
         if( document.myForm.Zip.value == "" ||
         isNaN( document.myForm.Zip.value ) ||
         document.myForm.Zip.value.length != 5 )
         {
            alert( "Please provide a zip in the format #####." );
            document.myForm.Zip.focus() ;
            return false;
            errorArray.push("You need a zip")
         }
         
         if( document.myForm.Country.value == "-1" )
         {
            alert( "Please provide your country!" );
            return false;
            errorArray.push("You need a Country")
         }
         if (errorArray.length > 0) {
             var errorReport = document.getElementbyId("errorlog");
             errorString = "<ul>";
             for (i = 0; i < errorArray.length; i++) {
                 errorString = errorString + "</ul>"
                 errorReport.innerHTML = errorString
                 return false;
             }
             
             return true;
         }

      </script>      
   </head>   
   <body>
       <noscript>You need to enable JavaScript</noscript>
      <form action="/cgi-bin/test.cgi" name="myForm" onsubmit="return(validate());" method="post">
         <table cellspacing="2" cellpadding="2" border="1">            
            <tr>
               <td align="right">Name</td>
               <td><input type="text" name="Name" /></td>
            </tr>            
            <tr>
               <td align="right">EMail</td>
               <td><input type="text" name="EMail" /></td>
            </tr>            
            <tr>
               <td align="right">Zip Code</td>
               <td><input type="text" name="Zip" /></td>
            </tr>            
            <tr>
               <td align="right">Country</td>
               <td>
                  <select name="Country">
                  </select>
               </td>
            </tr>            
            <tr>
               <td align="right"></td>
               <td><input type="submit" value="Submit" /></td>
            </tr>            
         </table>
          <div id="errorlog">
              
          </div>
      </form>      
   </body>
   <script>
        countryList = ["USA", "Canada", "UK", "India" "Japan"];
        countryDrp = "<option value=\"-1\" selected>[choose yours]</option>"
        for(l = 0;l<countryList.length;l++){
            countryDrp = countryDrp + "<option value=\""+l+"\">"+countryList[l]+"</option>"
        }
        document.myForm.Country.innerHTML = countryDrp
    </script>
</html>
