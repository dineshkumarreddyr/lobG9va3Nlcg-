

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Lookser</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>
  </head>
  <body style="font-family: 'Roboto', sans-serif;margin:0;padding:0;">
    <div style="width:650px;margin:0 auto;padding-top:20px;border-top:2px solid #dc0484;
    border-right:2px solid #1e81aa;border-bottom:2px solid #1e81aa;border-left:2px solid #dc0484;">
    <div style="text-align:center;margin-bottom:15px;"><img src="http://www.lookser.com/assets/images/logo.png"
     width="200"></div>
     <div style="background:url(images/thank.jpg);color:#fff;font-size:17px;font-weight:300;
     padding:15px 20px;padding-bottom:15px;background-size:cover;">Hi {{USER_NAME}}, <span style="font-weight:300;font-size:13px;">Welcome to Lookser!</span></div>
     <div style="padding:30px 15px 10px 15px;font-size:14px;color:#000;line-height:22px;">
     	Thankyou for Registering at our site. please click the link below to complete your registration and Shop unlimited with our Look collections.
     	<a href="{{CONFIRM_LINK}}">Click here to confirm your account.</a><br/>
     </div>
     <div style="padding:15px;">
       <p style="margin:5px 0;"><strong>Username :</strong> {{USER_EMAIL}}</p>
     </div>
     <div style="background:#1e81aa;padding:10px 15px;margin-top:20px;color:#fff;font-size:12px;text-align:center;">All Rights Reserved &copy; Lookser 2015</div>
    </body>
</html>