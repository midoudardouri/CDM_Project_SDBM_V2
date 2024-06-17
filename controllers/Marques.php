<?php

class Marques extends Controller{
    /**
     * Cette méthode affiche la liste des Marques
     *
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Marque"
        $this->loadModel('Marque');

        // On stocke les Marques dans $marques
        // (Y COMPRIS celles qui n'ont pas de FABRICANT)
        $marques = $this->Marque->getAll_with_pays_and_fabricant_null();
                // scriptJS pour la recherche  
                $scriptJS = "$(document).ready(function () {
                  // Fonction de recherche
                  $('#searchInput').on('keyup', function () {
                      var value = $(this).val().toLowerCase();
                      $('#marqueTable tbody tr').filter(function () {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                      });
                  }) ;
                })";
              

        // On envoie les données à la vue index
        $this->render('index', compact('marques','scriptJS'));
    }

    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function modif(int $id){
        // On instancie le modèle "Marque"
        $this->loadModel('Marque');


        // On stocke la marque dans $marque
        $this->Marque->id = array(
            'ID_MARQUE' => $id
        );
        $marque = $this->Marque->getOne();

        // On instancie le modèle "Pays" pour générer le COMBO
        $this->loadModel('Pays');
        $Lespays = $this->Pays->getAll("NOM_PAYS asc");

        // On instancie le modèle "Fabricant" pour générer le COMBO
        $this->loadModel('Fabricant');
        $fabricants = $this->Fabricant->getAll("NOM_FABRICANT asc");

        // On envoie les données à la vue modif
        $this->render('modif', compact('marque', 'Lespays', 'fabricants'));
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
        $id_fab = $_REQUEST['Id_fabricant'];
        $id_pays = $_REQUEST['Id_pays'];

        // print_r($_REQUEST);
        // On instancie le modèle "Marque"
        $this->loadModel('Marque');

        // On effectue la mise à jour
        $this->Marque->update($id, $nom, $id_fab, $id_pays);

        // On redirige vers la liste
        // On stocke les continent dans $marques
        $marques = $this->Marque->getAll_with_pays_and_fabricant_null();
        $scriptJS = <<<SCRIPT
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Continent bien modifié",
          showConfirmButton: false,
          timer: 1500
        });
        SCRIPT;
        
        $message = "Marque bien modifiée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('marques', 'message', 'type_message','scriptJS'));
    }


    /**
     * Méthode permettant d'afficher une marque à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function suppr(int $id){
        // On instancie le modèle "Marque"
        $this->loadModel('Marque');

        // On stocke la marque dans $marque
        $this->Marque->id = array(
            'ID_MARQUE' => $id
        );
        $marque = $this->Marque->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('marque'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la SUPPRESSION
     * d'une MARQUE
     *
     * @param  int $id
     * @return void
     */
    public function suppr_sauve(int $id){

        // On instancie le modèle "Marque"
        $this->loadModel('Marque');

        // On effectue la mise à jour
        $this->Marque->delete($id);

        // On redirige vers la liste
        // On stocke les marques dans $marques
        $marques = $this->Marque->getAll_with_pays_and_fabricant_null();
        $scriptJS = $scriptJS = <<<SCRIPT
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
          },
          buttonsStyling: false
        });
        
        swalWithBootstrapButtons.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
              title: "Deleted!",
              text: "Your file has been deleted.",
              icon: "success"
            });
          } else if (
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire({
              title: "Cancelled",
              text: "Your imaginary file is safe :)",
              icon: "error"
            });
          }
        });
        SCRIPT;
        
        $message = "Marque bien Supprimée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('marques', 'message', 'type_message','scriptJS'));
    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'une nouvelle MARQUE
     *
     * @param  void
     * @return void
     */
    public function ajout(){

        // On instancie le modèle "Pays"
        $this->loadModel('Pays');
        // On stocke les Pays dans $pays
        $pays = $this->Pays->getAll("NOM_PAYS asc");

        // On instancie le modèle "Fabricant"
        $this->loadModel('Fabricant');
        // On stocke les fabricants dans $fabricants
        $fabricants = $this->Fabricant->getAll("NOM_FABRICANT asc");

        // On affiche le formulaire
        $this->render('ajout', compact('pays','fabricants'));
    }

    /**
     * Méthode permettant d'enregistrer la saisie d'une nouvelle Marque
     *
     * @param  void
     * @return void
     */
    public function ajout_sauve(){

        // On recupère les données envoyées par le formulaire
        $nom = $_REQUEST['Nom'];
        $id_fab = $_REQUEST['Id_fabricant'];
        $id_pays = $_REQUEST['Id_pays'];

        // print_r($_REQUEST);

        // On instancie le modèle "Marque"
        $this->loadModel('Marque');

        // On effectue la mise à jour
        $this->Marque->insert($nom, $id_fab, $id_pays);

        // On redirige vers la liste
        // On stocke les marques dans $marques
        $marques = $this->Marque->getAll_with_pays_and_fabricant_null();
        $scriptJS = <<<SCRIPT
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Continent bien Ajouté",
          showConfirmButton: false,
          timer: 1500
        });
        SCRIPT;
        
        $message = "Marque bien Ajoutée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('marques', 'message', 'type_message','scriptJS'));
    }
}