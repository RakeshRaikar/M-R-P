<?php
// update_status.php

// MySQL database credentials (same as in the main file)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'clients123';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the form was submitted with selected rows
  if (isset($_POST['selected_rows']) && is_array($_POST['selected_rows'])) {
    $selectedRows = $_POST['selected_rows'];
    $status = isset($_POST['action']) && $_POST['action'] === 'approve' ? 'Approved' : 'Rejected';

    // Update the status of selected rows in the database
    $selectedRows = array_map('intval', $selectedRows);
    // $ids = implode(',', $selectedRows);
    $invoiceId  = implode(',', $selectedRows);


    if( $status == 'Rejected')
    {
        $stmt = $conn->prepare("UPDATE invoice_data44 SET status=?,slot='-' WHERE id=?");
        $stmt->bind_param("si", $status, $invoiceId);
        if ($stmt->execute()) {
            echo "Status updated successfully";
        } else {
            echo "Status update failed: " . $stmt->error;
        }
        $stmt->close();
        //$conn->close();
    }
    else
    {

        $query11 = ("SELECT slotid,slotstatus FROM slotavail where slotstatus=0");

        $result1 = mysqli_query($conn, $query11);
  
                
        $stmt2 = $conn->prepare("SELECT weight FROM invoice_data44 WHERE id=?");
        $stmt2->bind_param("i", $invoiceId);
        if ($stmt2->execute()) {
            $stmt2->bind_result($weightResult);
            if ($stmt2->fetch()) {
                $weight = $weightResult;
            }
        } else {
            echo "Error retrieving weight: " . $stmt->error;
        }
        $stmt2->close();
        $loop=0;
        $slot1="";
        while ($row = mysqli_fetch_assoc($result1))
        {

            if ($row['slotstatus']==0)
            {   
            if($weight <=100)
            {
                        $stmt1 = $conn->prepare("UPDATE slotavail SET slotstatus=1,invoice=? where slotid=?");
                        $stmt1->bind_param("sd", $invoiceId,$row['slotid']);
                        if (!$stmt1) {
                        die("Error: " . $conn->error); // Print the error message if the preparation failed
                        }
                        if($stmt1->execute())
                        { 
                            $slot1=$row['slotid']."".",";


                        // Update the status in the database
                            $stmt = $conn->prepare("UPDATE invoice_data44 SET status=?,slot=? WHERE id=?");
                            $stmt->bind_param("sdi", $status, $slot1, $invoiceId);
                            if ($stmt->execute()) {
                                echo "Status updated successfully";
                            } else {
                                echo "Status update failed: " . $stmt->error;
                            }
                            $stmt->close();
                            //$conn->close();
                            break;
                        }
                }
              elseif($weight > 100 && $weight <= 200)
              {
                if($loop<=1)
                {
            
                        if ($row['slotstatus']==0)
                        {
                        
                        $stmt1 = $conn->prepare("UPDATE slotavail SET slotstatus=1,invoice=? where slotid=?");
                        $stmt1->bind_param("sd" , $invoiceId ,$row['slotid']);
                        if (!$stmt1) {
                            die("Error: " . $conn->error); // Print the error message if the preparation failed
                        }
                        
                        if($stmt1->execute())
                        { 
                            $slot1=$slot1.$row['slotid']."".",";
                            if ($loop==1){

                                // Update the status in the database
                                    $stmt = $conn->prepare("UPDATE invoice_data44 SET status=?,slot=? WHERE id=?");
                                    $stmt->bind_param("ssi", $status, $slot1, $invoiceId);
                                    if ($stmt->execute()) {
                                        echo "Status updated successfully";
                                    } else {
                                        echo "Status update failed: " . $stmt->error;
                                    }
                                    $stmt->close();
                                    //$conn->close();
                                }
                            }
                            // $stmt1.close();
                        }
                        $loop =$loop+1;
                        continue;
                }
                else{
                break;
                }
             }
             elseif($weight > 200 && $weight <= 300)
             {
                 if($loop<=2)
                 {
             
                         if ($row['slotstatus']==0)
                         {
                         
                            $stmt1 = $conn->prepare("UPDATE slotavail SET slotstatus=1,invoice=? where slotid=?");
                            $stmt1->bind_param("sd" , $invoiceId ,$row['slotid']);
                         if (!$stmt1) {
                             die("Error: " . $conn->error); // Print the error message if the preparation failed
                         }
                         
                         if($stmt1->execute())
                         { 
                             $slot1=$slot1.$row['slotid']."".",";
                             if ($loop==2){

                                 // Update the status in the database
                                     $stmt = $conn->prepare("UPDATE invoice_data44 SET status=?,slot=? WHERE id=?");
                                     $stmt->bind_param("ssi", $status, $slot1, $invoiceId);
                                     if ($stmt->execute()) {
                                         echo "Status updated successfully";
                                     } else {
                                         echo "Status update failed: " . $stmt->error;
                                     }
                                     $stmt->close();
                                     //$conn->close();
                                 }
                             }
                             // $stmt1.close();
                         }
                         $loop =$loop+1;
                         continue;
                 }
                 else{
                 break;
                 }
             }
             elseif($weight > 300 && $weight <= 400)
             {
                 if($loop<=3)
                 {
             
                         if ($row['slotstatus']==0)
                         {
                         
                            $stmt1 = $conn->prepare("UPDATE slotavail SET slotstatus=1,invoice=? where slotid=?");
                            $stmt1->bind_param("sd" , $invoiceId ,$row['slotid']);
                         if (!$stmt1) {
                             die("Error: " . $conn->error); // Print the error message if the preparation failed
                         }
                         
                         if($stmt1->execute())
                         { 
                             $slot1=$slot1.$row['slotid']."".",";
                             if ($loop==3){

                                 // Update the status in the database
                                     $stmt = $conn->prepare("UPDATE invoice_data44 SET status=?,slot=? WHERE id=?");
                                     $stmt->bind_param("ssi", $status, $slot1, $invoiceId);
                                     if ($stmt->execute()) {
                                         echo "Status updated successfully";
                                     } else {
                                         echo "Status update failed: " . $stmt->error;
                                     }
                                     $stmt->close();
                                     //$conn->close();
                                 }
                             }
                             // $stmt1.close();
                         }
                         $loop =$loop+1;
                         continue;
                 }
                 else{
                 break;
                 }
             }
             elseif($weight > 400 && $weight <= 500)
             {
                 if($loop<=4)
                 {
             
                         if ($row['slotstatus']==0)
                         {
                         
                            $stmt1 = $conn->prepare("UPDATE slotavail SET slotstatus=1,invoice=? where slotid=?");
                            $stmt1->bind_param("sd" , $invoiceId ,$row['slotid']);
                         if (!$stmt1) {
                             die("Error: " . $conn->error); // Print the error message if the preparation failed
                         }
                         
                         if($stmt1->execute())
                         { 
                             $slot1=$slot1.$row['slotid']."".",";
                             if ($loop==4){

                                 // Update the status in the database
                                     $stmt = $conn->prepare("UPDATE invoice_data44 SET status=?,slot=? WHERE id=?");
                                     $stmt->bind_param("ssi", $status, $slot1, $invoiceId);
                                     if ($stmt->execute()) {
                                         echo "Status updated successfully";
                                     } else {
                                         echo "Status update failed: " . $stmt->error;
                                     }
                                     $stmt->close();
                                     //$conn->close();
                                 }
                             }
                             // $stmt1.close();
                         }
                         $loop =$loop+1;
                         continue;
                 }
                 else{
                 break;
                 }
             }
             elseif($weight>500)
                {
                // echo" You cannot store more than 500 Quientals";
                break;
                }


            }
        }
    }


    // $query = "UPDATE invoice_data44 SET STATUS='$status' WHERE id IN ($ids)";
    // $result = mysqli_query($conn, $query);

    if (!$result) {
      die('Query execution failed: ' . mysqli_error($conn));
    }
  }
}

// Close the database connection
mysqli_close($conn);
?>
