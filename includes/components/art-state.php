<div class="state-contain">
    <h2 class="state-title">Etat des oeuvres :</h2>
    <div class="carousel">
        <button class="pre-btn"><svg viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></button>

        <button class="nxt-btn"><svg viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></button>
        <div class="cards-container">
            <div class="slider"> 
                <div class="art-card">
                    <div class="art-img">
                        <img src="./assets/img/freud_strawberries.jpg" alt="">
                    </div>
                    <p>id_oeuvre</p>
                    <span>Pas livrée</span>
                </div>
                <div class="art-card">
                    <div class="art-img">
                        <img src="./assets/img/freud_strawberries.jpg" alt="">
                    </div>
                    <p>id_oeuvre</p>
                    <span>Pas livrée</span>
                </div>
                <div class="art-card">
                    <div class="art-img">
                        <img src="./assets/img/freud_strawberries.jpg" alt="">
                    </div>
                    <p>id_oeuvre</p>
                    <span>Pas livrée</span>
                </div>
                <div class="art-card">
                    <div class="art-img">
                        <img src="./assets/img/freud_strawberries.jpg" alt="">
                    </div>
                    <p>id_oeuvre</p>
                    <span>Pas livrée</span>
                </div>
                <div class="art-card">
                    <div class="art-img">
                        <img src="./assets/img/freud_strawberries.jpg" alt="">
                    </div>
                    <p>id_oeuvre</p>
                    <span>Pas livrée</span>
                </div>
                <div class="art-card">
                    <div class="art-img">
                        <img src="./assets/img/freud_strawberries.jpg" alt="">
                    </div>
                    <p>id_oeuvre</p>
                    <span>Pas livrée</span>
                </div>
                <div class="art-card">
                    <div class="art-img">
                        <img src="./assets/img/freud_strawberries.jpg" alt="">
                    </div>
                    <p>id_oeuvre</p>
                    <span>Pas livrée</span>
                </div>
                <div class="art-card">
                    <div class="art-img">
                        <img src="./assets/img/freud_strawberries.jpg" alt="">
                    </div>
                    <p>id_oeuvre</p>
                    <span>Pas livrée</span>
                </div>
                <div class="art-card">
                    <div class="art-img">
                        <img src="./assets/img/freud_strawberries.jpg" alt="">
                    </div>
                    <p>id_oeuvre</p>
                    <span>Pas livrée</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function () {
const carousel = document.querySelector('.carousel');
const slider = document.querySelector('.slider');
const cardsContainer = document.querySelector('.cards-container');
const cardWidth = document.querySelector('.art-card').offsetWidth;
const preBtn = document.querySelector('.pre-btn');
const nxtBtn = document.querySelector('.nxt-btn');
 
let currentIndex = 0;
 
function moveCarousel() {
slider.style.transform = `translateX(${-currentIndex * cardWidth}px)`;
}
 
function showPreviousSlide() {
currentIndex = Math.max(currentIndex - 1, 0);
moveCarousel();
}
 
function showNextSlide() {
const maxIndex = Math.floor(cardsContainer.offsetWidth / cardWidth) - 1;
currentIndex = Math.min(currentIndex + 1, maxIndex);
moveCarousel();
}
 
preBtn.addEventListener('click', showPreviousSlide);
nxtBtn.addEventListener('click', showNextSlide);
});

</script>

