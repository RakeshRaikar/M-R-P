<?php
// MySQL database credentials

$servername = 'localhost:8080';
$username = 'root';
$password = '';
$dbname = 'clients123';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM invoice_data44 WHERE id = '$id' AND STATUS='Approved'";
    $result = mysqli_query($conn, $query);
    
   
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $Email = $row['name'];
        $sql = "SELECT * FROM users123 where uname= '$Email'";
        $userResult = mysqli_query($conn, $sql);
        // Display tde selected row's details here
        if ($userResult) {
            $userRow = mysqli_fetch_assoc($userResult);
            // Now you can use $userRow to access user details
        } else {
            echo 'Error retrieving user data.';
        }
    } else {
        echo 'Error retrieving data.';
    }
    
}

// Close tde database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
    <style>
body {
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
            background-color: #f0f0f0;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
           

        }

        table {
            margin-left: 15%;
            border-collapse: collapse;
            width: 70%;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 2px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #333;
            border-right: 1px solid #333;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .customer-details {
            font-weight: bold;
            border-bottom: none;
        }

        .invoice-number {
            text-align: center;
        }

        .crop-details
        {
            font-weight: bold;
        }
        

        .crop-details td:last-child {
            border-right: none;
        }

        .total-column {
            text-align: right;
        }

        .total-column  {
            font-weight: bold;
        }
        .customer td
        {
            border-bottom: none;
        }
        .customer-hed
        {
           
         
            border-right: none;
        }
        .column{
            font-weight: bold;

        }
        .btn-print
        {
            display: inline-block;
            padding: 3px 20px;
            background-color: black;
            color: #FFF;
            border-radius: 30px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
            position: absolute;
            left: 45.1%;
            margin: 20px;
          
        }
       
        @media print {
    body *:not(#my-section):not(#my-section *) {
        visibility: hidden;
    }
   
  .btn-print {
    display: none;
  }

  @media print {
    .btn-print {
      display: none;
    }
  }


    #my-section {
       
        left: 20;
        
            background-size: cover;
            .btn-container {  
                justify-content: center; 
              }
              
        
    }
  }

    </style>

</head>
<body>
<section id="my-section">
    <?php if (isset($row)) : ?>
     
    <h2>INVOICE </h2>
    <table>
        <tr class="invoice-number">
      
        <td class="column">Invoice Number:</td>
        <td  ><?php echo $row['id']; ?></td>
        <td class="column">Slot Id:</td>
       <?php $slot = rtrim($row['slot'], ","); ?>
         <td> <?php echo $slot; ?></td>
        
        </tr>
        <td colspan="4" class="customer-details">Customer Details:</td>


        <tr class="customer">  <td class="customer-hed">Name :</td> <td colspan="3"><?php echo $userRow['uname']; ?></td>   </tr>
        <tr class="customer">   <td class="customer-hed">  Phone :  </td>  <td colspan="3"><?php echo $userRow['Phone']; ?></td></tr>
        <tr class="customer">    <td class="customer-hed">Address :</td> <td colspan="3"><?php echo $userRow['address']; ?></td></tr>
        <tr >   <td  class="customer-hed">Email :</td><td colspan="3"> <?php echo $userRow['email']; ?></td></tr>
        <tr class="crop-details">
            <td>Crop</td>
            <td>Weight</td>
            <td>Period</td>
            <td class="total-column">Total Amount</td>
            
        </tr>
        <tr class="crop-details2">
            
           
            <td><?php echo $row['crop']; ?></td>
            <td><?php echo $row['weight']; ?>  Quintals</td>
            <td><?php echo $row['period']; ?>  Months</td>
            <td class="total-column">Rs. <?php echo $row['total_amount']; ?></td>
            
        </tr>
    </table>
    <?php endif; ?>
    <div class="btn-container">
  <button class="btn btn-print" onclick="window.print()">Print</button>
</div>
</section>
</body>
</html>
