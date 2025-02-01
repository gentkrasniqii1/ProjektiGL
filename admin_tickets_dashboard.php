<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "tickets_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Update and Delete Actions
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $id = (int)$_POST['id'];

    if ($_POST['action'] == 'delete') {
        // Delete ticket
        $stmt = $conn->prepare("DELETE FROM tickets WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Ticket deleted successfully!";
        } else {
            $_SESSION['error_message'] = "Failed to delete ticket: " . $stmt->error;
        }
        $stmt->close();
    } elseif ($_POST['action'] == 'update') {
        // Update ticket
        $ticket_type = $conn->real_escape_string($_POST['ticketType']);
        $ticket_quantity = (int)$_POST['ticketQuantity'];
        $total_price = (float)$_POST['totalPrice'];

        $stmt = $conn->prepare("UPDATE tickets SET ticket_type = ?, ticket_quantity = ?, total_price = ? WHERE id = ?");
        $stmt->bind_param("sidi", $ticket_type, $ticket_quantity, $total_price, $id);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Ticket updated successfully!";
        } else {
            $_SESSION['error_message'] = "Failed to update ticket: " . $stmt->error;
        }
        $stmt->close();
    }

    header("Location: tickets_dashboard.php");
    exit;
}

// Fetch tickets
$tickets = [];
$result = $conn->query("SELECT * FROM tickets ORDER BY created_at DESC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
     <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 20px;
    text-align: center;
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

.success-message {
    color: green;
    font-weight: bold;
}

.error-message {
    color: red;
    font-weight: bold;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

th {
    background-color: #007bff;
    color: white;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

form {
    display: inline-block;
    margin: 5px;
}

input[type="text"], input[type="number"] {
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.delete-btn {
    background-color: #dc3545;
    color: white;
}

.delete-btn:hover {
    background-color: #c82333;
}

.update-btn {
    background-color: #28a745;
    color: white;
}

.update-btn:hover {
    background-color: #218838;
}

.logout-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 15px;
    background-color: #ff5733;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.logout-btn:hover {
    background-color: #e04e2c;
}

        </style>
</head>
<body>

    <h1>Admin Ticket Dashboard</h1>

    <!-- Display Success or Error Messages -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <p class="success-message"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></p>
    <?php endif; ?>
    <?php if (isset($_SESSION['error_message'])): ?>
        <p class="error-message"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></p>
    <?php endif; ?>

    <!-- Tickets Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Ticket Type</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tickets)): ?>
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?php echo $ticket['id']; ?></td>
                        <td><?php echo $ticket['customer_name']; ?></td>
                        <td><?php echo $ticket['ticket_type']; ?></td>
                        <td><?php echo $ticket['ticket_quantity']; ?></td>
                        <td>$<?php echo $ticket['total_price']; ?></td>
                        <td>
                            <!-- Delete Button -->
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">
                                <input type="hidden" name="action" value="delete">
                                <button class="delete-btn" type="submit">Delete</button>
                            </form>

                            <!-- Update Form -->
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">
                                <input type="hidden" name="action" value="update">
                                <input type="text" name="ticketType" value="<?php echo $ticket['ticket_type']; ?>" required>
                                <input type="number" name="ticketQuantity" value="<?php echo $ticket['ticket_quantity']; ?>" min="1" required>
                                <input type="number" name="totalPrice" value="<?php echo $ticket['total_price']; ?>" step="0.01" required>
                                <button class="update-btn" type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No tickets found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a class="logout-btn" href="logout.php">Logout</a>

</body>
</html>
<?php $conn->close(); ?>
