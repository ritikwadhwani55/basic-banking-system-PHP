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
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <style>
          footer {
            text-align:center;
            background-color:black;
            color:white;
            position:fixed;
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
          div.transaction_details th {
            background-color:black;
            color:white;

          }
          div.transaction_details tr {
            background-color:yellow;
            color:black;
            font-weight:bold;
            text-align:center;
            border-collapse:collapse;
            font-size: 17px;
          }
          li#active {
            color:black;
            font-weight:bold;
          }
         </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow">
            <a class="navbar-brand" href="HomePage.php"><img src="images/1533219594764.jfif">&nbsp;Sparks Foundation Bank</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="HomePage.php"><i class='fas fa-house-user' style="font-size:20px;margin:2px;"></i>Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="view_all_customers.php">View All Customers</a>
                </li>
                <li class="nav-item"  id="active">
                  <a class="nav-link" href="transaction_history.php">View Transaction History</a>
                </li>
              </ul>
            </div>
          </nav>
          <div class="transaction_details m-4">
            <table class="table table-bordered w-75 m-auto">
              <tr>
                <!-- <th>Sr No.</th> -->
                <th>Sender</th>
                <th>Reciever</th>
                <th>Transfer Amount</th>
              </tr>
              <?php
                include("connect_db.php");
                
                $sql="select c.full_name,cust.full_name,t.amount from transfers t inner join customer c on t.customer_id=c.customer_id inner join account a on t.reciever_acc_number=a.account_number inner join customer cust on a.customer_id=cust.customer_id order by t.transfer_id desc;";
                $res=mysqli_query($conn,$sql);
                // $count=0;
                while($row=mysqli_fetch_row($res))
                {
                  echo "<tr>";
                  // $count++;
                  // echo "<td>".$count."</td>";
                  echo "<td>".$row[0]."</td>";
                  echo "<td>".$row[1]."</td>";
                  echo "<td>&#8377; ".$row[2]."</td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div>
          <footer>&copy; 2017 The Sparks Foundation. All Rights Reserved </footer>
</body>
</html>