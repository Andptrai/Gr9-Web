<?php
// Include file connect.php để kết nối với database
include 'connect.php';

// Truy vấn dữ liệu từ bảng products
$sql = "SELECT id, name, price, image FROM products LIMIT 8"; // Giới hạn lấy 8 sản phẩm
$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '
        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="images/product-'.$row["id"].'.jpg" alt="'.$row["name"].'">
                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        Quick View
                    </a>
                </div>
                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="product-detail.php?id='.$row["id"].'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            '.$row["name"].'
                        </a>
                        <span class="stext-105 cl3">
                            $'.$row["price"].'
                        </span>
                    </div>
                    <div class="block2-txt-child2 flex-r p-t-3">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
} else {
    echo "0 results";
}

// Đóng kết nối
$conn->close();
?>
