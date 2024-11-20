<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Will Clock</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .sign {
            background-color: #4CAF50; /* Green color typical of safety signs */
            color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 75%;
            width: 100%;
        }

        .sign h1 {
            font-size: 2.5em;
            margin: 0;
            font-weight: bold;
            text-transform: uppercase;
        }

        .sign p {
            font-size: 1.5em;
            margin: 20px 0 0;
        }

        #timer {
            font-size: 4em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="sign">
        <h1>Days Since Will's Last Networking Accident</h1>
        <p id="timer">0 Days, 0 Hours</p>
    </div>

    <script>
        // Fetching the PHP generated days and hours
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

        const daysSinceLastAccident = <?php echo $days; ?>;
        const hoursSinceLastAccident = <?php echo $hours; ?>;
        document.getElementById('timer').innerText = `${daysSinceLastAccident} Days, ${hoursSinceLastAccident} Hours`;
    </script>
</body>
</html>
