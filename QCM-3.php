<?php
	
	if (isset($_POST['submitted'])){
		$submitted = true;
		$nbsubmitted = $_POST['submitted'];
		$prenom = ucfirst($_POST['prenom']);
		$nom = ucfirst($_POST['nom']);
		$emailStudent = $_POST['email'];
		$emailProf = 'becode@becode.org';
		$formulaire= $_POST;
	}
	else {
		$submitted = false;
	}

	$questionnaire = array(
						array (	'“En ces temps difficiles, il convient d’accorder notre mépris avec parcimonie, tant nombreux sont les nécessiteux.”',
								'Chateaubriand',
								'Lamartine',
								'Chamfort'
								),
						array (	'“Rien ne sert de courir, il faut partir à point.”',
								'Jean de La Fontaine',
								'Guy Drut',
								'Pierre de Coubertin'
								),
						array (	'“Il est beau qu’un soldat désobéisse à des ordres criminels.”',
								'Anatole France',
								'Charles de Gaulle',
								'Victor Hugo'
								),
						array (	'“Le devoir, c’est ce qu’on exige des autres.”',
								'Alexandre Dumas',
								'Maréchal Pétain',
								'Maréchal Foch'
								),
						array (	'“Un dictionnaire, c’est tout l’univers par ordre alphabétique.”',
								'Anatole France',
								'Victor Hugo',
								'Diderot'
								),
						array (	'“Donner est un plaisir plus durable que recevoir, car celui des deux qui donne est celui qui se souvient le plus longtemps.”',
								'Chamfort',
								'Sœur Thérésa',
								'Saint-Vincent-de-Paul'
								),
						array (	'“En opposant la haine à la haine, on ne fait que la répandre, en surface comme en profondeur.”',
								'Mahatma Gandhi',
								'Vaclav Havel',
								'Martin Luhter King'
								),
						array (	'“L’histoire est un roman qui a été, le roman est de l’histoire qui aurait pu être.”',
								'Edmond et Jules de Goncourt',
								'Jules Michelet',
								'Marc Bloch'
								),
						array (	'“L’homme n’est rien d’autre que la série de ses actes.”',
								'Hegel',
								'Karl Marx',
								'Kant'
								),
						array (	'“La femme ne voit jamais ce que l’on fait pour elle ; elle ne voit que ce qu’on ne fait pas.”',
								'Courteline',
								'Alphonse Allais',
								'Sacha Guitry'
								)
	);

?>

<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	  <link rel="stylesheet" href="perso.css">
	  <TITLE>QCM</TITLE>
	</head>

	<body>

		<h1>QCM</h1>
		<div class=container>

		<?php
		if ($submitted){
			correctifGen($formulaire);
		}

		else {
		?>
		<form method='POST'>
			<div class='form-group'>
				<h4>Etudiant</h4>
					<label for="prenom">Prenom
						<input id='prenom' name='prenom' class="form-control">
					</label>
					<label for='nom'>Nom
						<input id='nom' name='nom' class="form-control">
					</label>
					<label for='email'>Email
						<input type="email" id='email' name='email' class="form-control">
					</label>
			</div>

			<?php
				questionGen($questionnaire);
			?>

			<div class='form-group'>
				<button type='submit' class="btn btn-default">Vérifier mes réponses</button>
			</div>

		</form>
		<?php
		}
		?>
		</div>
	</body>
</html>

<?php

	function questionGen($questionnaire){
		// Numérotation des questions commence à 1
		$num = 0;
		global $questionsMultiples;
		// Parcourrir le questionnaire
		$questionsMultiples = [];
		foreach ($questionnaire as $question) {
			$num++;
			echo "<div class='form-group'>";
			echo "<h4>Question " . $num . "</h4>";
			// Enoncé de la question
			echo "<p class='question'>" . $question[0] . "</p>";
			// Parcourir les champs des questions skipant le 1er champ (énoncé)
		 	for ($i = 1; $i <=3; $i++) {
				// Génération d'un code d'identification réponse
				$codeRep = $num . '-' . $i ;

				// Générer le contenu du choix
				$choixHtml = "<div class='radio'> <label for='" . $codeRep . "'> <input type='radio' name='Q" . $num . "' id='" . $codeRep. "' value='" . $codeRep . "'>" . $question[$i] . "</label>";
				array_push($questionsMultiples, $choixHtml);
			}
			shuffle($questionsMultiples);
			foreach ($questionsMultiples as $choixHtml) {	
				echo $choixHtml;
			}
			$questionsMultiples = [];
			echo "</div>";
			echo "</div>";
		}
	echo " <div style='display: none' class='form-group'>
						<input name='submitted' value=" . $num . ">
					</div> ";
	}


	function correctifGen($formulaire){
	 // créer un array avec les codes réponses de l'étudiant
		$repStudent = [];
		foreach ($formulaire as $key => $value) {
			if ((substr($key, 0, 1)) == 'Q') {
				$codeQ = substr($key, 1, 1);
				$codeR = substr($value, 2, 1);
				$repStudent[$codeQ] = $codeR;
			}
		}

	// compter les points
		$good = 0;
		foreach ($repStudent as $codeQ => $codeR) {
			if ($codeR == 1){
				$good++;
			}
		}
	// préparer un message en fonction
		global $nbsubmitted;
		global $prenom;
		$resultat = 100*($good/$nbsubmitted);
		if ($resultat > 50){
			$msg = 'Bravo '. $prenom . ', ton résultat est de ' . $resultat . '%!';
		}
		else {
			$msg = $prenom . ', va falloir bosser. Ton résultat est de '. $resultat . '%!';
		}
		echo "<p class='resultat'>" . $msg . "</p>";

	// Préparation de l'affichage du correctif
		// Numérotation des questions commence à 1
		?><p>
		<span class='good'>Correction</span>
		<span class='response'>-1 point</span>
		<span class='responsegood'>+1 point</span>
		</p>
		<?php
		$num = 1;
		global $questionnaire;
		// Parcourrir le questionnaire
		foreach ($questionnaire as $question) {
			echo "<div class='form-group'>";
			echo "<h4>Question " . $num . "</h4>";
			// Enoncé de la question
			echo "<p>" . $question[0] . "</p>";
			// Parcourir les champs des questions skipant le 1er champ (énoncé)
			 	for ($i = 1; $i <=3; $i++) {
					// Ajout d'une classe pour la réponse entrée par l'étudiant
					$class1 = "";
					$class2 = "";
					if ($i == $repStudent[$num]) {
						$class1 = "response";
					}
					// Ajout d'une classe pour la réponse correcte
					if ($i == 1){
						$class2 = "good";
					}
					$class = "class='" . $class1 . $class2 . "'";
	
					// Générer le contenu du choix
					$choixHtml = "<p " . $class . ">" . $question[$i] . "</p>";
					echo $choixHtml;
				}
			$num++;
			echo "</div>";
		}
	}
?>