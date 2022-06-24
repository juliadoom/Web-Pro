function validate()
      {
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
      }