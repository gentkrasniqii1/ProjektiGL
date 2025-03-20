<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login_players.php");
    exit();
}

include 'db.php';

// Fetch all players
$query = "SELECT * FROM players ORDER BY group_age, name";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            margin: 0 5px;
        }
        a:hover {
            color: #0056b3;
        }
        .logout {
            display: inline-block;
            background: #dc3545;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .logout:hover {
            background: #c82333;
        }
        .btn-add {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn-add:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
    <a href="auth.php?logout=true">Logout</a>
    <h2>Players List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Group Age</th>
            <th>Position</th>
            <th>Email</th>
            <th>Actions</th>
            
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['surname']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo strtoupper($row['group_age']); ?></td>
            <td><?php echo $row['position']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="add_player.php?id=<?php echo $row['id']; ?>">Add Players</a>
                <a href="update_player.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_player.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
