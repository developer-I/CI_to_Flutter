<html>
    <head>
        <title>
            Employee -> Reports
        </title>
      <style>
        body{ 
              font-family: Arial, Helvetica, sans-serif;
              position: relative; 
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
        ::-webkit-scrollbar {
            width: 0px;  /* Remove scrollbar space */
            background: transparent;  /* Optional: just make scrollbar invisible */
          }
          .panel {
             display: flex;
             justify-content: center;
            }
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
  <body>
    <div>
        <div class="header">
            <a href="#default" class="logo">Attendance System</a>
            <div class="header-right">
              <a  href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/profile"> Profile </a>
              <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/unset_session_data">Logout</a>
            </div>
        </div>

      
      <div>
        <form method="post" action="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/report_date">
        <label>
          Select Date:
          <input type="date" id="cdate"  name="image_date">
        </label>

        <p><button onClick="myFunction()">Submit</button></p>
        </form>
      </div>
       
      <div class="panel-default">
      <div class="panel panel-body" id='current_date'>
        Selected Date
      </div>
      </div>

      <div id="image-report" class="container" style="overflow-y:scroll; overflow-x:hidden; height:400px; "  >
        
        <?php
        $i = 1; 
            foreach($data as $row) 
           {$image_name =$row->image; 
            
        ?>
          <a><?php echo $i.".";?></a>
          <img style="width:7em;"src="<?php echo base_url().'asserts/.'.$image_name?>" class="img-reponsive thumbnail"> <br><br><br>
           <!-- echo base_url().'images/'.$image_name .'<br />'; -->
        <?php 
          $i++;
        } 
        ?>
      </div>
    </div> 

     <script>
        function myFunction()
         {
            var result = document.getElementById("cdate").value;  
            document.getElementById('current_date').textContent = result;
            var T = document.getElementById("image-report");
            T.style.display = "block";
          }

          
     </script>

  </body>
</html>