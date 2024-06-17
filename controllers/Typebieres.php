<?php

class Typebieres extends Controller{
    /**
     * Cette méthode affiche la liste des Types
     *
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Type"
        $this->loadModel('typebiere');

        // On stocke les Marques dans $Types
        // (Y COMPRIS celles qui n'ont pas de FABRICANT)
        $typebieres = $this->typebiere->getAll();
        $scriptJS = "$(document).ready(function () {
            // Fonction de recherche
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#typebiereTable tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        })";

        // On envoie les données à la vue index
        $this->render('index', compact('typebieres','scriptJS'));
    }

    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function modif(int $id){
        // On instancie le modèle "Type"
        $this->loadModel('typebiere');


        // On stocke la marque dans $Type
        $this->typebiere->id = array(
            'ID_TYPE' => $id
        );
        $typebiere = $this->typebiere->getOne();

        // On envoie les données à la vue modif
        $this->render('modif', compact('typebiere'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la MODIFICATION
     * d'un Continent
     *
     * @param  int $id
     * @return void
     */
    public function modif_sauve(int $id){

        // On recupère les données envoyées par le formulaire
        $id = $_REQUEST['Id'];
        $nom = $_REQUEST['Nom'];

        // On instancie le modèle "Type"
        $this->loadModel('typebiere');

        // On effectue la mise à jour
        $this->typebiere->update($id, $nom);

        // On redirige vers la liste
        // On stocke les continent dans $Type
        $typebieres = $this->typebiere->getAll();
        
        $message = "Type bien modifiée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('typebieres', 'message', 'type_message'));
    }


    /**
     * Méthode permettant d'afficher une marque à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function suppr(int $id){
        // On instancie le modèle "Type"
        $this->loadModel('typebiere');

        // On stocke la marque dans $Type
        $this->typebiere->id = array(
            'ID_TYPE' => $id
        );
        $typebiere = $this->typebiere->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('typebiere'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la SUPPRESSION
     * d'une Type
     *
     * @param  int $id
     * @return void
     */
    public function suppr_sauve(int $id){

        $id = $_REQUEST['Id'];
        // On instancie le modèle "Type"
        $this->loadModel('typebiere');

        // On effectue la mise à jour
        $this->typebiere->delete($id);

        // On redirige vers la liste
        // On stocke les marques dans $Types
        $typebieres = $this->typebiere->getAll();
        
        $message = "Type Bien Supprimé";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('typebieres', 'message', 'type_message'));
    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'une nouvelle Type
     *
     * @param  void
     * @return void
     */
    public function ajout(){
        $this->render('ajout', array());
    }

    /**
     * Méthode permettant d'enregistrer la saisie d'un nouveau Type
     *
     * @param  void
     * @return void
     */
    public function ajout_sauve(){

        // On recupère les données envoyées par le formulaire
        $nom = $_REQUEST['Nom'];

        // On instancie le modèle "Type"
        $this->loadModel('typebiere');

        // On effectue la mise à jour
        $this->typebiere->insert($nom);

        // On redirige vers la liste
        // On stocke les marques dans $Types
        $typebieres = $this->typebiere->getAll();
        
        $message = "Type bien Ajoutée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('typebieres', 'message', 'type_message'));
    }
}