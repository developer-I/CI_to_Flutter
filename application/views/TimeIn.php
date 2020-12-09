<!DOCTYPE html>
<html lang="en">
<head>
    <title>Time In</title>

    <style>
        .profile{
            padding-top: 3%;
            padding-left: 10%;
        }
        #pro{
            border-radius: 50%;
           
        }
        #form{
            padding-left: 30%;
        }
        .login100-form-btn{
            
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px ;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
           
        }
        h2{
            text-shadow: 2px 2px 8px #FF0000;
        }
        .timein{
            padding-top: 4%;
            padding-left: 19%;
           
        }
        .welcome{
            padding-left: 21%;  
        }
    </style>
    
	
</head>
<body>
	
	<div id="form">
	
			
				<form action="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/attendance" class="login100-form validate-form">
					<div class="welcome">
						<h2>Welcome</h2>
                    </div>
					<div class="profile">
						<img id="pro"  height="200px";
                        width ="300px"; src="http://192.168.0.200/Vipin/AdminUser/profiles/.ankit.jpg" alt="AVATAR">
                    </div>

					<div class="timein">
						<button class="login100-form-btn">
							Time In
						</button>
					</div>
                </form>
			
		
	</div>
	

	
</body>
</html>