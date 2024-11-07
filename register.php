<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Registration Form </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/test.css">
    <!-- Fontawesome CDN Link -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <div class="container">
          <input type="checkbox" id="flip">
        <div class="cover flex-sm-column-reverse">
            <div class="front">
                <img src="images/frontImg.jpg" alt="">
                <div class="text">
                    <span class="text-1">Build a Sustainable Digital Business:<br> Strategies for Long-Term
                        Success</span>
                    <span class="text-2">Let's get started</span>
                </div>
            </div>
            <div class="back">
                <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
                <div class="text">
                    <span class="text-1"><br> Strategies for Long-Term Success</span>

                    <span class="text-2">Let's get started</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                <a href="index.php"> <center><img src="images/emerge-colored.png" class="emerge-colored"></center></a><br>
                    <div class="title">Event Registration</div><br>
                    <div id="display_message" class="">
                     
                    </div>
                    <!--  -->
                    <form role="form"  class="registration-form" action="insert.php" method="post" enctype="multipart/form-data" id="registrationForm">
                    <fieldset style="border-color:white; border:none;">
                        <div class="form-bottom">
                            <div class="row">
                                <div class="form-group col-md-9 col-sm-9">
                                    <input type="text" class="form-control" placeholder="Full name" name="full_name">
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:3px;">
                                <div class="row">
                                    <div class="form-group col-md-9 col-sm-9">
                                      <input type="email" name="email" placeholder="Email" id="emailInput" oninput="validateEmailInput()" class="form-email form-control">
                                      <span id="emailFeedback" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9 col-sm-9">
                                       <input type="number" class="form-control" placeholder="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9 col-sm-9">
                                      <input type="text" class="form-control" placeholder="Address" name="user_address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9 col-sm-9">
                                      <input type="text" class="form-control" placeholder="Business name" name="business_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9 col-sm-9">
                                      <input type="text" class="form-control" placeholder="Business location" name="business_location">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-9 col-sm-9">
                                      <input type="text" class="form-control" placeholder="Business sector" name="business_sector">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>
                    <fieldset style="border-color:white; border:none;">
                        <div class="form-top">
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                              <p>Upload business logo</p>
                                <input type="file" class="form-control" placeholder="Business Logo" name="image" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Business Instagram Handle" name="histagram_handle">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Business Facebook Handle" name="facebook_handle">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Is your business registered?" name="business_registered">
                            </div>
                            <div class="form-group">
                                <p>How long has your business been in operation?</p>
                                <input type="text" class="form-control" placeholder="How long has your business been in existence" name="business_existence">
                            </div>
                            <div class="form-group">
                                <p>What's your major challenge in 2024 that you'd like to get solved before 2025</p>
                                <input type="text" class="form-control" placeholder="What's your major challenge in 2024" name="major_challenge">
                            </div>
                            <div class="form-group">
                                <p>Would you like to position your business for funding?</p>
                                <input type="text" class="form-control" placeholder="Would you like to position your business for funding" name="business_funding">
                            </div>
                            <div class="form-group">
                                <p>What is your expectation?</p>
                                <textarea class="form-control" name="expectation" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="submit" value="Submit" name="submit" class="submit">Submit</button> 
                            <!--<input type="submit" value="Submit" name="submit" class="submit"/>-->
                        </div> 
                    </fieldset>
                </form>
                      <script src="js/validation.js"></script>
                      <script src="js/test.js"></script>
                       <script>
                                 // Handle form submission
                                //   document.getElementById("registrationForm").addEventListener("submit", submitForm);
                                 
                                //  function submitForm(event) {
                                //   event.preventDefault();
                                //   const formData = new FormData(event.target);
                                 
                                //   fetch("insert.php", {
                                //      method: "POST",
                                //      body: formData
                                //   })
                                //   .then(response => response.text())
                                //   .then(displayResponse)
                                //   .catch(logError);
                                //  }
                                 
                                //  function displayResponse(data) {
                                //   document.getElementById("display_message").innerHTML = data;
                                //   document.getElementById("registrationForm").reset();
                                //   setTimeout(redirect, 5000);
                                //  }
                                 
                                //  function redirect() {
                                //   window.location.href = "https://chat.whatsapp.com/KRPZ8xMQfpqJUfcfvXgu4f";
                                //  }
                                 
                                //  function logError(error) {
                                //   console.error("Error:", error);
                                //  }
    
                        </script>
                    <!--  -->
                      
                </div>
            </div>
        </div>
    </div>
</body>
</html>