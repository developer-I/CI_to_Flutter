<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Successfully Inserted Image</title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
	
        .header {
          overflow: hidden;
          background-color: #f1f1f1;
          padding: 20px 10px;
        }
        
        .header a {
          float: left;
          color: black;
          text-align: center;
          padding: 12px;
          text-decoration: none;
          font-size: 18px; 
          line-height: 25px;
          border-radius: 4px;
        }
        
        .header a.logo {
          font-size: 25px;
          font-weight: bold;
        }
        
        .header a:hover {
          background-color: #ddd;
          color: black;
        }
        
        .header a.active {
          background-color: dodgerblue;
          color: white;
        }
        
        .header-right {
          float: right;
        }
        
        @media screen and (max-width: 500px) {
          .header a {
            float: none;
            display: block;
            text-align: left;
          }
          
          .header-right {
            float: none;
          }
	</style>

</head>
<body>

          <div class="header">
          <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/profile" class="logo">Profile</a>
            <div class="header-right">
             
              <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/unset_session_data">Logout</a>
            </div>
          </div>


	<div class="main-content">
  <?php header( "refresh:1;url=http://192.168.0.200/Vipin/AdminUser/index.php/Connector/timeinout" ); ?>
       <h3 class="div-main">Successfully Inserted !!</h3>
       
	</div>

	
</body>
</html>