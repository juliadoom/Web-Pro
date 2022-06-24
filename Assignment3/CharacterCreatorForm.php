<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Character Creator</title>
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <style>

        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="Validation.js" type="text/javascript"></script>
        <script language="Javascript">
        function validate() {
                console.log("checking");
                var error = false;
                var nameExpression = /^[a-zA-Z]+$/;
                var emailExpression = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

           if (document.getElementById("playEmail").value == "" || !document.getElementById("playEmail").value.match(emailExpression)) {
                 alert("Make sure your email is valid");
                 console.log("playEmail");
                 error = true;
                }
                if (document.getElementById("CharName").value == "" || !document.getElementById("CharName").value.match(nameExpression)) {
                    alert("Make sure your name is filled out with only letters");
                    console.log("CharName");
                    error = true;
                }
                    if (document.getElementById("History").value == "") {
                    console.log("History");
                    error = true;
                }
                            if (document.getElementById("playEmail").value == "" || document.getElementById("CharName").value == "" ||document.getElementById("History").value == "" || document.getElementById("Race").value == "" || document.getElementById("Class").value == "" || document.getElementById("Gender").value == "") {
                       console.log("Radio Buttons");
                       alert("You need to fill out all fields");
                       error = true;
                   }
             
           
           if (error == true) {
                    console.log("Validations failed");
                    return false;
                }
            }
            function search() {
                console.log("checking");
                var error = false;
                var nameExpression = /^[a-zA-Z]+$/;
                var emailExpression = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
          
                if (document.getElementById("CharName").value == "" || !document.getElementById("CharName").value.match(nameExpression)) {
                    alert("Make sure your name is filled out with only letters");
                    console.log("CharName");
                    error = true;
                }
                    if (document.getElementById("History").value == "") {
                    console.log("History");
                    error = true;
                }

           if (error == true) {
                    console.log("Validations failed");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <form class="form-horizontal" method="post" action="CaracterCreatorResult.php">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Create a Character</legend>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="playEmail">Email/Username</label>  
                                <div class="col-md-8">
                                    <input id="playEmail" name="playEmail" type="text" placeholder="me@server.com" class="form-control input-md">
                                    <span class="help-block">This is your email for the account</span>  
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="CharName">Character Name</label>  
                                <div class="col-md-8">
                                    <input id="CharName" name="CharName" type="text" placeholder="--" class="form-control input-md">
                                    <span class="help-block">This should be just letters</span>  
                                </div>
                            </div>

                            <!-- Multiple Radios -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Gender">Gender</label>
                                <div class="col-md-8">
                                    <div class="radio">
                                        <label for="Gender-M">
                                            <input type="radio" name="Gender" id="Gender-M" value="M" checked="checked">
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="Gender-F">
                                            <input type="radio" name="Gender" id="Gender-F" value="F">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Race">Race</label>
                                <div class="col-md-8">
                                    <select id="Race" name="Race" class="form-control">
                                        <option value="Hu">Human</option>
                                        <option value="El">Elf</option>
                                        <option value="Dw">Dwarf</option>
                                        <option value="Ha">Halfling</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Class">Class</label>
                                <div class="col-md-8">
                                    <select id="Class" name="Class" class="form-control">
                                        <option value="Fi">Fighter</option>
                                        <option value="Cl">Cleric</option>
                                        <option value="Ma">Magic-User</option>
                                        <option value="Th">Thief</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="History">History</label>
                                <div class="col-md-8">                     
                                    <textarea class="form-control" id="History" name="History"></textarea>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Search"></label>
                                <div class="col-md-8">
                                    <input id="Search" name="Action" class="btn btn-primary btn-outline-dark" value ="Search" onclick="return search()" type="submit"><br>
                                    <input id="Create" name="Action" class="btn btn-primary btn-outline-dark" value='Create' onclick="return validate()" type="submit"><br>
                                    <input id="Update" name="Action" class="btn btn-primary btn-outline-dark" value='Update' onclick="return validate()" type="submit">
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
                <div class="col-md-2" id="errorlist">

                </div>
            </div>
        </div>
    </body>
</html>
