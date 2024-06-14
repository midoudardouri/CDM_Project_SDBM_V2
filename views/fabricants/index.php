<div class="container">
<h1>Liste des Fabricants</h1>

<a href="<?= PATH ?>/fabricants/ajout"><button fabricant='button'
        class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter</button></a><br />

<table class="table table table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach($fabricants as $fabricant): ?>

    <tr>
        <td><?= $fabricant['ID_FABRICANT'] ?></td>
        <td><?= $fabricant['NOM_FABRICANT'] ?></td>
        <td>
            <a href="<?= PATH ?>/fabricants/modif/<?= $fabricant['ID_FABRICANT'] ?>"><button
                    class="btn btn-success bi bi-pencil"></button></a>
            <a href="<?= PATH ?>/fabricants/suppr/<?= $fabricant['ID_FABRICANT'] ?>"><button
                    class="btn btn-danger bi bi-trash3"></button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>

</div>