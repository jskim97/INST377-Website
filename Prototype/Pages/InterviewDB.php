<!DOCTYPE html>
<html lang="en">
<head>
  <title>Interview Tips </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="./css/bootstrap.css" rel="stylesheet" />
  <link href="./css/bootstrap-responsive.css" rel="stylesheet" />
  <link href="./css/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="./css/jcarousel.css" rel="stylesheet" />
  <link href="./css/flexslider.css" rel="stylesheet" />
  <link href="./css/style.css" rel="stylesheet" />
  <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
  <style>
  table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
  }

  td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }

  body, html {
  height: 90%;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("./Pictures/Interviewing.jpg");

  /* Add the blur effect */
  filter: blur(2px);
  -webkit-filter: blur(2px);

  /* Full height */
  height: 70%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 2px solid #f1f1f1;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  position: absolute;
  z-index: 2;
  width: 80%;
  height: 30%;
  padding: 20px;
  text-align: center;
}
  </style>
</head>
<body>


<div class="bg-image"></div>
<div class="bg-text">
  <h1><p style="color:White;"><b>Interview Resources</b></p></h1>
  <p>Our personal list of resources to help ace your next interview!</p>
</div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="./Home.html"><p style="color:White;">Home</p></a></li>
        <li><a href="./About.html"><p style="color:White;">About</p></a></li>
        <li><a href="./Careers.php"><p style="color:White;">Career and Internship Database</p></a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:White;"> Interview Resources
        <span class="caret"></span></a>
         <ul class="dropdown-menu">
          <li><a href="./Interview.html">Tips</a></li>
          <li class="active"><a href="./InterviewDB.php">Interview Resource Database</a></li>
        </ul>
      </li>

        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:White;"> Resume and Cover Letter Resources
        <span class="caret"></span></a>
         <ul class="dropdown-menu">
          <li><a href="./Resume.html">Tips</a></li>
          <li><a href="./ResumeDB.php">Resume and Cover Letter Resource Database</a></li>
        </ul>
      </li>

      <li><a href="./Contact.html"><p style="color:White;">Contact Us</p></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h2><b>Interview Resource Database</b></h2>
  <p><b>Type in the search bar to filter out results (e.g. "50 questions to prepare for"):</b></p>

  <input id="myInput" type="text" placeholder="Search..">
  <br><br>
  <div class="panel panel-default">
  <table class="table">
    <thead>
      <tr>
        <th>Resource</th>
        <th>Website Link</th>
      </tr>
    </thead>
    <tbody id ="myTable">
      <?php // query.php
        $conn = new mysqli("localhost", "root", "st0rywr1ter", "newDb");
        if ($conn->connect_error) die($conn->connect_error);
          $query = "SELECT `Resources`.Resource_Name, `Links`.Link FROM `Resources` INNER JOIN `Links` ON `Resources`.Links_Link_Id=`Links`.Link_Id;";
          $result = $conn->query($query);
        if (!$result) die($conn->error);
          $rows = $result->num_rows;
        for ($j = 0 ; $j < $rows ; ++$j)
        {
          $result->data_seek($j);
          echo '<tr>';
          echo '<td>' . $result->fetch_assoc()['Resource_Name'] . '</td>';
          $result->data_seek($j);
          echo '<td> ' . $result->fetch_assoc()['Link'] . '</td>';
          echo '</tr>';
        }
        $result->close();
        $conn->close();
      ?> 
    </tbody>
  </table>
</div>
</div>
<footer>
      <div class="container">
        <div class="row">
          <div class="span5">
            <div class="widget">
              <h5 class="widgetheading">Browse pages</h5>
              <ul class="link-list">
                <li><a href="./Home.html">Home</a></li>
                <li><a href="./About.html">About</a></li>
                <li><a href="./Careers.php">Career & Internship Database</a></li>
                <li><a href="./Interview.html">Interview Tips</a></li>
                <li><a href="./InterviewDB.php">Interview Resources Database</a></li>
                <li><a href="./Resume.html">Resume and Cover Letter Tips</a></li>
                <li><a href="./ResumeDB.php">Resume and Cover Letter Resources Database</a></li>
                <li><a href="./Contact.html">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</footer>
</body>
</html>
