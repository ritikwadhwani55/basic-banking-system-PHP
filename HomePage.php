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
              color:black;
          }
          nav.navbar {
                /* background-color:rgb(0, 255, 42); */
                /* background-color:black; */
                color:black;
          }
          div.title {
              /* background-color:grey; */
              text-align:center;
              font-size:50px;
              font-family: 'Balsamiq Sans', cursive;
          }
          div.title img {
              height:710px;
              width:1515px;
          }
          li .nav-link {
            color:black;
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
                <li class="nav-item active">
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
          <div class="title">
                <img src="images/21_04_15_61749023_mobilebanking.jpg">
          </div>
          <footer>&copy; 2017 The Sparks Foundation. All Rights Reserved </footer>
    </body>
</html>