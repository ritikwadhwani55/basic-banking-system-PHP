<?php
  session_start();
?>
<!Doctype html>
<html>
    <head>
        <title>Sparks Foundation Bank</title>
        <meta name='viewport' content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <style>
          footer {
            text-align:center;
            background-color:black;
            color:white;
            position:scroll;
            bottom:0;
            width:100%;
          }
          a.navbar-brand>img {
              width:40px;
              height:45px;
              
          }
          a.navbar-brand {
              font-size:24px;
              font-family: 'Balsamiq Sans', cursive;
          }
          nav.navbar {
                background-color:rgb(0, 255, 42);
          }
          table.table {
            margin-top:25px;
            width:80%;
            text-align:center;
            margin:40px auto;
          }
          table.table th {
            background-color:black;
            color:white;
            /* padding:5px; */
            /* margin:5px; */
          }
          table.table td {
            background-color:yellow;
            color:black;
            font-weight:bold;
            /* padding:5px; */
            /* margin:5px; */
          }
          table.table:not(:first-child) {
            background-color:white;
            color:black;
            font-weight:bold;
            /* padding:5px; */
            /* margin:5px; */
          }
          div.view_cust {
            /* text-align:center; */
          }
          label {
            font-family: 'Balsamiq Sans', cursive;
          }
          li#active {
            color:black;
            font-weight:bold;
          }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-warning">
            <a class="navbar-brand" href="HomePage.php"><img src="images/1533219594764.jfif">&nbsp;Sparks Foundation Bank</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="HomePage.php"><i class='fas fa-house-user' style="font-size:20px;margin:2px;"></i>Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" id="active">
                  <a class="nav-link" href="view_all_customers.php">View All Customers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="transaction_history.php">View Transaction History</a>
                </li>
              </ul>
            </div>
          </nav>
          <?php
            include("connect_db.php");
            if(!$conn)
            {
              die("Cannot connect, please try again later!");
            }
            else
            {
              $query="select * from customer";
              $res=mysqli_query($conn,$query);
              if($res)
              {
                // echo var_dump($row);
                echo "<table class='table table-bordered'>";
                echo "<tr>";
                echo "<th>Full Name</th>";
                echo "<th>Age</th>";
                echo "<th>Gender</th>";
                echo "<th>Address</th>";
                echo "<th>Email ID</th>";
                echo "<th>Contact</th>";
                echo "</tr>";
                // echo "</table>";
                $details=mysqli_fetch_all($res);
                for($record=0;$record<count($details);$record++)
                {  
                  echo "<tr>";
                  for($col=0;$col<count($details[0])-1;$col++)
                  {
                    echo "<td>".$details[$record][$col+1];
                  }
                  echo "</tr>";
                }
                echo "</table>";
                echo "<form method='POST'>";
                echo "<div class='view_cust text-center'>";
                echo "<label>Select the Customer to View Details:&nbsp;&nbsp;</label>";
                echo "<select name='customer_name'>";
                for($row=0;$row<count($details);$row++)
                {
                  echo "<option value='".$details[$row][0]."'>".$details[$row][1]."</option>";
                }
                echo "</select>";
                echo "<input type='submit' name='submit' class='btn btn-danger d-block mx-auto my-2'>";
                echo "</form>";
                
            }
          }
          
            // echo '<div class="select">Select any Customer you want:';
                
            
            // echo "<select name='customer_name'>";
            // for($row1=0;$row1<count($row);$row1++)
            // {
            //   echo "<option value='".$row[$row1][0]."'>".$row[$row1]['full_name']."</option>";
            // }  
            // echo "</select>";
            // echo "</div>";
            // var_dump($row);
        ?>
         <?php
              if(isset($_POST['submit']))
              {
                if(isset($_POST))
                {
                  $_SESSION['customer_id']=$_POST['customer_name'];  
                  echo "<script>window.location.href='http://localhost:8080/ritik/Basic%20Banking%20System/View_customer.php'</script>"; 
                }
              }
              
          ?> 
          <footer>&copy; 2017 The Sparks Foundation. All Rights Reserved </footer>
    </body>
</html>