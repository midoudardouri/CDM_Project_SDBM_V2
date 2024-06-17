<body>
    <div class="container">
        <!-- Titre principal avec animation de saut -->
        <h1>
            <span>L</span><span>i</span><span>s</span><span>t</span><span>e</span>
            <span>d</span><span>e</span>
            <span>s</span>
            <span>T</span><span>i</span><span>c</span><span>k</span><span>e</span><span>t</span><span>s</span>
        </h1>

        <!-- Boutons de pagination -->
        <h2>
            <div class="btn-group">
                Page N° <?= @$no_page ?> &nbsp;&nbsp;

                <a href="<?= PATH ?>/tickets/page/1">
                    <button type="button" class="btn btn-secondary">
                        <i class="bi bi-caret-left-square text-warning"> Début de liste</i>
                    </button>
                </a>

                <a href="<?= PATH ?>/tickets/page/<?= @$no_page_prec ?>">
                    <button type="button" class="btn btn-secondary">
                        <i class="bi bi-caret-left  text-warning"> Page Précédente</i>
                    </button>
                </a>

                <a href="<?= PATH ?>/tickets/page/<?= @$no_page_suivante ?>">
                    <button type="button" class="btn btn-secondary">
                        <i class="bi bi-caret-right  text-warning"> Page Suivante</i>
                    </button>
                </a>

                <a href="<?= PATH ?>/tickets/page/<?= @$last_no_page ?>">
                    <button type="button" class="btn btn-secondary">
                        <i class="bi bi-caret-right-square  text-warning"> Fin de liste</i>
                    </button>
                </a>
            </div>
        </h2>

        <!-- Bouton d'ajout -->
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="<?= PATH ?>/tickets/ajout">
                <button type='button' class='btn'>
                    <i class="bi bi-plus-circle"></i>&nbsp;Ajouter
                </button>
                <a href="<?= PATH ?>/main"><button  class="btn btn-warning">Retour a la list </button></a>
            </a>
        </div>

        <!-- Barre de recherche -->
        <div class="search-container">
            <input type="text" class="search-box" id="searchInput" placeholder="Rechercher...">
        </div>

        <!-- Tableau des tickets -->
        <table id="ticketTable">
            <tr>
                <th>Année</th>
                <th>N° du Ticket</th>
                <th>Horodatage</th>
                <th>Actions</th>
            </tr>
            <?php foreach($tickets as $ticket): ?>
            <tr>
                <td><?= $ticket['ANNEE'] ?></td>
                <td><?= $ticket['NUMERO_TICKET'] ?></td>
                <td><?= $ticket['DATE_VENTE'] ?></td>
                <td>
                    <a href="<?= PATH ?>/tickets/modif/<?php echo $ticket['ANNEE'].'/'.$ticket['NUMERO_TICKET'] ?>" class="btn btn-success">
                        <i class="bi bi-pencil"></i>&nbsp;Modifier
                    </a>
                    <a href="<?= PATH ?>/tickets/suppr/<?php echo $ticket['ANNEE'].'/'.$ticket['NUMERO_TICKET'] ?>" class="btn btn-danger">
                        <i class="bi bi-trash"></i>&nbsp;Supprimer
                    </a>
                    <a href="<?= PATH ?>/vendres/index/<?php echo $ticket['ANNEE'].'/'.$ticket['NUMERO_TICKET'] ?>" class='btn btn-warning'>Détail</a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>

   
</body>