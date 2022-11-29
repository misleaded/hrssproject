<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Bookings</title>
</head>
<body>
    <h1><a href = "index.php">Home</a></h1>
    <h2>Room Bookings Page</h2>
    <form action="roombooking.php" method= "post">
        <label for="diseases">Choose a Room:</label>
        <select id="disease" name="disease">
            <option value="aids">HIV / AIDS</option>
            <option value="fever">High Fever</option>
            <option value="cancer">Cancer</option>
            <option value="lovesick">Lovesick</option>
        </select>
        <input type="submit" value="Book now">
    </form>
</body>
</html>