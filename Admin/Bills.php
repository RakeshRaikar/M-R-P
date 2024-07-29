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
               margin-left: 210px;           
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
            table td{
               color: black;
            }
           .submit {
            display: inline-block;
            padding: 12px 24px;
            background-color: BLACK;

            color: #FFF;
            border-radius: 30px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
            position: absolute;
          left: 45%;
          top: 10%;
           }

           .exit{
            display: inline-block;
            padding: 5px 15px;
            background-color: red;
            color: #FFF;
            border-radius: 30px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
            position: absolute;
            left:1%;
            top: 2%;
           }
       
           #tableContents
           {
            position: absolute;
            top:20%;
            left: -10%;
           }
           .hide-border td {
               border: none;

            
            }

            .trBtn {
             
            padding: 3px 15px;
            background-color: #4CAF50; 
            color: #FFF;
            border-radius: 5px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
            
            }

            .trBtn.reject {
               background-color: #FF5733; 
            }
            h2 {
            color: aliceblue;
            font-size: 40px;
            display: flex;
            margin-top: 35px;
            letter-spacing: 2px;
            justify-content: center;
            text-shadow: 4px 5px 8px rgba(0, 0, 0, 0.7);
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
       </style>

      
      </head>
      <body >
         
         <div >

         <button type="button" class="exit" id="exitBtn" onclick="goBack()"><i class="fa-solid fa-right-from-bracket"></i>    </button>

               <h2>Receipt</h2>
            

                        <div id="tableContents">
                              <?php
                                             
                                       
                                 // Accessing the email ID in PHP code
                                 // if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                    // Retrieve the email from the hidden input field
                                //    $email = $_POST["hiddenEmail"];
                              
                           // Query to retrieve data from the table
                           $query = ("SELECT id, name , crop, weight, period, total_amount,slot FROM invoice_data44 where STATUS='Approved'");
                           $query2 =("SELECT uname from users123");
                        // $query->bind_param("ssdds",$email);
                           $result = mysqli_query($conn, $query);
                           $result2 = mysqli_query($conn, $query2);
                           // Check if the query was successful
                           if (!$result) {
                              die('Query execution failed: ' . mysqli_error($conn));
                           }
                              // Fetch and display the data
                        
                           
                            
                                
                              echo"<table>"; 
                              echo"<tr>";
                              echo"<th>Invoice Id</th>";
                              echo"<th>USER</th>";
                              echo"<th>CROP</th>";
                              echo"<th>WEIGHT</th>";
                              echo"<th>PERIOD</th>";
                              echo"<th>TOTAL AMOUNT</th>";
                            //  echo"<th>STATUS</th>";
                              echo"<th>SLOT</th>";
                              echo"<th>Print</th>";
                              echo"</tr>";
                              
                              while ($row = mysqli_fetch_assoc($result)) {
                              echo "<tr>";
                              echo "<td>" . $row['id'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                              echo "<td>" . $row['crop'] . "</td>";
                              echo "<td>" . $row['weight'] . "</td>";
                              echo "<td>" . $row['period'] . "</td>";
                              echo "<td>" . $row['total_amount'] . "</td>";
                            //  echo "<td>" . $row['STATUS'] . "</td>";
                               $slot = rtrim($row['slot'], ",");
                               echo "<td>" . $slot . "</td>";
                                 echo "<td><a href='print_invoice.php?id=" . $row['id'] . "' class='trBtn'>Print</a></td>";

                              echo "</tr>";
                           } 
                              
                              echo"</table>";

                            
                        // }
                              ?>
                  
                  </div>    
                  
                
            
         </div> 
         
 
         </body>
         </html>
         <script>
            function goBack() {
                        
                        window.location.href="AdminDashboard.html";
                     }
                      
            </script>
      <?php
      // Close the database connection


      mysqli_close($conn);
      ?>