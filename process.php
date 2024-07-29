<?php




function nameee ($crop, $weight, $period, $total_amount,$email)
{
  
  $servername = 'localhost:8080';
  $username = 'root';
  $password = '';
  $dbname = 'clients123';
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }
  
  $query = "SELECT uname FROM users123 where email='$email'";
    $result23 = mysqli_query($conn, $query);
    if ($result23) {
      $row = mysqli_fetch_assoc($result23);

      $name = $row['uname'];
    }
  
          $stmt = $conn->prepare("INSERT INTO invoice_data44 (crop, weight, period, total_amount,  STATUS,name) VALUES ( ?, ?, ?, ?,  'Pending...',?)");
          $stmt->bind_param("sddss", $crop, $weight, $period, $total_amount, $name);
             if (!$stmt) 
            {
               die("Error: " . $conn->error); // Print the error message if the preparation failed
            }
             if (!empty($weight) && $weight > 0 && !empty($period) && $period > 0) 
              {
                             
               if($stmt->execute())
                {
                ?>
                     <!--  <script>alert('Entry  is added successfully.');
                       </script>   -->
                 <?php
                      $stmt->close();
                      $conn->close();
                  }
                    else {
                              echo "<script>alert('Error while adding entry to the database.');</script>";
                              ?> <script> window.location.href="submit.html"; </script> <?php
                        }
                
               }  
              else {
                      echo "<script>alert('Please fill in the required fields .');</script>";
                   }
    
}
       


// Retrieve form data
if ($_SERVER['REQUEST_METHOD'] === 'POST')
 {
  // Connect to MySQL database
  if(isset($_POST['hiddenEmail']))
  {
    $email = $_POST['hiddenEmail'];
  }
  $servername = 'localhost:8080';
  $username = 'root';
  $password = '';
  $dbname = 'clients123';
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }
  $query11 = "SELECT COUNT(*) as count FROM slotavail where slotstatus=0";
  $result1 = $conn->query($query11);
  if($result1->num_rows > 0)
  {
   $row = $result1->fetch_assoc();
   $rowcount = $row["count"];
  
  }
  // $availslot=0;
  // while ($row2 = mysqli_fetch_assoc($result1))2222
  // { 
  //     if ($row2['slotstatus']==0)
  //     {   
  //          $availslot=$availslot+1;
         
  //     }
  // }
   //$sql= "CREATE TABLE invoice_data44 (id INT(11) AUTO_INCREMENT PRIMARY KEY, email VARCHAR(50) NOT NULL,crop VARCHAR(50) NOT NULL,weight DECIMAL(10,2) NOT NULL,period INT(11) NOT NULL,total_amount DECIMAL(10,2) NOT NULL, slot VARCHAR(255) NOT NULL, STATUS varchar(50))";
  // // Prepare and bind the INSERT statement
  //  if($conn->query($sql)=== true)
  //  {
  //    echo "Table created sucessfully";

  //  }
  //  else
  //  {
  //    echo "Error: " . $conn->error;
  // }
  // $stmt = $conn->prepare("INSERT INTO invoice_data35 (email, crop, weight, period, total_amount, slot, STATUS) VALUES (?, ?, ?, ?, ?, ?, 'Pending...')");
  // $stmt->bind_param("ssddss",$email, $crop, $weight, $period, $total_amount, $slot);

  if($_POST['input1'] >500 || $_POST['input3'] > 500 || $_POST['input5'] >500 || $_POST['input7'] > 500 || $_POST['input9'] >500 || $_POST['input11'] > 500)
  {
    echo "<script>alert('You cannot store more than 500 Quintals.');</script>";
  }
  // elseif($_POST['result1'] =='' || $_POST['result2'] =='' || $_POST['result3'] =='' || $_POST['result4'] =='' ||  $_POST['result5'] =='' && $_POST['result6'] =='')
  // {
  //   echo "<script>alert(' Calculate the Amount before Submiting the Details.');</script>";
  // }
  else
  {
   
     $weigth1 = $_POST['input1'];
     $weigth2 = $_POST['input3'];
     $weigth3 = $_POST['input5'];
     $weigth4 = $_POST['input7'];
     $weigth5 =  $_POST['input9'];
     $weigth6 = $_POST['input11'];
    $total = intval($weigth1) + intval($weigth2) + intval($weigth3) + intval($weigth4) + intval($weigth5) + intval($weigth6);
     if($total/100 < $rowcount)
     {

          if (isset($_POST['mycheck1']))  
          {
            
            nameee("ARECANUT",$_POST['input1'],$_POST['input2'],$_POST['result1'],$email);    
          }

          if (isset($_POST['mycheck2']) ) {
        
            nameee("GINGER",$_POST['input3'],$_POST['input4'],$_POST['result2'],$email);    

          }

          if (isset($_POST['mycheck3'])) {
          
            nameee("MAIZE",$_POST['input5'],$_POST['input6'],$_POST['result3'],$email);    
            
          }

          if (isset($_POST['mycheck4'])) {
            
            nameee("MILLET",$_POST['input7'],$_POST['input8'],$_POST['result4'],$email);    
            
          }

          if (isset($_POST['mycheck5'])) {
            
            nameee("PADDY",$_POST['input9'],$_POST['input10'],$_POST['result5'],$email);     
            
          }

          if (isset($_POST['mycheck6'])) {
            
            nameee("PEPPER",$_POST['input11'],$_POST['input12'],$_POST['result6'],$email);    

          }
          if (!isset($_POST['mycheck1']) && !isset($_POST['mycheck2']) && !isset($_POST['mycheck3']) && !isset($_POST['mycheck4']) && !isset($_POST['mycheck5']) && !isset($_POST['mycheck6'])  ) 
          {
            echo "<script>alert(' please select a crop before submiting.');</script>";
          }
          if (isset($_POST['mycheck1']) || isset($_POST['mycheck2']) || isset($_POST['mycheck3']) || isset($_POST['mycheck4']) || isset($_POST['mycheck5']) || isset($_POST['mycheck6'])  ) 
          {
            echo"   <script>alert('Entry  is added successfully.');   </script> ";
          }

          
      }
      else{
        echo "<script>alert(' No space is available. Please contact us.');</script>";
      }
         
  }
    ?> 
  
    <script> window.location.href="dashboard.html";  </script>  
<?php
  
}

?>
