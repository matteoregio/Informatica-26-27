<?php $this->layout('layout', [
'titolo' => $titolo
]); ?>

<title><?=$titolo?></title>
<main>
    <h1>Schede</h1>

    <ul>
        <?php foreach ($persone as $persona): ?>
            <li><?= $persona ?></li>
    </ul>

</main>