<?php

class Couleurs extends Controller{
    

    /**
     * Cette méthode affiche la liste des Couleurs
     *
     *
     * @return void
     */
    public function index() {
        // On instancie le modèle "Couleur"
        
        $this->loadModel('Couleur');
        // On stocke les Couleur dans $Couleurs
        $Couleurs = $this->Couleur->getAll();

        // $this->loadModel('Marque');
        // $marques = $this->Marque->getAll();
        $scriptJS = "$(document).ready(function () {
            // Fonction de recherche
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#colorTable tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            }) ;
          })";
        // On envoie les données à la vue index
        $this->render('index', compact('Couleurs','scriptJS'));
    }

    /**
     * Méthode permettant d'afficher un Couleur à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function modif(int $id){
        // On instancie le modèle "Couleur"
        $this->loadModel('Couleur');

        // On stocke le Couleur dans $Couleur
        $this->Couleur->id = array(
            'ID_Couleur' => $id
        );
        $Couleur = $this->Couleur->getOne();

        // On envoie les données à la vue modif
        $this->render('modif', compact('Couleur'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la MODIFICATION
     * d'un Couleur
     *
     * @param  int $id
     * @return void
     */
    public function modif_sauve(int $id){

        // On recupère les données envoyées par le formulaire
        $id = $_REQUEST['Id'];
        $nom = $_REQUEST['Nom'];

        // On instancie le modèle "Couleur"
        $this->loadModel('Couleur');

        // On effectue la mise à jour
        $this->Couleur->update($id, $nom);

        // On redirige vers la liste
        // On stocke les Couleur dans $Couleurs
        $Couleurs = $this->Couleur->getAll();
        
        $message = "Couleur bien modifié";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('Couleurs', 'message', 'type_message'));
    }


    /**
     * Méthode permettant d'afficher un Couleur à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function suppr(int $id){
        // On instancie le modèle "Couleur"
        $this->loadModel('Couleur');

        // On stocke le Couleur dans $Couleur
        $this->Couleur->id = array(
            'ID_Couleur' => $id
        );
        $Couleur = $this->Couleur->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('Couleur'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la SUPPRESSION
     * d'un Couleur
     *
     * @param  int $id
     * @return void
     */
    public function suppr_sauve(int $id){

        // On recupère les données envoyées par le formulaire
        $id = $_REQUEST['Id'];

        // On instancie le modèle "Couleur"
        $this->loadModel('Couleur');

        // On effectue la mise à jour
        $this->Couleur->delete($id);

        // On redirige vers la liste
        // On stocke les Couleur dans $Couleurs
        $Couleurs = $this->Couleur->getAll();
        
        $message = "Couleur bien supprimé";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('Couleurs', 'message', 'type_message'));
    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'un nouveau Couleur
     *
     * @param  void
     * @return void
     */
    public function ajout(){
        // On affiche le formulaire
        $this->render('ajout', array());
    }

    /**
     * Méthode permettant d'enregistrer la saisie d'un nouveau Couleur
     * d'un Couleur
     *
     * @param  void
     * @return void
     */
    public function ajout_sauve(){

        // On recupère les données envoyées par le formulaire
        $nom = $_REQUEST['Nom'];

        // On instancie le modèle "Couleur"
        $this->loadModel('Couleur');

        // On effectue la mise à jour
        $this->Couleur->insert($nom);

        // On redirige vers la liste
        // On stocke les Couleur dans $Couleurs
        $Couleurs = $this->Couleur->getAll();
        
        $message = "Couleur bien Ajouté";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('Couleurs', 'message', 'type_message'));
    }
}