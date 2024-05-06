    <?php
    include '../php/connect.php'; // Kết nối đến cơ sở dữ liệu
    include '../php/check_session.php';

    // Thêm giỏ hàng mới cho người dùng hiện tại
    function addNewCart($iduser) {
        global $conn;
        $insert_cart_query = "INSERT INTO carts (iduser) VALUES (?)";
        $stmt = mysqli_prepare($conn, $insert_cart_query);
        mysqli_stmt_bind_param($stmt, "i", $iduser);
        if(mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }

    // Lấy ID giỏ hàng của người dùng
    function getCartIdByUserId($iduser) {
        global $conn;
        $cart_id = null;
        $select_cart_query = "SELECT cart_id FROM carts WHERE iduser = ?";
        $stmt = mysqli_prepare($conn, $select_cart_query);
        mysqli_stmt_bind_param($stmt, "i", $iduser);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $cart_id = $row['cart_id'];
        }
        return $cart_id;
    }

    // Thêm một mục vào giỏ hàng
    function addItemToCart($iduser, $idProduct, $quantity) {
        global $conn;
        
        // Kiểm tra xem đã có giỏ hàng cho người dùng chưa
        $cart_id = getCartIdByUserId($iduser);
        
        // Nếu không có giỏ hàng, thêm một giỏ hàng mới
        if ($cart_id === null) {
            // Thêm giỏ hàng mới
            if(!addNewCart($iduser)) {
                // Nếu thêm giỏ hàng mới không thành công, return false
                return false;
            }
            $cart_id = getCartIdByUserId($iduser);
        }

        // Thêm một mục vào giỏ hàng
        $insert_item_query = "INSERT INTO cart_items (cart_id, idProduct, quantity) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_item_query);
        mysqli_stmt_bind_param($stmt, "iii", $cart_id, $idProduct, $quantity);
        if(mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }

    // Lấy tất cả các mục trong giỏ hàng của một người dùng
    function getAllCartItems($iduser) {
        global $conn;
        $select_items_query = "SELECT cart_items.*, products.name AS product_name, products.price, products.image AS product_img FROM cart_items INNER JOIN products ON cart_items.idProduct = products.idProduct INNER JOIN carts ON cart_items.cart_id = carts.cart_id WHERE carts.iduser = ?";
        $stmt = mysqli_prepare($conn, $select_items_query);
        mysqli_stmt_bind_param($stmt, "i", $iduser);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $cart_items = array();
        while($row = mysqli_fetch_assoc($result)) {
            $cart_items[] = $row;
        }
        return $cart_items;
    }

    // Lấy tổng số lượng sản phẩm trong giỏ hàng của một người dùng
    function getTotalCartQuantity($iduser) {
        global $conn;
        $total_quantity = 0;

        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if(isset($iduser)) {
            $select_quantity_query = "SELECT SUM(quantity) AS total_quantity FROM cart_items INNER JOIN carts ON cart_items.cart_id = carts.cart_id WHERE carts.iduser = ?";
            $stmt = mysqli_prepare($conn, $select_quantity_query);
            mysqli_stmt_bind_param($stmt, "i", $iduser);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $total_quantity = $row['total_quantity'];
            }
        }
        
        return $total_quantity;
    }
    $total_quantity = getTotalCartQuantity($iduser);

    function getTotalCartPrice($iduser) {
        $cart_items = getAllCartItems($iduser);
        $total_price = 0;
        foreach ($cart_items as $item) {
            $total_price += $item['price'] * $item['quantity'];
        }
        return $total_price;
    }

    // Xử lý các hành động thêm giỏ hàng và thêm mục vào giỏ hàng từ form hoặc các sự kiện khác ở đây
    if(isset($_SESSION['iduser'])) {
        $iduser = $_SESSION['iduser'];

        // Ví dụ: Thêm giỏ hàng mới nếu người dùng chưa có
        $existing_cart_query = "SELECT * FROM carts WHERE iduser = ?";
        $stmt = mysqli_prepare($conn, $existing_cart_query);
        mysqli_stmt_bind_param($stmt, "i", $iduser);
        mysqli_stmt_execute($stmt);
        $existing_cart_result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($existing_cart_result) == 0) {
            addNewCart($iduser);
        }

        // Ví dụ: Thêm một mục vào giỏ hàng
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idProduct']) && isset($_POST['quantity'])) {
            $iduser = $_SESSION['iduser'];
            $idProduct = $_POST['idProduct'];
            $quantity = $_POST['quantity'];
            if (addItemToCart($iduser, $idProduct, $quantity)) {
                // Nếu thêm vào giỏ hàng thành công, reload trang để đồng bộ cơ sở dữ liệu
                echo '<script>window.location.reload();</script>';
                exit; // Dừng việc thực thi mã PHP tiếp theo
            } else {
                echo "failed"; // Trả về 'failed' nếu có lỗi xảy ra
            }
        }
        
        // Lấy tất cả các mục trong giỏ hàng của người dùng
        $cart_items = getAllCartItems($iduser);

        // Tính tổng giá trị của giỏ hàng
        $total_cart_price = getTotalCartPrice($iduser);

        // Hiển thị các mục trong giỏ hàng ở đây
        if(!empty($cart_items)) {
            foreach($cart_items as $item) {
                // Hiển thị các mục trong giỏ hàng
            }
        } else {
        }

        // Hiển thị tổng giá trị của giỏ hàng

    } else {
        $total_quantity = getTotalCartQuantity(null);
        
    }

    // Đóng kết nối
    ?>
