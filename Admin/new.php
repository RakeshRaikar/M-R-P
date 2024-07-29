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

         <!-- <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-auth.js"></script>
            <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script> -->
      
      <style>
         *{
               margin: 0;
               padding: 0;
               text-decoration: none;
               box-sizing: border-box;
               font-family:sans-serif;
            }
            body{
               background: #c5c6c7;
               background-size: cover;	
            }
      
         
            table
            {
               margin-left: 210px;           
               text-align: center;         
            border-collapse: collapse;
              
               margin-bottom: 30px;
               align-self: center;
              
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
         
           #tableContents
           {
            position: absolute;
            top:20%;
            left: -5%;
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
        letter-spacing: 1px;
        text-shadow: 4px 5px 8px rgba(0, 0, 0, 0.7);
         justify-content: center;
         
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
         <h2 >Client Request</h2>
                        <div id="tableContents">
                        <form id="updateForm" method="post" action="">
                              <?php
                           // Query to retrieve data from the table
                           $query = ("SELECT id, name, crop, weight, period, total_amount,slot,STATUS FROM invoice_data44 where STATUS='Pending...'");
                        // $query->bind_param("ssdds",$email);
                           $result = mysqli_query($conn, $query);
                     
                           // Check if the query was successful
                           if (!$result) {
                              die('Query execution failed: ' . mysqli_error($conn));
                           }
                           
                           if (mysqli_num_rows($result) == 0) {
                              echo "<script>alert(' No Pending Bills are available..');</script>";
                              ?>
                            <script>  window.location.href = "AdminDashBoard.html";</script>
                              <?php
                          } else 
                          {
                              echo"<table>"; 
                              echo"<tr>";
                              echo"<th>Invoice Id</th>";
                              echo"<th>USER</th>";
                              echo"<th>CROP</th>";
                              echo"<th>WEIGHT</th>";
                              echo"<th>PERIOD</th>";
                              echo"<th>TOTAL AMOUNT</th>";
                              echo"<th>STATUS</th>";
                             
                              echo"</tr>";

                              while ($row = mysqli_fetch_assoc($result)) {
                              echo "<tr>";
                              echo "<td>" . $row['id'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                              echo "<td>" . $row['crop'] . "</td>";
                              echo "<td>" . $row['weight'] . "</td>";
                              echo "<td>" . $row['period'] . "</td>";
                              echo "<td>" . $row['total_amount'] . "</td>";
                             
                              echo "<td><input type=\"checkbox\" name=\"selected_rows[]\" value=\"" . $row['id'] . "\"></td>";
                              echo "</tr>";
 
                           }  
                           
                           echo "<tr class='hide-border' >";
                           echo "<td colspan=7>
                                   <button id=\"approveBtn\" class=\"trBtn\" >Approve</button>
                                   <button id=\"rejectBtn\" class=\"trBtn reject\" >Reject</button>
                                 </td>";
                           echo "</tr>";
                           
                           echo"</table>";
                          }
                              ?>
                              </form>
                  
                  </div>    

         </div> 
         
     <script>
      
      function goBack() {
         window.location.href="AdminDashboard.html";
      }
          
      document.addEventListener('DOMContentLoaded', function() {
         const approveBtn = document.getElementById('approveBtn');
         const rejectBtn = document.getElementById('rejectBtn');
         const updateForm = document.getElementById('updateForm');

            // Attach event listeners to the buttons
            approveBtn.addEventListener('click', function() {
            submitForm('approve');
            });

            rejectBtn.addEventListener('click', function() {
            submitForm('reject');
            });
            
                // Function to submit the form data using AJAX
            function submitForm(action) {
            var result = window.confirm("Are you sure want to do this?")
            if(result)
            {
               const formData = new FormData(updateForm);
               formData.append('action', action); 

               const xhr = new XMLHttpRequest();
               xhr.open('POST', 'xyz.php', true);
               xhr.onload = function() {
               if (xhr.status === 200) {
                       
               location.reload();
              // window.location.href="new.php";
               } else {      
                console.error('Error:', xhr.statusText);
                 }
               };
                    xhr.onerror = function() {
                    console.error('Network Error');
                    };

                    xhr.send(formData);

                    location.reload();
               
            }
            }
      });
     </script>
  </body>
</html>
<?php
      mysqli_close($conn);
?>