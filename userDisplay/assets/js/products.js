let products = [
    {
        "id": 1,
        "name": "Phin Đen Đá",
        "price": 15000,
        "image": "../userDisplay/assets/img/cfDenDa.png",
        "description": "Sự kết hợp hoàn hảo giữa hạt cà phê Robusta & Arabica thượng hạng được trồng trên những vùng cao nguyên Việt Nam màu mỡ, qua những bí quyết rang xay độc đáo, Highlands Coffee chúng tôi tự hào giới thiệu những dòng sản phẩm Cà phê mang hương vị đậm đà và tinh tế."
    },
    {
        "id": 2,
        "name": "Phin Sữa Đá",
        "price": 19000,
        "image": "../userDisplay/assets/img/suaDa.png",
        "description":"Sự kết hợp hoàn hảo giữa hạt cà phê Robusta & Arabica thượng hạng được trồng trên những vùng cao nguyên Việt Nam màu mỡ, qua những bí quyết rang xay độc đáo, Highlands Coffee chúng tôi tự hào giới thiệu những dòng sản phẩm Cà phê mang hương vị đậm đà và tinh tế."
    },
    {
        "id": 3,
        "name": "Bạc Xỉu Đá",
        "price": 22000,
        "image": "../userDisplay/assets/img/bacXiu.png",
        "description": "Sự kết hợp hoàn hảo giữa hạt cà phê Robusta & Arabica thượng hạng được trồng trên những vùng cao nguyên Việt Nam màu mỡ, qua những bí quyết rang xay độc đáo, Highlands Coffee chúng tôi tự hào giới thiệu những dòng sản phẩm Cà phê mang hương vị đậm đà và tinh tế."
    }
    ,
    {
        "id": 4,
        "name": "Trà Đào",
        "price": 40000,
        "image": "../userDisplay/assets/img/traDao.png",
        "description":"Một trải nghiệm thú vị khác! Sự hài hòa giữa vị trà cao cấp, vị sả thanh mát và những miếng đào thơm ngon mọng nước sẽ mang đến cho bạn một thức uống tuyệt vời."
    },
    {
        "id": 5,
        "name": "Trà Vải",
        "price": 40000,
        "image": "../userDisplay/assets/img/traVai.png",
        "description":"Một sự kết hợp thú vị giữa trà đen, những quả vải thơm ngon và thạch giòn khó cưỡng, mang đến thức uống tuyệt hảo!"
    },
    {
        "id": 6,
        "name": "Latte Nóng",
        "price": 50000,
        "image": "../userDisplay/assets/img/latte.png",
        "description": "Sự kết hợp hoàn hảo giữa hạt cà phê Robusta & Arabica thượng hạng được trồng trên những vùng cao nguyên Việt Nam màu mỡ, qua những bí quyết rang xay độc đáo, Highlands Coffee chúng tôi tự hào giới thiệu những dòng sản phẩm Cà phê mang hương vị đậm đà và tinh tế."
    },
    {
        "id": 7,
        "name": "Freeze Caramel",
        "price": 45000,
        "image": "../userDisplay/assets/img/caramelFreeze.png",
        "description": "Sảng khoái với thức uống đá xay phong cách Việt. Freeze là thức uống đá xay mát lạnh được pha chế từ những nguyên liệu thuần túy của Việt Nam."
    },
    {
        "id": 8,
        "name": "Freeze Matcha",
        "price": 45000,
        "image": "../userDisplay/assets/img/matchaFreeze.png",
        "description": "Sảng khoái với thức uống đá xay phong cách Việt. Freeze là thức uống đá xay mát lạnh được pha chế từ những nguyên liệu thuần túy của Việt Nam."
    },
    {
        "id": 9,
        "name": "Freeze Chocolate",
        "price": 45000,
        "image": "../userDisplay/assets/img/chocolateFreeze.png",
        "description":"Sảng khoái với thức uống đá xay phong cách Việt. Freeze là thức uống đá xay mát lạnh được pha chế từ những nguyên liệu thuần túy của Việt Nam."
    },
    {
        "id": 10,
        "name": "Trà Sen Vàng",
        "price": 35000,
        "image": "../userDisplay/assets/img/traSenVang.png",
        "description": "Thức uống chinh phục những thực khách khó tính! Sự kết hợp độc đáo giữa trà Ô long, hạt sen thơm bùi và củ năng giòn tan. Thêm vào chút sữa sẽ để vị thêm ngọt ngào."
    }
   
]
const itemsPerPage = 9;
let currentPage = 1;

// get data from file json
displayProducts();

// show datas product in list
function displayProducts() {
    let listProductHTML = document.querySelector('.listProduct');
    listProductHTML.innerHTML = '';

    // Calculate the range of products to display
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    // Display only the products for the current page
    const currentProducts = products.slice(startIndex, endIndex);

    currentProducts.forEach(product => {
        let newProduct = document.createElement('div');
        newProduct.classList.add('item');

        // Image with a link to the detail page
        let newImg = document.createElement('a');
        newImg.href = 'details.html?id=' + product.id;
        newImg.innerHTML = `<img src="${product.image}" alt="">`;
        newProduct.appendChild(newImg);

        // Product details
        newProduct.innerHTML += `
            <h2>${product.name}</h2>
            <div class="price">${product.price}VND</div>
            <button class="addToCartButton" data-product-name="${product.name}">Thêm</button>`;

        listProductHTML.appendChild(newProduct);
    });

    // Add event listener for "Add To Cart" buttons
    document.querySelectorAll('.addToCartButton').forEach(button => {
        button.addEventListener('click', addToCart);
    });
}

// Function to handle "Add To Cart" button click
function addToCart(event) {
    // Check if the user is logged in
    if (isLoggedIn) {
        // If logged in, add the product to the cart
        const productName = event.target.dataset.productName;
        alert(` "${productName}" đã được thêm vào giỏ hàng.`);
        // You can add additional logic here to actually add the product to the cart
    } else {
        // If not logged in, show a login prompt
        alert("Vui lòng đăng nhập để mua hàng.");
        // Optionally, you can redirect to the login page or take appropriate action
        window.location.href = "login.html";
    }
}


