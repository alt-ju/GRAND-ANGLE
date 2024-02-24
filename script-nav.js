const btn = document.getElementById('brg-btn')
btn.addEventListener('click', openNav())

    function openNav() {
        let items = document.querySelectorAll('.hidden-items')
        if (items.style.display === 'none') {
            items.style.display = 'block'
        } else {
            items.style.display = 'none'
        }
    }