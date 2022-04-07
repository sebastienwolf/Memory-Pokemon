<section class="form">
    <article class="formulaire">
        <h2>
            Inscription
        </h2>
        <div>
            <form id="form" action="" method="post">
                <input type="text" name="userPseudo" placeholder="Pseudo">
                <input type="password" name="password" placeholder="Mot de passe">
        </div>
        <div>
            <button type="submit" class="creer bn633-hover bn26" name="creer">Créer</button>
            </form>
        </div>
        <h3 id="erreur"></h3>

    </article>
</section>


<script>
    document.getElementById('form').addEventListener('submit', event => {
        event.preventDefault();
        let URL = "index.php?controller=users&task=inscription"

        let form = document.getElementById('form')
        let formData = new FormData(form)
        formData.append('sendMessage', 'retour')

        fetch(URL, {
                body: formData,
                method: "post"
            })
            .then(function(response) {
                return response.json()
            })
            .then(function(data) {
                console.log("test", data)
                let err = data;

                switch (err) {
                    case '1':
                        document.location.href = 'index.php?controller=page&task=connexion'
                        alert('Vous êtes inscrit, vous pouvez vous connecter');
                        break;
                    case '3':
                        document.getElementById('erreur').innerHTML = "<p style='color:red'> il manque une donnée</p>";
                        break;
                    case '4':
                        document.getElementById('erreur').innerHTML = "<p style='color:red'> le pseudo est déjà utilisé</p>";
                        break;

                }
            })


    })
</script>