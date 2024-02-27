
let oeuvreActuelle = 0;
let quantOeuvre = document.querySelectorALL('.art-state-content .art').length
let oeuvre = document.querySelectorAll('.art')
let container = document.querySelector('.art-state-content')
let flecheGa = document.getElementById('arrow-l')

document.getElementById('arrow-r').addEventListener('click', function () {
    if(quantOeuvre > container.offsetWidth) {
        container.style.transform = 'translateX('+ (oeuvreActuelle * oeuvre[0].offSetWidth) + 'px)'
        flecheGa.style.display = 'flex'
    } else {
        container.style.transform = 'none'
    }
})

