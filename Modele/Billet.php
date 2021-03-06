<?php

require_once 'Modele/Modele.php';

class Billet extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBillets() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_IMAGE as image, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet) {
        
        $sql = 'select BIL_ID as id, BIL_DATE as dateBillet,'
                . ' BIL_TITRE as titre, BIL_IMAGE as image, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    public function ajouterBillet($titre, $lien, $contenuBillet) {
        $titre = htmlspecialchars($titre);
        $sql = 'insert into T_BILLET(BIL_DATE, BIL_IMAGE, BIL_TITRE, BIL_CONTENU)'
            . 'values(?, ?, ?, ?)';
        $dateBillet = date('Y-m-d H:i:s');  // Récupère la date courante

        $this->executerRequete($sql, array($dateBillet, $lien, $titre, $contenuBillet));
    }

    public function enleverBillet($id) {
        $sql = 'DELETE FROM T_BILLET WHERE BIL_ID= ?';
        $this->executerRequete($sql, array($id));
    }
    
   
    public function corrigerBillet($titre, $lien, $contenuBillet, $id) {
        $sql = 'UPDATE T_BILLET SET BIL_TITRE = :nvTitre, BIL_IMAGE = :nvLien, BIL_CONTENU = :nvContenu WHERE BIL_ID = :id';
        $this->executerRequete($sql, array(
        'nvTitre' => $titre,
        'nvLien' => $lien,
	    'nvContenu' => $contenuBillet,
	    'id' => $id
	));
    }
}

