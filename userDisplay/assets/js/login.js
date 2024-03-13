const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

// Show/hide buttons based on login status
const loginBtn = document.getElementById("form-open");
const userIcon = document.getElementById("userIcon");
const cartIcon = document.getElementById("cart");
const dropUser = document.querySelector(".drop-user");
const buyUserButtons = document.getElementsByClassName("addToCartButton");

    if (isLoggedIn) {
        loginBtn.style.display = "none";  // Hide login button
        dropUser.style.display = "block";
        cartIcon.style.display = "block";
        userIcon.classList.replace('fa-regular', 'fa-solid');
        
        // Enable buyUser functionality
 

    } else {
        loginBtn.style.display = "block";  // Show login button
        dropUser.style.display = "none";
        cartIcon.style.display = "none";
        userIcon.classList.replace('fa-solid', 'fa-regular');
        
       
    }

// Handle logout functionality
function logout() {
    // Reset the login status
    localStorage.setItem("isLoggedIn", "false");

    // Reload the page
    window.location.href = "index.html";
}

// Function to handle the buyUser functionality


// Function to redirect to the login page when buyUser is clicked and user is not logged in
function redirectToLogin() {
    alert("Vui lòng đăng nhập để mua hàng .");

    // Optionally, you can redirect to the login page or take appropriate action
    window.location.href = "login.html";
}

// ...

// Disable buyUser functionality and attach click event listener

// ...

// Add event listener for "Add To Cart" buttons

// ...

