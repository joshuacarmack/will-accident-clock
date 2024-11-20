<?php
// Configuration file path
$configFile = 'last_accident_time.txt';

// Read the timestamp from the configuration file
if (file_exists($configFile)) {
    $lastAccidentTime = file_get_contents($configFile);
} else {
    die('Configuration file not found. Please create "last_accident_time.txt" and add a valid timestamp.');
}

// Ensure the timestamp is valid
if (!$lastAccidentTime || !strtotime($lastAccidentTime)) {
    die('Invalid timestamp in configuration file. Please enter a valid datetime in the format "Y-m-d H:i:s".');
}

// Calculate the time difference
$currentTime = new DateTime();
$accidentTime = new DateTime($lastAccidentTime);
$interval = $accidentTime->diff($currentTime);

// Extract days and hours from the interval
$days = $interval->days;
$hours = $interval->h;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days Since Will's Last Networking Accident</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .counter {
            text-align: center;
            background: #fff;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .counter h1 {
            font-size: 2em;
            margin: 0 0 10px;
        }
        .counter p {
            font-size: 1.5em;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="counter">
        <h1>Days Since Will's Last Networking Accident</h1>
        <p><?php echo $days; ?> Days, <?php echo $hours; ?> Hours</p>
    </div>
</body>
</html>
