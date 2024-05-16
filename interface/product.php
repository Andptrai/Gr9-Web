<?php
include '../php/header.php';
?>
<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
		<div class="row">
    <a href="product.php" class="col-md-6 col-xl-4 p-b-30 m-lr-auto filter-button" data-filter=".Women">
        <!-- Block1 -->
        <div class="block1 wrap-pic-w">
            <img src="images/banner-01.jpg" alt="IMG-BANNER">
            <div class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                <div class="block1-txt-child1 flex-col-l">
                    <span class="block1-name ltext-102 trans-04 p-b-8">Women</span>
                    <span class="block1-info stext-102 trans-04">Spring 2018</span>
                </div>
                <div class="block1-txt-child2 p-b-4 trans-05">
                    <div class="block1-link stext-101 cl0 trans-09">Shop Now</div>
                </div>
            </div>
        </div>
    </a>

    <a href="product.php" class="col-md-6 col-xl-4 p-b-30 m-lr-auto filter-button" data-filter=".Men">
        <!-- Block1 -->
        <div class="block1 wrap-pic-w">
            <img src="images/banner-02.jpg" alt="IMG-BANNER">
            <div class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                <div class="block1-txt-child1 flex-col-l">
                    <span class="block1-name ltext-102 trans-04 p-b-8">Men</span>
                    <span class="block1-info stext-102 trans-04">Spring 2018</span>
                </div>
                <div class="block1-txt-child2 p-b-4 trans-05">
                    <div class="block1-link stext-101 cl0 trans-09">Shop Now</div>
                </div>
            </div>
        </div>
    </a>

    <a href="product.php" class="col-md-6 col-xl-4 p-b-30 m-lr-auto filter-button" data-filter=".Watches">
        <!-- Block1 -->
        <div class="block1 wrap-pic-w">
            <img src="images/banner-03.jpg" alt="IMG-BANNER">
            <div class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                <div class="block1-txt-child1 flex-col-l">
                    <span class="block1-name ltext-102 trans-04 p-b-8">Accessories</span>
                    <span class="block1-info stext-102 trans-04">New Trend</span>
                </div>
                <div class="block1-txt-child2 p-b-4 trans-05">
                    <div class="block1-link stext-101 cl0 trans-09">Shop Now</div>
                </div>
            </div>
        </div>
    </a>
</div>

		</div>
</div>



<div class="bg0 p-t-23 p-b-140">
			<div class="container">
					<div class="flex-w flex-sb-m p-b-52">
						<div class="flex-w flex-l-m filter-tope-group m-tb-10">
							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
								All Products
							</button>

							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Women">
								Women
							</button>

							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Men">
								Men
							</button>

							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Bag">
								Bag
							</button>

							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Shoes">
								Shoes
							</button>

							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Watches">
								Watches
							</button>
						</div>

						<div class="flex-w flex-c-m m-tb-10">
							<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
								<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
								<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
								Filter
							</div>

							<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
								<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
								<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
								Search
							</div>
						</div>

						<!-- Search product -->
						<div class="dis-none panel-search w-full p-t-10 p-b-15">
							<form class="bor8 dis-flex p-l-15">
								<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" onclick="searchProducts()" >
									<i class="zmdi zmdi-search"></i>
								</button>

								<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" id="search" placeholder="Search">
							</form>
						</div>

					
					</div>

					<div class="row isotope-grid " >
						<div class="row">


								<?php 
									$productsPerPage = 8; // Số sản phẩm trên mỗi trang
									$totalProducts = count($products); // Tổng số sản phẩm
									$totalPages = ceil($totalProducts / $productsPerPage); // Tính tổng số trang

									// Kiểm tra trang hiện tại từ tham số GET, mặc định là trang đầu tiên
									$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
									$currentPage = max(1, min($totalPages, intval($currentPage))); // Đảm bảo trang hiện tại hợp lệ

									// Tính vị trí bắt đầu và kết thúc của sản phẩm trên trang hiện tại
									$start = ($currentPage - 1) * $productsPerPage;
									$end = min($start + $productsPerPage, $totalProducts);

									// Lặp qua danh sách sản phẩm cho trang hiện tại
									for ($i = $start; $i < $end; $i++):
										$product = $products[$i];
								?>
									<a href="product-detail.php?product_id=<?php echo $product['idProduct']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $product['category']; ?>">
											<div class="block2">
												<div class="block2-pic hov-img0">
													<img src="<?php echo $product['image']; ?>" alt="IMG-PRODUCT">
												</div>
												<div class="block2-txt flex-w flex-t p-t-14">
													<div class="block2-txt-child1 flex-col-l">
														<a href="product-detail.php?product_id=<?php echo $product['idProduct']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
															<?php echo $product['name']; ?>
														</a>
														<span class="stext-105 cl3">
															<?php echo $product['price']; ?>
														</span>
													</div>
												</div>
											</div>
										</div>				
									</a>	
								<?php endfor; ?>
							
						</div>
						
					</div>
					<div class="row justify-content-center text-center">
            			<div class="col-md-12"> <!-- Sử dụng col-md-12 để chiếm toàn bộ chiều rộng của dòng -->
							<!-- Hiển thị phân trang -->
							<nav aria-label="Page navigation">
								<ul class="pagination">
									<?php if ($currentPage > 1): ?>
										<li class="page-item"><a class="page-link" href="?page=1">&laquo;</a></li>
										<li class="page-item"><a class="page-link" href="?page=<?php echo ($currentPage - 1); ?>">&lsaquo;</a></li>
									<?php endif; ?>
									
									<?php for ($page = 1; $page <= $totalPages; $page++): ?>
										<li class="page-item <?php if ($page == $currentPage) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
									<?php endfor; ?>

									<?php if ($currentPage < $totalPages): ?>
										<li class="page-item"><a class="page-link" href="?page=<?php echo ($currentPage + 1); ?>">&rsaquo;</a></li>
										<li class="page-item"><a class="page-link" href="?page=<?php echo $totalPages; ?>">&raquo;</a></li>
									<?php endif; ?>
								</ul>
							</nav>
						</div>
					</div>
			</div>
</div>

			
</div>


	
	<!-- Footer -->
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

				<p class="stext-107 cl6 txt-center"> </p>
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
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<!-- <div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div> -->

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
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

</body>
</html>