<h1>Liste des types de Biere</h1>

<a href="<?= PATH ?>/types/ajout"><button type='button'
        class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter</button></a><br />

<table class="table table-dark table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach($Types as $type): ?>

    <tr>
        <td><?= $type['ID_TYPE'] ?></td>
        <td><?= $type['NOM_TYPE'] ?></td>
        <td>
            <a href="<?= PATH ?>/types/modif/<?= $type['ID_TYPE'] ?>"><button
                    class="btn btn-success bi bi-pencil"></button></a>
            <a href="<?= PATH ?>/types/suppr/<?= $type['ID_TYPE'] ?>"><button
                    class="btn btn-danger bi bi-trash3"></button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>