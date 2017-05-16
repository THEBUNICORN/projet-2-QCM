<?php
	
	if (isset($_POST['submitted'])){
		$submitted = true;
		$nbRepExpected = $_POST['nbRepExpected'];
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$emailStudent = $_POST['email'];
		$emailProf = 'becode@becode.org';
	}
	else {
		$submitted = false;
	}

	$questionnaire = array(
						array (	'kiki?',
								'kiki',
								'koko',
								'kuku'
								),
						array (	'koko?',
								'koko',
								'kiki',
								'kuku'
								),
						array (	'kuku?',
								'kuku',
								'koko',
								'kiki'
								)
	);

		echo gettype($questionnaire);
?>