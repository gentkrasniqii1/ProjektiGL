<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "tickets_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle ticket purchase
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'purchase') {
    $customer_name = $conn->real_escape_string($_POST['customerName']);
    $customer_email = $conn->real_escape_string($_POST['customerEmail']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $ticket_type = $conn->real_escape_string($_POST['ticketType']);
    $ticket_quantity = (int)$_POST['ticketQuantity'];
    $stadium_section = $conn->real_escape_string($_POST['stadiumSection']);
    $seat_preference = $conn->real_escape_string($_POST['seatPreference']);
    $payment_method = $conn->real_escape_string($_POST['paymentMethod']);
    $total_price = (float)$_POST['totalPrice'];
    $notes = $conn->real_escape_string($_POST['notes']);

    $stmt = $conn->prepare("INSERT INTO tickets (customer_name, customer_email, phone, ticket_type, ticket_quantity, stadium_section, seat_preference, payment_method, total_price, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisdsds", $customer_name, $customer_email, $phone, $ticket_type, $ticket_quantity, $stadium_section, $seat_preference, $payment_method, $total_price, $notes);
    $stmt->execute();
    $stmt->close();

    $_SESSION['success_message'] = "Tickets purchased successfully!";
    header("Location: tickets.php");
    exit;
}

// Check for admin login
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
        $id = (int)$_POST['id'];

        if ($_POST['action'] == 'delete') {
            $stmt = $conn->prepare("DELETE FROM tickets WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();

            $_SESSION['success_message'] = "Ticket deleted successfully!";
            header("Location: tickets.php");
            exit;
        } elseif ($_POST['action'] == 'update') {
            $ticket_type = $conn->real_escape_string($_POST['ticketType']);
            $ticket_quantity = (int)$_POST['ticketQuantity'];
            $total_price = (float)$_POST['totalPrice'];

            $stmt = $conn->prepare("UPDATE tickets SET ticket_type = ?, ticket_quantity = ?, total_price = ? WHERE id = ?");
            $stmt->bind_param("sidi", $ticket_type, $ticket_quantity, $total_price, $id);
            $stmt->execute();
            $stmt->close();

            $_SESSION['success_message'] = "Ticket updated successfully!";
            header("Location: tickets.php");
            exit;
        }
    }
}

// Fetch tickets for admin
$tickets = [];
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
    $result = $conn->query("SELECT * FROM tickets ORDER BY created_at DESC");
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
    <title>Tickets</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        .admin-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .admin-table th, .admin-table td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        .admin-table th { background-color: #f4f4f4; }
        .success-message { color: green; }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['success_message'])): ?>
        <p class="success-message"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></p>
    <?php endif; ?>

    <!-- Ticket Purchase Form -->
    <form method="POST">
        <input type="hidden" name="action" value="purchase">
        <label for="customerName">Your Name</label>
        <input type="text" id="customerName" name="customerName" required>
        <label for="customerEmail">Your Email</label>
        <input type="email" id="customerEmail" name="customerEmail" required>
        <label for="ticketType">Ticket Type</label>
        <select id="ticketType" name="ticketType">
            <option value="standard">Standard - $50</option>
            <option value="vip">VIP - $100</option>
        </select>
        <label for="ticketQuantity">Quantity</label>
        <input type="number" id="ticketQuantity" name="ticketQuantity" min="1" value="1">
        <label for="totalPrice">Total Price</label>
        <input type="number" id="totalPrice" name="totalPrice" value="50" readonly>
        <button type="submit">Purchase</button>
    </form>

    <!-- Admin Dashboard -->
    <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
        <h2>Admin Dashboard</h2>
        <table class="admin-table">
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
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?php echo $ticket['id']; ?></td>
                        <td><?php echo $ticket['customer_name']; ?></td>
                        <td><?php echo $ticket['ticket_type']; ?></td>
                        <td><?php echo $ticket['ticket_quantity']; ?></td>
                        <td>$<?php echo $ticket['total_price']; ?></td>
                        <td>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">
                                <input type="hidden" name="action" value="delete">
                                <button type="submit">Delete</button>
                            </form>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">
                                <input type="hidden" name="action" value="update">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
