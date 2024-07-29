<?php
      // MySQL database credentials


      $servername = 'localhost:8080';
      $username = 'root';
      $password = '';
      $dbname = 'clients123';
      $conn = new mysqli($servername, $username, $password, $dbname);
      $flag=false;

      // Check connection
      if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
      }



      ?>
      <!DOCTYPE html>
      <html>
      <head>
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
         <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-auth.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>
      
      <style>
         *{
               margin: 0;
               padding: 0;
               text-decoration: none;
               box-sizing: border-box;
               font-family:sans-serif;
            }
            body{
               background-color:#dfdfdf;
               background-size: cover;	
            }
         

      
         
            table
            {
               margin-left: 245px;           
               text-align: center;         
               border-collapse: collapse;
               margin-top: 20px;
               margin-bottom: 30px;
               align-self: center;
               background-color:  #c5c6c7;
            }
            table th
            {
               background-color: #154886;
            }
         
            table th, table td
            {
            
               padding: 10px;
               text-align: center;
               color: white;
               border: 1.5px solid black;
               width: 130px;
            }
         
          

            .exit{
            display: inline-block;
            padding: 2px 12px;
            background-color: black;
            color: #FFF;
            border-radius: 30px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
            position: absolute;
            left:2%;
            top: 2%;
           }
           .submit{
            display: inline-block;
            padding: 4px 15px;
            background-color: #0dabcb;
            color: #FFF;
            border-radius: 30px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
            position: absolute;
            left:46%;
            top: 15%;
           }
       
           #tableContents
           {
            position: absolute;
            top:20%;
            left: -1%;
           }
           .hide-border td {
               border: none;
            
            }

          

            .trBtn.reject {
               background-color: #FF5733; 
            }

            tr.approved {
               background-color: #53aa2e; /* Green color */
            }

            /* Styles for Rejected rows */
            tr.rejected {
               background-color: rgb(243, 67, 67);

            }
       </style>

      
      </head>
      <body >
         
         <div >

         
               
            <form method="post" id="emailForm" >  
                  <input type="hidden" id="hiddenEmail" name="hiddenEmail" value="">
                       <input type=submit class="submit"  value="Get Invoice"  id="submitButton" >
                 <button type="button" class="exit" id="exitBtn" onclick="goBack()"><i class="fa-solid fa-right-from-bracket"></i></button>

               
            

                        <div id="tableContents">
                              <?php
                                             
                                       
                                 // Accessing the email ID in PHP code
                                 if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                   // Retrieve the email from the hidden input field
                                    $email = $_POST["hiddenEmail"];
                                    $query = "SELECT uname FROM users123 where email='$email'";
                                    $result23 = mysqli_query($conn, $query);
                                    if ($result23) {
                                       $row = mysqli_fetch_assoc($result23);

                                       $name = $row['uname'];
                                    }
                              
                           // Query to retrieve data from the table
                           $query = ("SELECT name, crop, weight, period, total_amount,STATUS,slot FROM invoice_data44 where name='$name'");
                        //  $query->bind_param("s",$email);
                           $result = mysqli_query($conn, $query);
                     
                           // Check if the query was successful
                           if (!$result) {
                              die('Query execution failed: ' . mysqli_error($conn));
                           }
                              // Fetch and display the data
                        
                            
                              if (mysqli_num_rows($result) > 0) {
                              echo"<table>"; 
                              echo"<tr>";
                              echo"<th>USER</th>";
                              echo"<th>CROP</th>";
                              echo"<th>WEIGHT</th>";
                              echo"<th>PERIOD</th>";
                              //echo"<th>SLOT</th>";  
                              echo"<th>TOTAL AMOUNT</th>";
                              echo"<th>STATUS</th>";

                              echo"</tr>";
                              // echo"</table>";
                              while ($row = mysqli_fetch_assoc($result)) {
                              
                                 // echo"<table>";
                              echo "<tr class='" . ($row['STATUS'] == 'Approved' ? 'approved' : ($row['STATUS'] == 'Rejected' ? 'rejected' : '')) . "'>";
                              echo "<td>" . $row['name'] . "</td>";
                              echo "<td>" . $row['crop'] . "</td>";
                              echo "<td>" . $row['weight'] . "</td>";
                              echo "<td>" . $row['period'] . "</td>";
                              //$slot = rtrim($row['slot'], ",");
                              //echo "<td>" . $slot . "</td>";
                              echo "<td>" . $row['total_amount'] . "</td>";
                              echo "<td>" . $row['STATUS'] . "</td>";
                              echo "</tr>";
                              
                             
                           }  
                           echo"</table>";
                        }
                     }
                    
                              ?>
                  
                  </div>    
                  
                  </form> 

            
         </div> 
         
     <script>
         
           
                        var firebaseConfig = {
                        
                        apiKey: "AIzaSyC8rGPM2g5S0bq8pIpNmQQR5zKbN5yxi34",
                        authDomain: "warehouse-management-9330c.firebaseapp.com",
                        databaseURL: "https://warehouse-management-9330c-default-rtdb.firebaseio.com",
                        projectId: "warehouse-management-9330c",
                        storageBucket: "warehouse-management-9330c.appspot.com",
                        messagingSenderId: "662529124580",
                        appId: "1:662529124580:web:714ab6d4ca542d7ab464f1"
                        };
      
         
      
         
                           firebase.initializeApp(firebaseConfig);
                        
                           firebase.auth().onAuthStateChanged(function(user)
                           
                           {
                              if(user)
                              {
                           
                                 var email = user.email;
                                 document.getElementById("hiddenEmail").value = email;
                              
                              }
                              
                           });
       
      
           
                     // Function to go back to the previous page
                     function goBack() {
                        
                        window.location.href="dashboard.html";
                     }
                      

                 
               </script>
         
         </body>
         </html>
      <?php
      // Close the database connection


      mysqli_close($conn);
      ?>