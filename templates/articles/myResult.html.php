<section>
    <article class="MyResult">
        <h3>Toutes mes parties</h3>

        <?php
        foreach ($all as $a) {
        ?>
            <p><?= $a['dateE'] ?> pour un score de <?= $a['score'] ?> clicks.</p>

        <?php } ?>
    </article>

</section>
<aside>
    <h3>Mes tops 10</h3>
    <?php
    $i = 1;
    foreach ($result as $top) {

    ?>
        <p><?= $i ?> : <?= $top['dateE'] ?> pour un score de <?= $top['score'] ?> clicks.</p>

    <?php $i++;
    } ?>
</aside>