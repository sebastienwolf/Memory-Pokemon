<aside>
    <h3>Mes top 10</h3>
    <?php
    $i = 1;
    foreach ($result as $top) {

    ?>
        <p><?= $i ?> : <?= $top['dateE'] ?> pour un score de <?= $top['score'] ?> click.</p>

    <?php $i++;
    } ?>
</aside>
<section>
    <article class="MyResult">
        <h3>Toutes mes partie</h3>

        <?php
        foreach ($all as $a) {
        ?>
            <p><?= $a['dateE'] ?> pour un score de <?= $a['score'] ?> click.</p>

        <?php } ?>
    </article>

</section>