//js cua them anh
let productPic = document.getElementById("product_pic");
let inputFile = document.getElementById("input_file");

const reuserBtn = document.getElementById('suanguoidung');
const boxreuser = document.getElementById('boxsuauser');
const reUserForm = document.getElementById('suaUserForm');
reuserBtn.addEventListener('click', function () {
    if (boxreuser.style.display === 'none' || boxreuser.style.display === '') {
        boxreuser.style.display = 'block';
    } else {
        boxreuser.style.display = 'none';
    }
});
reUserForm.addEventListener('submit', function (event) {
    event.preventDefault();
    alert('Đã cập nhật thông tin');
    boxreuser.style.display = 'none';
});

inputFile.onchange = function () {
    productPic.src = URL.createObjectURL(inputFile.files[0]);
    var pic = document.getElementById("product_pic");
    pic.style.display = "block";
}

function warning() {
    // Lấy tất cả các phần tử <input> trừ phần tử đầu tiên
    const confirmation = confirm("Bạn có chắc chắn với nội dung trên?");
    alert("Bạn đã cập nhật thành công !");
    boxreuser.style.display = 'none';
}

//prevent refresh page
var form = document.getElementById("formId");
function submitForm(event) {
    event.preventDefault();
}

//calling a function during form submission
form.addEventListener('submit', submitForm);

// Updated function to handle deletion
function del(element) {
    var changeImgDiv = element.parentNode.parentNode; // Get the parent div of the clicked button
    var pic = changeImgDiv.querySelector(".product_pic");
    var result = confirm("Bạn có chắc muốn xóa hình không ?");
    if (result)
        pic.style.display = "none";
}
