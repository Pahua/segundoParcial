<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Segundo Proyecto Parcial" content="">
    <meta name="Paulina Cruz y Corro Pérez" content="">

    <title>.:: Día de Muertos ::.</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

</head>

<body id="page-top">


<?php

$connection = mysql_connect('localhost', 'segundoParcial', 'segundoParcial'); //The Blank string is the password
mysql_select_db('segundoParcial');

$query = "SELECT * FROM signups"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table style='border: solid 1px black;'>"; // start a table tag in the HTML
echo "<tr><th>ID</th><th>Email</th></tr>";

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['signups_id'] . "</td><td>" . $row['signup_email_address'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</td>";
echo "</table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection

?>


 <div class="container" id="footer">
          <hr>
              <div class="text-center center-block">
                  <br />
                    <a href="https://twitter.com/Pahua"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
                    <a href="https://plus.google.com/u/0/114477624237480563130"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                    <a href="mailto:pahua13@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                    <a href="https://github.com/pahua"><i id="social-em" class="fa fa-git-square fa-3x social"></i></a>
                    <p class="txt-railway">-  Copyright &copy; PAULINA CRUZ Y CORRO PÉREZ 2015 -</p>
              </div>
       </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>