<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us | y2img.xyz</title>
    <meta name="description" content="Contact us for any query which is related to y2img.xyz services."/>
    <link rel="canonical" href="https://y2img.xyz/contact" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link rel="stylesheet" href="assets/y2img.css"/>
    <link rel="stylesheet" href="assets/contact.css"/>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<?php include 'includes/header.php';?>
<div class="contact_info">
     <div class="container">
         <div class="row">
             <div class="col-lg-10 offset-lg-1">
                 <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">
                     <!-- Contact Item -->
                     <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                         <div class="contact_info_image"><img src="https://img.icons8.com/office/24/000000/iphone.png" alt=""></div>
                         <div class="contact_info_content">
                             <div class="contact_info_title">Phone</div>
                             <div class="contact_info_text">+1 000 0000 0000</div>
                         </div>
                     </div> <!-- Contact Item -->
                     <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                         <div class="contact_info_image"><img src="https://img.icons8.com/ultraviolet/24/000000/filled-message.png" alt=""></div>
                         <div class="contact_info_content">
                             <div class="contact_info_title">Email</div>
                             <div class="contact_info_text">contact@y2img.xyz</div>
                         </div>
                     </div> <!-- Contact Item -->
                     <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                         <div class="contact_info_image"><img src="https://img.icons8.com/ultraviolet/24/000000/map-marker.png" alt=""></div>
                         <div class="contact_info_content">
                             <div class="contact_info_title">Address</div>
                             <div class="contact_info_text">Delhi, India</div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="contact_form">
     <div class="container">
         <div class="row">
             <div class="col-lg-10 offset-lg-1">
                 <div class="contact_form_container">
                     <div class="contact_form_title">Get in Touch</div>
                        <div id="page-wrapper">
                            <form id="frmContact" method="post" action="includes/send.php">
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input class="contact_form_name input_field" id="name" type="text" name="name" placeholder="Name" required>
                                    <input class="contact_form_email input_field" id="email" type="text" name="email" placeholder="E-mail" required>
                                    <input type="text" name="subject" id="subject" class="contact_form_phone input_field" placeholder="Subject">
                                </div>
                                <div class="contact_form_text">
                                    <textarea class="text_field contact_form_message" id="message" name="message" rows="4" placeholder="Type your message here"></textarea>
                                </div>
                                </div>
                        
                                <div class="input_holder">
                                    <div class="g-recaptcha" data-sitekey="6LfpktMZAAAAAEJRwBx9yB4hrCoSLB68zVpWvjel"></div>
                                </div>
                                <div class="input_holder">
                                    <div id="alert"></div>
                                    <div id="mail-status"></div>
                                </div>
                                <div class="contact_form_button">
                                    <input class="button contact_submit_button" id="submit" type="submit" name="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#frmContact').submit(function(event) {
        event.preventDefault(); // Prevent direct form submission
        $('#alert').text('Processing...').fadeIn(0); // Display "Processing" to let the user know that the form is being submitted
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        $.ajax({
            url: 'includes/send.php',
            type: 'post',
            data: {
                name: name,
                email: email,
                message: message,
                captcha: grecaptcha.getResponse()

            },
            dataType: 'json',
            success: function( _response ) {
                console.log(_response.type);
                // The Ajax request is a success. _response is a JSON object

                var type = _response.type;

                if (type == "error") {
                    // In case of error, display it to user

                    $('#alert').removeClass('success').addClass('error').fadeIn().html(_response.text);
                } else {
                    // In case of success, display it to user and remove the submit button
                    $('#alert').removeClass('error').addClass('success').fadeIn().html(_response.text);

                }

            },
            error: function(jqXhr, json, errorThrown){
                // In case of Ajax error too, display the result
                var error = jqXhr.responseText;
                $('#alert').html(error);
            }
        });
    });
</script>
<?php include 'includes/footer.php';?>
</body>
</html>