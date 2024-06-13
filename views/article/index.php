<h1>Liste des Article</h1>

<a href="<?= PATH ?>/articles/ajout"><button type='button'
        class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter</button></a><br />

<table class="table table-dark table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Marque</th>
        <th>Type</th>
        <th>Coulour</th>
        <th>Actions</th>
    </tr>

    <?php foreach($articles as $article): ?>

    <tr>
        <td><?= $article['ID_ARTICLE'] ?></td>
        <td><?= $article['NOM_ARTICLE'] ?></td>
        <td><?= $article['NOM_MARQUE'] ?></td>
        <td><?= $article['NOM_TYPE'] ?></td>
        <td><?= $article['NOM_COULEUR'] ?></td>
        <td>
            <a href="<?= PATH ?>/articles/modif/<?= $article['ID_ARTICLE'] ?>"><button
                    class="btn btn-success bi bi-pencil"></button></a>
            <a href="<?= PATH ?>/articles/suppr/<?= $article['ID_ARTICLE'] ?>"><button
                    class="btn btn-danger bi bi-trash3"></button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>