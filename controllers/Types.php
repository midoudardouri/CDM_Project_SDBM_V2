<?php

class Types extends Controller{
    /**
     * Cette méthode affiche la liste des Types
     *
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Type"
        $this->loadModel('Type');

        // On stocke les Marques dans $Types
        // (Y COMPRIS celles qui n'ont pas de FABRICANT)
        $types = $this->Type->getAll();

        // On envoie les données à la vue index
        $this->render('index', compact('Types'));
    }

    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function modif(int $id){
        // On instancie le modèle "Type"
        $this->loadModel('Type');


        // On stocke la marque dans $Type
        $this->Type->id = array(
            'ID_Type' => $id
        );
        $type = $this->Type->getOne();

        // On envoie les données à la vue modif
        $this->render('modif', compact('Type'));
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
        $this->loadModel('Type');

        // On effectue la mise à jour
        $this->Type->update($id, $nom);

        // On redirige vers la liste
        // On stocke les continent dans $Type
        $types = $this->Type->getAll();
        
        $message = "Type bien modifiée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('Types', 'message', 'type_message'));
    }


    /**
     * Méthode permettant d'afficher une marque à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function suppr(int $id){
        // On instancie le modèle "Type"
        $this->loadModel('Type');

        // On stocke la marque dans $Type
        $this->Type->id = array(
            'ID_Type' => $id
        );
        $marque = $this->Type->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('Type'));
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
        $this->loadModel('Type');

        // On effectue la mise à jour
        $this->Type->delete($id);

        // On redirige vers la liste
        // On stocke les marques dans $Types
        $marques = $this->Type->getAll();
        
        $message = "Type Bien Supprimé";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('Types', 'message', 'type_message'));
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
        $this->loadModel('Type');

        // On effectue la mise à jour
        $this->Type->insert($nom);

        // On redirige vers la liste
        // On stocke les marques dans $Types
        $marques = $this->Type->getAll();
        
        $message = "Type bien Ajoutée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('Types', 'message', 'type_message'));
    }
}