const search = document.querySelector('.search');
    const input = document.querySelector('.input');
    const btn = document.querySelector('.btn');

    btn.addEventListener('click', () => {
        search.classList.toggle('active');
        input.focus();
    });

    input.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            // Chuyển hướng trang khi nhấn Enter
            window.location.href = 'searchResult.html'; // hoặc window.location.replace('products.html');
        }
    });