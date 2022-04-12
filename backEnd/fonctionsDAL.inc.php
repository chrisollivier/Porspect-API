<?php
	// connexion à la base de données Annuaire
	// fonction qui retourne tous les contacts
	function getAllContacts() {
		$connexion=connexionBase();
		$requete = 'SELECT * from contact';
		$lignes = $connexion->query($requete)->fetchAll(PDO::FETCH_ASSOC);
		return $lignes;
	}
	// fonction qui ramène le nombre de contacts dont l'identifiant est passé en paramètre
	function nbContact($idContact) {
		$connexion=connexionBase();
		$requete = 'SELECT count(*) as nb from contact where idContact=:id';
		$prep = $connexion->prepare($requete);
		$prep->bindValue(':id', $idContact, PDO::PARAM_INT);
		$prep->execute();
		$ligne = $prep->fetch(PDO::FETCH_ASSOC);
		return $ligne["nb"];
	}
	// fonction qui permet d'insérer un nouveau contact
	function insertContact($id, $nom, $tel,$mail,$cp,$ville ) {
		$connexion=connexionBase();
		$requete = 'INSERT INTO contact(idContact, nomContact, telContact, mailContact, cpContact, villeContact) VALUES(:id, :nom,:tel,:mail,:cp,:ville)'; 
		$prep = $connexion->prepare($requete);
		$prep->bindValue(':id', $id, PDO::PARAM_INT);
		$prep->bindValue(':nom', $nom, PDO::PARAM_STR);
		$prep->bindValue(':tel', $tel, PDO::PARAM_STR);
		$prep->bindValue(':mail', $mail, PDO::PARAM_STR);
		$prep->bindValue(':cp', $cp, PDO::PARAM_STR);
		$prep->bindValue(':ville', $ville, PDO::PARAM_STR);
		$ok =$prep->execute();
		//return $ok;
		return $prep->rowCount();
	}
	// fonction qui permet de modifier un contact
	function updateContact($id, $nom, $tel, $mail, $cp,$ville ) {
		try {
			$connexion=connexionBase();
			$requete = 'UPDATE contact set nomContact=:nom, telContact=:tel, mailContact=:mail, cpContact=:cp, villeContact=:ville where idContact=:id'; 
			$prep = $connexion->prepare($requete);
			$prep->bindValue(':id', $id, PDO::PARAM_INT);
			$prep->bindValue(':nom', $nom, PDO::PARAM_STR);
			$prep->bindValue(':tel', $tel, PDO::PARAM_STR);
			$prep->bindValue(':mail', $mail, PDO::PARAM_STR);
			$prep->bindValue(':cp', $cp, PDO::PARAM_STR);
			$prep->bindValue(':ville', $ville, PDO::PARAM_STR);
			$ok =$prep->execute();
			//return $ok;
			return $prep->rowCount();
		}
		catch (Exception $e) {
		return  $e->getMessage();
		}
	}
?>
