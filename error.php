<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>One User Allowed</title>
    <style>
      body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
        font-size: 18px;
        line-height: 1.5;
        text-align: center;
        padding: 50px;
      }
      
      h1 {
        font-size: 36px;
        margin-bottom: 50px;
      }
      
      p {
        margin-bottom: 30px;
      }
      
      .countdown {
        font-size: 24px;
        color: #f00;
      }
    </style>
  </head>
  
  <body>
    <h1>Sorry, Only One User Allowed</h1>
    
    <p>Please try again after 30 minutes.</p>
    
    <p class="countdown">Countdown: <span id="countdown"></span></p>
    
    <script>
      // Set the countdown time (30 minutes in milliseconds)
      var countdownTime = 30 * 60 * 1000;
      
      // Get the current date and time
      var now = new Date().getTime();
      
      // Calculate the end time of the countdown
      var endTime = now + countdownTime;
      
      // Update the countdown every second
      var countdownInterval = setInterval(function() {
        // Get the current date and time
        var now = new Date().getTime();
        
        // Calculate the time remaining
        var timeRemaining = endTime - now;
        
        // Calculate the minutes and seconds remaining
        var minutesRemaining = Math.floor(timeRemaining / (1000 * 60));
        var secondsRemaining = Math.floor((timeRemaining % (1000 * 60)) / 1000);
        
        // Format the countdown display
        var countdownDisplay = minutesRemaining + "m " + secondsRemaining + "s";
        
        // Update the countdown display
        document.getElementById("countdown").innerHTML = countdownDisplay;
        
        // Stop the countdown when the time is up
        if (timeRemaining <= 0) {
          clearInterval(countdownInterval);
        }
      }, 1000);
    </script>
  </body>
</html>
