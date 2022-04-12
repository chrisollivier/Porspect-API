<?php  
	header('charset=utf-8');
	include_once('fonctionsDAL.inc');
	
	// récupération du flux JSON
	$json = file_get_contents('php://input');
	$obj = json_decode($json);
	
	// insertion ou mise à jour des données dans la table Contact
	$res = $obj->Contacts;
	foreach($res as $contact) {
		$nb = nbContact($contact->{'id'});
		if ($nb==0)
		{
			insertContact($contact->{'id'},$contact->{'nom'}, $contact->{'tel'}, $contact->{'mail'}, $contact->{'cp'},$contact->{'ville'});
		}
		else
		{
			updateContact($contact->{'id'}, $contact->{'nom'}, $contact->{'tel'}, $contact->{'mail'}, $contact->{'cp'},$contact->{'ville'});
		}
	}	
?>
