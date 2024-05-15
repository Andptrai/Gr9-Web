<?php
require '../php/header.php';
?>
<!--cac  -->


<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    header('Location: login_singup.html');
    exit();
}

// Trích xuất thông tin người dùng từ session
$fullName = isset($_SESSION['fullName']) ? $_SESSION['fullName'] : '';
$address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
$userName = isset($_SESSION['userName']) ? $_SESSION['userName'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$phoneNumber = isset($_SESSION['phoneNumber']) ? $_SESSION['phoneNumber'] : '';
?>
<div class="container-xl px-4 mt-4">

    
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">

            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">

                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt>

                </div>
            </div>
        </div>
        <div class="col-xl-8">

            <div class="card mb-4">
                <div class="card-header">Your Account</div>
                <div class="card-body">
                    
               
				<form action="../php/process_signin.php" method="post">
					<div class="mb-3">
						<label class="small mb-1" for="fullName">Full Name</label>
						<input class="form-control" id="fullName" name="fullName" type="text" value="<?php echo $fullName; ?>">
					</div>

					<div class="mb-3">
						<label class="small mb-1" for="userName">User name</label>
						<input class="form-control" id="userName" name="userName" type="text" value="<?php echo $userName; ?>">
					</div>

					<div class="mb-3">
						<label class="small mb-1" for="email">Email</label>
						<input class="form-control" id="email" name="email" type="text" value="<?php echo $email; ?>">
					</div>

					<div class="mb-3">
						<label class="small mb-1" for="address">Address</label>
						<input class="form-control" id="address" name="address" type="text" value="<?php echo $address; ?>">
					</div>

					<div class="mb-3">
						<label class="small mb-1" for="phoneNumber">Phone number</label>
						<input class="form-control" id="phoneNumber" name="phoneNumber" type="text" value="<?php echo $phoneNumber; ?>">
					</div>

					<button class="btn btn-primary" type="submit">Save changes</button>
				</form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Order History Section -->
        <div class="card mb-4">
            <div class="card-header">Order History</div>
            
        </div>
    </div>
<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body" id="orderDetailsContent">
                <!-- Content loaded via AJAX will be placed here -->
            </div>
        </div>
    </div>
</div>	


<!-- search -->
<script>
    function searchProducts() {
        var searchKeyword = document.getElementById('search').value;

        // Tạo một đối tượng XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Xác định phương thức và URL của yêu cầu Ajax
        var url = 'search.php?keyword=' + encodeURIComponent(searchKeyword);
        xhr.open('GET', url, true);

        // Xử lý sự kiện khi yêu cầu hoàn thành
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Xử lý dữ liệu phản hồi ở đây
                var response = xhr.responseText;
                // Ví dụ: Hiển thị kết quả tìm kiếm trong một vùng HTML
                document.getElementById('searchResults').innerHTML = response;
            }
        };

        // Gửi yêu cầu
        xhr.send();
    }
</script>
<script>
    function suggestKeywords() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('search');
        filter = input.value.toUpperCase();
        ul = document.getElementById("keyword-list");
        li = ul.getElementsByTagName('li');
        
        // Xóa tất cả các gợi ý hiện tại
        ul.innerHTML = "";
        
        // Nếu không có từ khóa nhập vào, không hiển thị gợi ý
        if (filter.length === 0) return;
        
        // Hiển thị các gợi ý phù hợp
        <?php
        // Danh sách từ khóa gợi ý có thể được lưu trữ trong một mảng PHP
        $suggestedKeywords = array("shirt", "jacket", "shoes", "pants", "dress");
        foreach ($suggestedKeywords as $keyword) {
            echo "if (filter.indexOf('".strtoupper($keyword)."') > -1) {
                var li = document.createElement('li');
                li.textContent = '".$keyword."';
                ul.appendChild(li);
            }";
        }
        ?>
    }

    // Gán hàm suggestKeywords cho sự kiện input
    document.getElementById('search').addEventListener('input', suggestKeywords);
</script>


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Lấy tất cả các button chứa class "filter-button"
    var filterButtons = document.querySelectorAll('button.filter-button[data-filter]');

    // Lắng nghe sự kiện click trên các button
    filterButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Lấy giá trị data-filter của button được click
            var filterValue = button.getAttribute('data-filter');
            
            // Tìm tất cả các sản phẩm có cùng danh mục và kích hoạt sự kiện click cho chúng
            var targetProducts = document.querySelectorAll('.isotope-item' + filterValue);
            targetProducts.forEach(function(targetProduct) {
                targetProduct.click();
            });

            // Tìm phần tử cuối cùng có class "isotope-item" trong kết quả
			var targetElement = document.getElementById('scroll-target');
            
            // Nếu phần tử đích tồn tại
            if (targetElement) {
                // Kéo trang xuống đến phần tử đích
				targetElement.scrollIntoView({ behavior: 'smooth' });
            } else {
                // Nếu không tìm thấy phần tử đích, cuộn trang về đầu trang
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            }
        });
    });
});



</script>



<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
    // JavaScript code
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy tất cả các button có thuộc tính data-filter
        var filterButtons = document.querySelectorAll('[data-filter]');
        
        // Lắng nghe sự kiện click trên các button
        filterButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Lấy giá trị data-filter của button được click
                var filterValue = button.getAttribute('data-filter');
                
                // Tìm tất cả các button dưới đây có cùng giá trị data-filter và kích hoạt sự kiện click cho chúng
                var targetButtons = document.querySelectorAll('[data-filter="' + filterValue + '"]');
                targetButtons.forEach(function(targetButton) {
                    targetButton.click();
                });
            });
        });
    });
</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
<script>
	$(document).ready(function() {
    $('.js-show-modal1').click(function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');
        $.ajax({
            type: 'GET',
            url: '../php/get_product_info.php',
            data: { product_id: productId },
            success: function(response) {
                // Xử lý phản hồi từ máy chủ (server response) ở đây
                // Ví dụ: Hiển thị thông tin sản phẩm trong modal popup
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

</script>
<script>
    $(document).ready(function () {
        $('.openPopup').on('click', function () {
            var orderID = $(this).data('orderid');
            $.ajax({
				url: '../admin/order_details.php',
                type: 'GET',
                data: {order_id: orderID},
                success: function (response) {
                    $('#orderDetailsContent').html(response);
                    $('#viewModal').modal('show');
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while fetching order details.');
                }
            });
        });
    });

    

</script>

</body>
</html>