<?php
$success = "" ; $error = "";
if($_POST)
{
          // Check for empty fields
          if(empty($_POST['name'])  	||
             empty($_POST['email']) 	||
             empty($_POST['subject']) || 
             empty($_POST['message'])	||
             !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
             {
              echo "No arguments Provided!";
             }
		else
        {
          $name = strip_tags(htmlspecialchars($_POST['name']));
          $email_address = strip_tags(htmlspecialchars($_POST['email']));
          $subject = strip_tags(htmlspecialchars($_POST['subject']));
          $message = strip_tags(htmlspecialchars($_POST['message']));

          // Create the email and send the message
          $to = 'hmtcool4u@gmail.com'; 
          $email_subject = "Website Contact Form:  $name";
          $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nSubject: $subject\n\nMessage:\n $message";
          $headers = "From: $email_address\n"; 
          $headers .= "Reply-To: $email_address";	
          if(mail($to,$email_subject,$email_body,$headers)){
          		
             $success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Well done!</strong> Your message was sent. I will get back to you ASAP
        </div>';
          		
          }
		else{
        	  $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Sorry !</strong> Your message was not sent. Try Again Later
        </div>';
        }
        
    }
}  

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Me </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    

    body{
      font-family: 'Shadows Into Light', cursive;
    }
     html{ 
            height: 100%;
          }
      @media (min-width: 768px) {
      body{
       background: url(back1.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      }
      #home{
        margin-top: 15%;
     	 }
         #message{
      margin-top: 4%;
   		 }	
    }

    @media (max-width: 768px) {
      body{
       background: url(1.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
        }   
       #home{
        margin-top: 20%;
     	 }  
       #message{
      margin-top: 14%;
   		 }
    }
    #home{
      text-align: center;
      text-transform: uppercase;
	
    }
    .alert{
    	font-size: 1.2em;
    }
    .container{
    	margin-top: 2%;
    }
    h1{
     
      color: white;
      margin-bottom: 30px;
    }
    button{
      font-family: 'Shadows Into Light', cursive;
      text-transform: uppercase;
    }
    h2{
      color: white;
    }
    
  </style>
</head>



<body>
  <div class="container"> <? echo $success.$error ?> </div>

<div id="home">
  
  <h1 id="hi" class="display-3">Hey Mate ! <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
</h1>
  <h2> How are you doing??</h2>
<h2>do you wanna talk to me?</h2>

  
<button id="message" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Drop your Message <i class="fa fa-envelope-o" aria-hidden="true"></i></button>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">

          
       <div class="form-group">
        <label for="name">Name :</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
        <div class="form-group">
        <label for="email">Email address :</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="subject">Subject :</label>
        <input type="text" class="form-control" id="subject" name="subject" required>
          </div>
      <div class="form-group">
        <label for="message">Your Message :</label>
        <textarea name = "message" class="form-control" id="message" rows="5" required ></textarea>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
     </form>
	</div>
    </div>
  </div>
</div>




    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    <script>

     
</script>
  


  </body>
</html>