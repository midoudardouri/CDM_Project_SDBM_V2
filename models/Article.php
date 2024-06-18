<?php
class Article extends Model{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "article";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

     /**
      * Met à jour le nom d'un Continent à partir de son ID
      *
      * 
      * @return array
      */
      public function getAll_with_marque_typebiere_couleur(){
        $sql = "SELECT ID_ARTICLE, NOM_ARTICLE, NOM_MARQUE ,NOM_TYPE,NOM_COULEUR FROM ".$this->table. " INNER JOIN marque ";
        $sql .= " ON article.ID_MARQUE =marque.ID_MARQUE ";
        $sql .= " INNER JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE ";
        $sql .= " INNER JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR ";
        $sql .= " ORDER BY article.ID_ARTICLE ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    /**
     * Met à jour le nom d'un article
     *  à partir de son ID
     *
     * @param int $id
     * @param string $nom
     * @param int $id_marq
     *  @param int $id_typ
     *  @param int $id_coul
     * @return void
     */
     public function update(int $id, string $nom ,$id_marq, int $id_typ, int $id_coul) {
         $sql = "UPDATE ".$this->table." set NOM_ARTICLE = :p_nom, ID_MARQUE = :p_id_marq, ID_TYPE = :p_id_typ, ID_COULEUR = :p_id_coul
                WHERE ID_ARTICLE = :p_id";
         $query = $this->_connexion->prepare($sql);
         $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
         $query->bindParam(':p_nom', $nom,  PDO::PARAM_STR );
         $query->bindParam(':p_id_marq', $id_marq, PDO::PARAM_INT);
         $query->bindParam(':p_id_typ', $id_typ, PDO::PARAM_INT);
         $query->bindParam(':p_id_coul', $id_coul, PDO::PARAM_INT);
         $query->execute();  
     }

     /**
      * Supprime un Continent à partir de son ID
      * @param string $nom
      * @param int $id
      * @param int $id_marq
      * @param int $id_typ
      * @param int $id_coul
       *@return void
      */
     public function delete(int $id) {
         $sql = "DELETE FROM ".$this->table." WHERE ID_ARTICLE=:p_id";
         $query = $this->_connexion->prepare($sql);
         $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
         $query->execute();    
     }

      /**
      * Ajoute un Continent 
      *
     * @param string $nom
      * @param int $id
      * @param int $id_marq
      * @param int $id_typ
      * @param int $id_coul
      * @return void
      */
     public function insert(string $nom , int $id_marq, int $id_typ, int $id_coul) {
         $sql = "INSERT INTO ".$this->table."(NOM_ARTICLE, ID_MARQUE, ID_TYPE, ID_COULEUR) VALUES (:p_nom, :p_id_marq, :p_id_typ, :p_id_coul)";
         $query = $this->_connexion->prepare($sql);
         $query->bindParam(':p_nom', $nom,  PDO::PARAM_STR );
         $query->bindParam(':p_id_marq', $id_marq, PDO::PARAM_INT);
         $query->bindParam(':p_id_typ', $id_typ, PDO::PARAM_INT);
         $query->bindParam(':p_id_coul', $id_coul, PDO::PARAM_INT);
         $query->execute();    
     }

}