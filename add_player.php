<?php
require 'db.php';

// Add Player
if (isset($_POST['add_player'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $surname = $conn->real_escape_string($_POST['surname']);
    $age = intval($_POST['age']);
    $group_age = $conn->real_escape_string($_POST['group_age']);
    $position = $conn->real_escape_string($_POST['position']);
    $email = $conn->real_escape_string($_POST['email']);

    $query = "INSERT INTO players (name, surname, age, group_age, position, email) 
              VALUES ('$name', '$surname', '$age', '$group_age', '$position', '$email')";
    
    if ($conn->query($query) === TRUE) {
        echo "Player added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Player</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Add New Player</h2>
    <form action="add_player.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Surname:</label>
        <input type="text" name="surname" required>
        <label>Age:</label>
        <input type="number" name="age" required>
        <label>Group Age:</label>
        <select name="group_age" required>
            <?php for ($i = 11; $i <= 21; $i++) { ?>
                <option value="U<?php echo $i; ?>">U<?php echo $i; ?></option>
            <?php } ?>
        </select>
        <label>Position:</label>
        <select name="position" required>
            <?php 
            $positions = ["goalkeeper", "LB", "CB", "RB", "CDM", "CM", "RMF", "LMF", "AMF", "LWF", "RWF", "SS", "CF"];
            foreach ($positions as $pos) { ?>
                <option value="<?php echo $pos; ?>"><?php echo strtoupper($pos); ?></option>
            <?php } ?>
        </select>
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit" name="add_player">Add Player</button>
    </form>
</body>
</html>
