
<html>
    <head>
        <style>

* {
	padding: 0;
	margin: 0;
}

html,body {
	background-color: #6E7889;
	font-family: tahoma, sans-serif;
	color: #E6EBEE;
}

#card {
	background-color: #393B45;
	height: auto;
	width: 350px;
	margin: 10vh auto;
	border-radius: 25px;
	padding-bottom: 1px;
	box-shadow: 2px 2px 5px #4069E2;
}

h1 {
	color: white;
	text-align: center;
	width: 100%;
	background-color: #E6EBEE;
	border-radius: 25px 25px 0 0;
	color: #393B45;
	padding: 30px 0;
	font-weight: 800;
	margin: 0;
}

.image-crop {
	display: block;
	position: relative;
	background-color: #E6EBEE;
	width: 150px;
	height: 150px;
	margin: 0 auto;
	margin-top: 30px;
	overflow: hidden;
	border-radius: 50%;
	box-shadow: 1px 1px 5px #4069E2;
}

#avatar {
	display: inline;
	height: 230px;
	width: auto;
	margin-left: -34px;
}

#bio {
	display: block;
	margin: 20px auto;
	width: 180px;
	height: auto;
}

#bio p {
	color: #E6EBEE;
	font-weight: lighter;
	font-size: 15px;
	text-align: justify;
}

#stats {
	display: flex;
	flex-direction: row;
	height: auto;
	width: 280px;
	justify-content: space-between;
	align-items: center;
	margin: 0 auto;
	font-weight: 500;
}

.col {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	width: auto;
}

.stat {
	font-size: 25px;
	margin: 0;
}

.label {
	margin: 0;
}

#buttons {
	display: flex;
	margin: 0 auto;
	justify-content: space-between;
	width: 280px;
}

button {
	display: block;
	position: relative;
	padding: 10px 0;
	width: 130px;
	margin: 30px 0;
	border-radius: 25px;
	border: none;
	font-size: 20px;
	letter-spacing: 0.2px;
	font-weight: 500;
	background-color: #4069E2;
	color: #E6EBEE;
}

button:focus {
	display: none;
}

button:hover {
	transform: scale(1.03);
	cursor: pointer;
	transition: all 0.2s ease-in-out;
}

#msg{
	background-color: #E6EBEE;
	color: #393B45;
}

          /* ---------------------------------------------------------------------------  */
            body { 
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }
        
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

          
        }
        </style>
    </head>
  <body>
        <div class="header">
            <a href="#default" class="logo">Profile</a>
            <div class="header-right">
              <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/timeinout">Attendance</a>
              <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/unset_session_data">Logout</a>
            </div>
        </div>
      


        <?php
          foreach($data as $row){
            
        ?>

      <div id="card">
	        <h1><?php echo $row->firstname." ".$row->lastname?></h1>
	          <div class="image-crop">
		          <img id="avatar" src="<?php echo base_url().'profiles/.'.$row->profile?>"></img>
	          </div>
	          <div id="bio">
		          <p><b>  Designation : </b> <?php echo $row->designation ?> </p>
	          </div>
	          <div id="stats">
		          <div class="col">
			        <p class="label"><b>Email :</b> <?php echo $row->email?></p><br>
              <p class="label"><b>Gender :</b> <?php echo $row->gender?></p><br>
              <p class="label"><b>Mobile :</b> <?php echo $row->phone?></p>
		          </div>
				    
	          </div>
	          <div id="buttons">
		        <button>Help</button>
		        <button id="msg">Mail</button>
	          </div>
       </div>
       <?php
           }
        ?>
        
    </body>
</html>