<?php
require '../php/connect.php';

function moveImage($source, $destination) {
    return move_uploaded_file($source, $destination);
}

function checkChanges($conn, $productID, &$productName, &$category, &$newImage1, &$newImage2, &$newImage3) {
    $sql = "SELECT name, category, image, image2, image3 FROM products WHERE idProduct=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $oldProductName = $row['name'];
    $oldCategory = $row['category'];
    $oldImage1 = $row['image'];
    $oldImage2 = $row['image2'];
    $oldImage3 = $row['image3'];

    $newImage1 = isset($_FILES["newProductImage1"]) && $_FILES["newProductImage1"]["size"] > 0 ? "../interface/images/" . basename($_FILES["newProductImage1"]["name"]) : $oldImage1;
    $newImage2 = isset($_FILES["newProductImage2"]) && $_FILES["newProductImage2"]["size"] > 0 ? "../interface/images/" . basename($_FILES["newProductImage2"]["name"]) : $oldImage2;
    $newImage3 = isset($_FILES["newProductImage3"]) && $_FILES["newProductImage3"]["size"] > 0 ? "../interface/images/" . basename($_FILES["newProductImage3"]["name"]) : $oldImage3;

    if ($productName === $oldProductName) {
        $productName = $oldProductName;
    }

    if ($category === $oldCategory) {
        $category = $oldCategory;
    }

    // Di chuyển file ảnh mới vào thư mục mong muốn
    moveImage($_FILES["newProductImage1"]["tmp_name"], $newImage1);
    moveImage($_FILES["newProductImage2"]["tmp_name"], $newImage2);
    moveImage($_FILES["newProductImage3"]["tmp_name"], $newImage3);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['productID'], $_POST['productName'], $_POST['category'])) {
        $productID = $_POST['productID'];
        $productName = $_POST['productName'];
        $category = $_POST['category'];

        if (!empty($productName) && !empty($category)) {
            $newImage1 = $newImage2 = $newImage3 = "";
            checkChanges($conn, $productID, $productName, $category, $newImage1, $newImage2, $newImage3);

            $sql = "UPDATE products SET name=?, category=?, image=?, image2=?, image3=? WHERE idProduct=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $productName, $category, $newImage1, $newImage2, $newImage3, $productID);

            if ($stmt->execute()) {
                echo "Thông tin sản phẩm đã được cập nhật thành công.";
            } else {
                echo "Lỗi khi cập nhật thông tin sản phẩm.";
            }
            $stmt->close();
        } else {
            echo "Tên sản phẩm và danh mục là bắt buộc.";
        }
    } elseif (isset($_POST['deleteProductID'])) {
        $productID = mysqli_real_escape_string($conn, $_POST['deleteProductID']);

        $sql = "DELETE FROM products WHERE idProduct=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productID);
        if ($stmt->execute()) {
            echo "Sản phẩm đã được xóa thành công";
        } else {
            echo "Lỗi khi xóa sản phẩm.";
        }
        $stmt->close();
    } else {
        header("Location: http://localhost/Gr9-Web/admin/products.php");
        exit();
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
$conn->close();
?>
