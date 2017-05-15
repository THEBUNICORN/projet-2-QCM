<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	  <TITLE>QCM</TITLE>
	</head>

	<body>

		<h1>QCM</h1>

		<form method='POST' action='validator.php'>
			<div class='form-group'>
				<h4>Etudiant</h4>
					<label for="prenom">Prenom
						<input id='prenom' name='prenom' class="form-control">
					</label>
					<label for='nom'>Nom
						<input id='nom' name='nom' class="form-control">
					</label>
			</div>

			<div class='form-group'>
				<h4>Question 1</h4>
				<div class="radio">
				  <label for='Q1.1'>
				    <input type="radio" name="Q1" id="Q1.1" value="true">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q1.2'>
				    <input type="radio" name="Q1" id="Q1.2" value="false">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q1.3'>
				    <input type="radio" name="Q1" id="Q1.3" value="false">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div class='form-group'>
				<h4>Question 2</h4>
				<div class="radio">
				  <label for='Q2.1'>
				    <input type="radio" name="Q2" id="Q2.1" value="false">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q2.2'>
				    <input type="radio" name="Q2" id="Q2.2" value="true">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q2.3'>
				    <input type="radio" name="Q2" id="Q2.3" value="false">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div class='form-group'>
				<h4>Question 3</h4>
				<div class="radio">
				  <label for='Q3.1'>
				    <input type="radio" name="Q3" id="Q3.1" value="false">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q3.2'>
				    <input type="radio" name="Q3" id="Q3.2" value="false">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q3.3'>
				    <input type="radio" name="Q3" id="Q3.3" value="true">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div class='form-group'>
				<h4>Question 4</h4>
				<div class="radio">
				  <label for='Q4.1'>
				    <input type="radio" name="Q4" id="Q4.1" value="true">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q4.2'>
				    <input type="radio" name="Q4" id="Q4.2" value="false">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q4.3'>
				    <input type="radio" name="Q4" id="Q4.3" value="false">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div class='form-group'>
				<h4>Question 5</h4>
				<div class="radio">
				  <label for='Q5.1'>
				    <input type="radio" name="Q5" id="Q5.1" value="false">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q5.2'>
				    <input type="radio" name="Q5" id="Q5.2" value="true">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q5.3'>
				    <input type="radio" name="Q5" id="Q5.3" value="false">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div class='form-group'>
				<h4>Question 6</h4>
				<div class="radio">
				  <label for='Q6.1'>
				    <input type="radio" name="Q6" id="Q6.1" value="false">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q6.2'>
				    <input type="radio" name="Q6" id="Q6.2" value="false">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q6.3'>
				    <input type="radio" name="Q6" id="Q6.3" value="true">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div class='form-group'>
				<h4>Question 7</h4>
				<div class="radio">
				  <label for='Q7.1'>
				    <input type="radio" name="Q7" id="Q7.1" value="true">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q7.2'>
				    <input type="radio" name="Q7" id="Q7.2" value="false">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q7.3'>
				    <input type="radio" name="Q7" id="Q7.3" value="false">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div class='form-group'>
				<h4>Question 8</h4>
				<div class="radio">
				  <label for='Q8.1'>
				    <input type="radio" name="Q8" id="Q8.1" value="false">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q8.2'>
				    <input type="radio" name="Q8" id="Q8.2" value="true">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q8.3'>
				    <input type="radio" name="Q8" id="Q8.3" value="false">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div class='form-group'>
				<h4>Question 9</h4>
				<div class="radio">
				  <label for='Q9.1'>
				    <input type="radio" name="Q9" id="Q9.1" value="false">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q9.2'>
				    <input type="radio" name="Q9" id="Q9.2" value="false">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q9.3'>
				    <input type="radio" name="Q9" id="Q9.3" value="true">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div class='form-group'>
				<h4>Question 10</h4>
				<div class="radio">
				  <label for='Q10.1'>
				    <input type="radio" name="Q10" id="Q10.1" value="true">
				    A, la réponse A
				  </label>
				</div>
				<div class="radio">
				  <label for='Q10.2'>
				    <input type="radio" name="Q10" id="Q10.2" value="false">
				    B, la réponse B
				  </label>
				</div>
				<div class="radio">
				  <label for='Q10.3'>
				    <input type="radio" name="Q10" id="Q10.3" value="false">
				    C, la réponse C
				  </label>
				</div>
			</div>

			<div style='display: none' class='form-group'>
				<input name="nbRepExpected" value="10">
			</div>

			<div class='form-group'>
				<button type='submit' class="btn btn-default">Vérifier mes réponses</button>
			</div>



		</form>

	</body>
</html>