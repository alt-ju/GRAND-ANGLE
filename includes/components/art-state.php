<div class="state-contain">
    <h2>Etat des oeuvres :</h2>
    <div class="art-carroussel">

        <div id="btn-before">
            <button class="before"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></button>
        </div>
        
            <div class="content-carroussel">
                
                    <div class="content-carroussel-item">
                        <img class="art-carr" src="./assets/img/freud_strawberries.jpg" alt="">
                        <p>id_oeuvre</p>
                        <p>Pas livré</p>
                    </div>
                    <div class="content-carroussel-item">
                        <img class="art-carr" src="./assets/img/freud_strawberries.jpg" alt="">
                        <p>id_oeuvre</p>
                        <p>Pas livré</p>
                    </div>
                    <div class="content-carroussel-item">
                        <img class="art-carr" src="./assets/img/freud_strawberries.jpg" alt="">
                        <p>id_oeuvre</p>
                        <p>Pas livré</p>
                    </div>
                    <div class="content-carroussel-item">
                        <img class="art-carr" src="./assets/img/freud_strawberries.jpg" alt="">
                        <p>id_oeuvre</p>
                        <p>Pas livré</p>
                    </div>
                    <div class="content-carroussel-item">
                        <img class="art-carr" src="./assets/img/freud_strawberries.jpg" alt="">
                        <p>id_oeuvre</p>
                        <p>Pas livré</p>
                    </div>
                    <div class="content-carroussel-item">
                        <img class="art-carr" src="./assets/img/freud_strawberries.jpg" alt="">
                        <p>id_oeuvre</p>
                        <p>Pas livré</p>
                    </div>
                    <div class="content-carroussel-item">
                        <img class="art-carr" src="./assets/img/freud_strawberries.jpg" alt="">
                        <p>id_oeuvre</p>
                        <p>Pas livré</p>
                    </div>
                
            </div>

        <div id="btn-after">
            <button class="after"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></button>
        </div>

    </div>
</div>

<script>

/* const btnBef = document.getElementById("btn-before");
const btnAft = document.getElementById("btn-after");
const section = document.querySelector(".content-carroussel");
const slider = document.querySelector(".slider");
btnAft.addEventListener('click', slideCar);

function slideCar() {
    let array = slider.querySelectorAll('.content-carroussel-item');
    let number = array.length;

    if (number > 4) {
        slider.style.transform = "translate(100px)";
        btnBef.style.display = "flex";
    } else {
        btnBef.style.display = "none";
    }
}
 */

const btnBef = document.getElementById("btn-before");
const btnAft = document.getElementById("btn-after");
const section = Array.from(document.querySelectorAll(".content-carroussel-item"));

section.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    btnAft.addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    btnBef.addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})

</script>