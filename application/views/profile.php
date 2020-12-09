<html>
    <head>
        <style>
            .profile-page{
                width: 30%;
                height: 90%;
                position: relative;
                display:inline-block;
                left: 25em;
                top: .6em;
                text-align: center;
                font-size: larger;
                background-color: gainsboro;
                }
            #pro-img{
                margin-top: 10px;
                padding: 5em 6em;
                background-color: bisque;
            }
            input{
                padding:0.8em 4em;
                width: 100%;
                margin-bottom: 0.3em;
                background: transparent;
                border: none;
                /* outline: transparent; */
                /* line-height: 1em; */
                }
            input:hover{
                background-color: aquamarine;
                padding:1em 4em;
            }
            #pro-btn{
                padding: 0.5em 1.4em;
                font-size: x-large;
                color: black;
                outline: transparent;
                background: transparent;
                border: 0;
                font-family: sans-serif;  
            }
            #pro-btn:hover{
                background-color: red;
                border-radius: 5px;
            }
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
            <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/profile" class="logo">Profile</a>
            <div class="header-right">
              <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/timeinout">Attendance</a>
              <a href="http://192.168.0.200/Vipin/AdminUser/index.php/Connector/unset_session_data">Logout</a>
            </div>
          </div>
        <div class="profile-page">
                     <?php
                     foreach($data as $row){
                     ?>
                    <div><img src="./aa.png" id="pro-img" /></div>
                    <hr>
                    <table>
                    <tr>
                      <td>NAME</td>
                      <td> <input type="text" name="fname" value="<?php echo $row->firstname ?>" />  </td>
                    </tr>
                      <tr>
                        <td>LAST NAME</td>
                        <td>  <input type="text" name="lname" value="<?php echo $row->lastname?>" ></td>
                      </tr>
                      <tr>
                        <td>EMAIL</td>
                        <td> <input type="text" name="email" value="<?php echo $row->email?>" ></td>
                      </tr>
                      <tr>
                        <td>PASSWORD</td>
                        <td>  <input type="text" name="password" value="<?php echo $row->password?>" ></td>
                      </tr>
                       <tr>
                        <td>MOBILE</td>
                        <td> <input type="text" name="mobile" value="<?php echo $row->mobile ?>" > <br><br></td>
                      </tr>
                    </table>
                   
                   
                   
                    <?php
                  }
                   ?>
                    <button id="pro-btn"><b>EDIT</b></button>
                    
        </div>
        
    </body>
</html>