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
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <style>
          .customer_details h1 {
            font-family: 'Fraunces', serif;
            display:flex;
            justify-content:center;
            align-items:center;
          }
          b {
            margin-left:10px;
            margin-right:80px;
          }
          div.details {
            font-size:24px;
            font-family: 'Fraunces', serif;  
            justify-content:space-around;
            text-align:center;
            position:relative;
            
          }
          @keyframes customer {
            from {
                background-color:white;
                /* transform:scale(2); */
            }
            to {
                background-color: lightgreen;
                color:black;
                
            }
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
          div.view_customer_img img {
            width:1518px;
            height:780px;
          }
          div.customer_details {
            /* margin-top:50px; */
            /* border:2px solid lightgreen; */
            /* background-color:rgba(0%, 0%, 100%, 0.75); */
            color:white;
            /* padding:350px; */
            animation-name:customer;
            animation-duration:4s;
            animation-fill-mode:forwards;
          }
          button.transfer {
            margin:auto;
          }
          button {
            background-color:red;
            color:white;
            padding:12px;
            border:none;
            border-radius:5px;
            text-align:center;
            display:block;
            margin:auto;
          }
          select,input {
            width: 300px;
            text-align:center;
            /* padding-top: 10px; */
          }
          
          .fa-input { font-family: FontAwesome, ‘Helvetica Neue’, Helvetica, Arial, sans-serif; }
          form.form {
            border: 1px solid grey;
            /* width:50%; */
            padding:10px;
            margin:30px auto;
            display:none;
          }
          button[type=submit] {
            background-color:purple;
            color:white;
          }
          button[type=submit]:hover {
            background:white;
            color:purple;
            border:1px solid purple;
          }
          footer {
            text-align:center;
            background-color:black;
            color:white;
            position:fixed;
            bottom:0;
            width:100%;
          }
          .modalSuccess {
            background-color:rgba(0,0,0,0.5);
            position:relative;
            top:0;
            height:100vh;
            display:none;
          }
          /* body {
            background-color:rgb(0,0,10);
            opacity:0.9;
          } */
          .myModal {
            width:300px;
            height:270px; 
            background-color:white;
            margin:0px auto;
            border: 1px solid grey;
            padding:10px;
            text-align:center;
            position:relative;
            display:flex;
            flex-direction:column;
            text-align:center;
          }
          .myModal button {
            width:80px;
          }
          .myModal h3 { 
            
            margin-bottom:23px;
            text-align:right;
            position:absolute;
            right:0;
            top:0; 
            float:right;
            /* clear:both; */
            /* display:flex; */
          }
          div.smile {
            margin-top:26px;
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
                <li class="nav-item">
                  <a class="nav-link" href="transaction_history.php">View Transaction History</a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- <div class='container'> -->
            <?php
              include("connect_db.php");
              if(!$conn)
              {
                die("Cannot connect, please try again later!");
              }
              else
              {
                $query="SELECT c.full_name,c.contact,c.email_id,a.account_number,a.current_balance from customer c inner join account a on c.customer_id=a.customer_id where c.customer_id=".$_SESSION['customer_id'];
                $res=mysqli_query($conn,$query);
                if($row=mysqli_fetch_row($res))
                {
                  // echo var_dump($row);
                  $_SESSION['account_number']=$row[3];
                  echo "<div class='customer_details jumbotron  p-4 px-1 mt-5 mx-5 rounded'>";
                  echo "<h1>Welcome ".$row[0]."!</h1>";
                  echo "<div class='details d-flex row'>";
                  echo "<div class='col-md-6'>Account Number: <b>".$row[3]."</b></div>";
                  echo "<div class='col-md-6'>Contact:<b>".$row[1]."</b></div>";
                  echo "</div>";
                  echo "<div class='details d-flex row'>";
                  echo "<div class='col-md-6'>Email ID: <b>".$row[2]."</b></div> ";
                  echo "<div class='col-md-6'>Current Balance: <b>Rs. ".$row[count($row)-1]."</b></div>";
                  echo "</div>";
                  echo "</div>";
                }
              }
            ?>
            <button type="button" onclick="display_transfer_form()">Transfer Money</button>
            
            <form class='form text-center w-50' method="GET">
              <fieldset>
                <div class='form-group'>
                  <?php
                      echo "<label>Reciever's Name: </label><br>";
                      echo "<select name='reciever_account' class='py-1' required>";
                      $sql_query="select c.full_name, a.account_number from customer c inner join account a on c.customer_id=a.customer_id";
                      $res=mysqli_query($conn,$sql_query);
                      while($row=mysqli_fetch_row($res))
                      {
                        echo "<option value='".$row[1]."'>".$row[0]."</option>";
                      }
                      echo "</select>";
                  ?>
                </div>
                <div class="form-group">
                    <label for="money">Amount: </label><br>
                    <input type="text" name="amount" placeholder="e.g. 5000" min="1" required>
                </div>
                <button type="submit" class="btn fa-input btn" name="submit"><i class='far fa-arrow-alt-circle-right'></i>Submit</button> 
              </fieldset>
            </form>
            <?php
              if(isset($_GET))
              {
                if(isset($_GET['submit']))
                {
                  if($_SESSION['account_number']!=$_GET['reciever_account'])
                  {
                    $query="call transaction(".$_GET['amount'].",".$_SESSION['customer_id'].",".$_GET['reciever_account'].")";
                    $res=mysqli_query($conn,$query);
                    if($res)
                    {
                      unset($_GET['amount']);
                      unset($_GET['reciever_account']);
                      echo "<script>alert('Transfer successfull!');</script>";
                      // echo "<script></script>"
                      echo "<script>window.location.href='http://localhost:8080/ritik/Basic%20Banking%20System/View_customer.php'</script>";
                    }
                    else 
                    {
                      // echo "failed!";
                      echo "<script>alert('Transfer Failed!');</script>";
                    }
                  }
                  else
                  {
                    $query="update account set current_balance=current_balance+".$_GET['amount']." where account_number=".$_GET['reciever_account'].";";
                    $query.="insert into transfers(customer_id,reciever_acc_number,amount) values(".$_SESSION['customer_id'].",".$_GET['reciever_account'].",".$_GET['amount'].")";
                    $res=mysqli_multi_query($conn,$query);
                    if($res)
                    {
                      unset($_GET['amount']);
                      unset($_GET['reciever_account']);
                      echo "<script>alert('Transfer successfull!');</script>";
                      // echo "<script></script>"
                      echo "<script>window.location.href='http://localhost:8080/ritik/Basic%20Banking%20System/View_customer.php'</script>";
                    }
                    else 
                    {
                      // echo "failed!";
                      echo "<script>alert('Transfer Failed!');</script>";
                    }
                  }
                }
              }
              
            ?>
            <!-- <script>
              if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, "http://localhost:8080/ritik/Basic%20Banking%20System/View_customer.php" );
              }
            </script> -->
            
            <script>
              function display_transfer_form()
              {
                document.querySelector("form.form").style.display="block";
              }
            </script>
            <footer>&copy; 2017 The Sparks Foundation. All Rights Reserved </footer>
      </body>
</html>
    