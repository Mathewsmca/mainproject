<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header('Location: index.php');
}
if ($_SESSION['userdata']['is_admin'] == 1) {
    include('header.php');
    echo '<header>
  <nav  class="navbar navbar-expand-lg">
      <a class="navbar-brand nos" href="#">Go<span class="gree">Cab</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fas fa-bars logo text-dark"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            
              <li class="nav-item rbtn">
                  <a class="btn" href="admin.php">Dashboard</a>
                  <a class="btn" href="logout.php">Logout</a>
              </li>
          </ul>
      </div>
  </nav>
</header>';
    echo '<h1 class="text-center text-weight-bold text-dark">ADMIN is not allowed in user area</h1>';
} else {
    $id = $_SESSION['userdata']['user_id'];
    include('user.php');

    include('header.php');

    include('navs.php');

    include('ussidebar.php'); ?>
    <style>
/* Style the container */
.container {
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 10px;
}

/* Style the input fields */
input[type=number] {
  padding: 10px;
  margin: 5px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the form labels */
label {
  display: inline-block;
  width: 150px;
  text-align: right;
  margin-right: 10px;
}

/* Style the result div */
#result {
  font-size: 18px;
  margin-top: 20px;
}


</style>
    <div class="row ">




    </div>

    </div>

    <div class="row pt-4">
    <form id="fare-prediction-form">
        <label for="distance">Distance:</label>
        <input type="number" id="distance" name="distance" min="0"><br><br>

        <label for="time_of_day">Time of day (24-hour format):</label>
        <input type="number" id="time_of_day" name="time_of_day" min="1" max="24"><br><br>

        <label for="day_of_week">Day of week (1-7):</label>
        <input type="number" id="day_of_week" name="day_of_week" min="1" max="7"><br><br>

        <input type="submit" value="Predict Fare">
        
    <div id="result"></div>
    </form>

    </div>

    </div>

    <?php

    if (isset($_SESSION['book'])) {
        unset($_SESSION['book']);
    }

    include('adfoot.php');
} ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
            $('#fare-prediction-form').submit(function(event) {
                event.preventDefault();
                var distance = $('#distance').val();
                var time_of_day = $('#time_of_day').val();
                var day_of_week = $('#day_of_week').val();

                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:5000/predict',
                    data: JSON.stringify({
                        distance: distance,
                        time_of_day: time_of_day,
                        day_of_week: day_of_week
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        $('#result').text("The fare prediction for the trip is ₹" + response.fare_prediction.toFixed(2));
                        console.log(response);
                    }
                });
            });
        });
    </script>