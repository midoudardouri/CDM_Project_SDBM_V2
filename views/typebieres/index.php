<div class="container">
<h1>Liste des types de Biere</h1>

<a href="<?= PATH ?>/typebieres/ajout"><button type='button'
        class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter</button></a><br />

<table class="table table table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach($typebieres as $typebiere): ?>

    <tr>
        <td><?= $typebiere['ID_TYPE'] ?></td>
        <td><?= $typebiere['NOM_TYPE'] ?></td>
        <td>
            <a href="<?= PATH ?>/typebieres/modif/<?= $typebiere['ID_TYPE'] ?>"><button
                    class="btn btn-success bi bi-pencil"></button></a>
            <a href="<?= PATH ?>/typebieres/suppr/<?= $typebiere['ID_TYPE'] ?>"><button
                    class="btn btn-danger bi bi-trash3"></button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>
    </div>