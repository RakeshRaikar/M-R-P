
<?php
      // MySQL database credentials


      $servername = 'localhost';
      $username = 'root';
      $password = '';
      $dbname = 'clients123';
      $conn = new mysqli($servername, $username, $password, $dbname);
      

      // Check connection
      if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
      }
      $query = "SELECT image_link,crop,price FROM crops123"; // Replace "crops_table" with the actual table name in your database
      $result = $conn->query($query);

      $dataArray = array();
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $dataArray[] = $row;
        }
    }
      ?>
     
     
      <html>
    <head>
       
       
        <style>
            *{
                margin: 0px;
                padding:0px;
                box-sizing: border-box;
                font-family: sans-serif;
            }
            body
            {
                 background-color:#c5c6c7;
                background-size: cover;
            }
            .wrapper{
                width: 100%;
                height: 70%;
                justify-content: center;
                position:absolute;
                
                display: flex;
                border-spacing: 10px;
                margin-top: 0px;
                
            }
            img
            {
                
                
               
                width: 100;
                height: 75;
                border: 1px solid black;
               
            }
            td
            {
                background: #1b93ab;
                text-align: center;
               
              
              
                
                /* padding: 57px; */
            }
            
           
            table
            {
                border-style: double;
                
                border-spacing: 3px;
                
               
                width: 80%;
               
                margin-top: 70px;
                border-collapse: separate;
                
                
            }
            #field1
            {
                width: 90px;
                text-align: center;
                font-size: 15px;
            }
            #field2
            {
                width: 20px;
                text-align: center;
                font-size: 15px;
               
            }
            #field0
            {
                height: 140px;
                font-weight: bold;
            }
            </style>
    </head>
    <body>
        <div class="wrapper">
                 
            <!-- Loop through the fetched data and populate the table rows
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td><img src="' . $row['image_link'] . '></td>';
                echo '<td>' . $row['crop'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '</tr>';
            }
            ?> -->
            <table border="1">
                    <TR id="field0">
                        <TD rowspan="2" >Crops </Td>
                        <TD><img src="areca.jpg" ></TD>
                    <TD><img src="ginger.jpg" ></TD>
                    <TD><img src="maize.jpg" ></TD>
                    <TD><img src="millet.jpg" ></TD>
                    <TD><img src="paddy.jpg" ></TD>
                    <TD><img src="pepper.jpg"   ></TD>
                        
                    </TR>
                    <tr>
                    <?php foreach ($dataArray as $data): ?>
                    <TD><input type="text" id="field1" placeholder="<?php echo $data['crop']; ?>"></TD>
                    <?php endforeach; ?>
                    <tr>
                    <TD style=" font-weight: bold;">Price Per Month</Td>
              
                    <?php foreach ($dataArray as $data): ?>
                        <TD><input type="text" id="field2" placeholder="<?php echo $data['price']; ?>">rs/quintal</TD>
                    <?php endforeach; ?>
                    </tr>
                </table>
                 
                 
         </div>
    </body>
</html>