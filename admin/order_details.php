<?php
include_once "../php/connect.php";

$orderID = isset($_GET['order_id']) ? $_GET['order_id'] : null;

if ($orderID === null) {
    echo "Order ID is not provided.";
    exit;
}

$sql = "SELECT oi.quantity, oi.unit_price, p.image, p.name AS product_name
        FROM order_items oi
        INNER JOIN products p ON oi.product_id = p.idProduct
        WHERE oi.order_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo "Failed to prepare statement: " . $conn->error;
    exit;
}

$stmt->bind_param("i", $orderID);
$stmt->execute();
$result = $stmt->get_result();

echo '<div class="container">';
echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>S.N.</th>';
echo '<th>Product Image</th>';
echo '<th>Product Name</th>';
echo '<th>Quantity</th>';
echo '<th>Unit Price</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

$count = 1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $count . '</td>';
        echo '<td><img height="80px" src="' . $row["image"] . '"></td>';
        echo '<td>' . $row["product_name"] . '</td>';
        echo '<td>' . $row["quantity"] . '</td>';
        echo '<td>' . $row["unit_price"] . '</td>';
        echo '</tr>';
        $count++;
    }
} else {
    echo '<tr><td colspan="5">No items found</td></tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div>';

$stmt->close();
$conn->close();
?>
