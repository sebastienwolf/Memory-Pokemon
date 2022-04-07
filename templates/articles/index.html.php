<section class="game">

    <div>
        <h1> Bienvenue sur le jeu du memory Pokemon.</h1>
    </div>
    <div class="terrain">
        <?php
        foreach ($tableau as $item) {
        ?>
            <img class="card" id="<?= $item ?>" src='./upload/fondCarte.jpg'>
        <?php } ?>
    </div>

    <div id="centered">
        <button class="bn634-hover bn27" id='restart' data-result="" name="result"></button>
    </div>


</section>
<aside>
    <h3>Top 10</h3>
    <?php
    foreach ($result as $top) {
    ?>
        <p><?= $top['pseudo'] ?> le <?= $top['dateE'] ?> pour un score de <?= $top['score'] ?> clicks.</p>

    <?php } ?>
    <p>*pour sauvegarder votre score, vous devez être inscrit.</p>

</aside>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        let arrayOfImage = <?php echo json_encode($arrayCards); ?>;
        let firstFlip = '';
        let time;
        let playAgain = document.getElementById('restart')
        playAgain.style.display = 'none'

        Array.from(document.getElementsByClassName('card')).forEach(card => {
            card.addEventListener('click', () => {
                flipCard(card)
            })
        })

        //======================================================

        playAgain.addEventListener('click', function() {
            console.log("validated")
            let URL = "index.php?controller=game&task=save"
            let form = playAgain.dataset.result
            let formData = new FormData()
            formData.append('result', form)
            fetch(URL, {
                    body: formData,
                    method: "post"
                })
                .then(function(response) {
                    return response.json()
                })
                .then(function(data) {
                    location.reload();
                })

            startGame()
        })
        // ================================================================================
        // ici crée les carte
        function startGame() {
            playAgain.style.display = 'none'
            valided = 0;
            score = 0;
            cardFree = <?php echo json_encode($tableau); ?>;
            arrayOfImage.forEach(imageSrc => {
                for (let y = 0; y < 2; y++) {

                    let availablePlace = cardFree.length
                    let randomIndex = Math.floor(Math.random() * availablePlace)
                    let idCard = cardFree[randomIndex]

                    cardFree.splice(randomIndex, 1)
                    document.getElementById(idCard).src = './upload/fondCarte.jpg'
                    document.getElementById(idCard).dataset.src = imageSrc
                }
            });
        }
        // =============================================================================
        startGame()

        function flipCard(card) {
            if (time || card.dataset.src == card.src) {
                return
            }
            card.src = card.dataset.src
            if (firstFlip == '') {
                firstFlip = card.id
                console.log(firstFlip)
                return
            }
            score += 1
            console.log('test', score)
            if (document.getElementById(firstFlip).src != card.src) {
                time = setTimeout(function() {
                    document.getElementById(firstFlip).src = './upload/fondCarte.jpg'
                    card.src = './upload/fondCarte.jpg'
                    firstFlip = ''
                    time = null;
                }, 600);
            } else {
                firstFlip = ''
                valided += 1
                if (arrayOfImage.length == valided) {

                    playAgain.style.display = 'flex'
                    document.getElementById('restart').dataset.result = score
                    document.getElementById('restart').innerHTML = 'Votre score est de : ' + score + " click."
                }
            }
        }




    });
</script>