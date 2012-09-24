<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
			$("document").ready(function() {
				$("#rollForm").submit(function(event) {
					event.preventDefault();
					
					$.get("roll.php", $(this).serialize(), function(data) {
						$("#result").empty().append(data);
					});
				});
			});
		</script>
	</head>
	<body>
		<form action="" method="get" id="rollForm">
			<select name="numDice">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
			
			<select name="typeDice">
				<option value="4">D4</option>
				<option value="6">D6</option>
				<option value="8">D8</option>
				<option value="10">D10</option>
				<option value="12">D12</option>
				<option value="20">D20</option>
				<option value="100">D100</option>
				<option value="1000">D1000</option>
			</select>
			
			<select name="diff">
				<option value="-5">-5</option>
				<option value="-4">-4</option>
				<option value="-3">-3</option>
				<option value="-2">-2</option>
				<option value="-1">-1</option>
				<option value="0" selected="selected">0</option>
				<option value="1">+1</option>
				<option value="2">+2</option>
				<option value="3">+3</option>
				<option value="4">+4</option>
			</select>
			
			<input type="checkbox" value="1" name="ob">
			
			<input type="submit" value="ROLL!">
		</form>
		<div id="result">

		</div>
	</body>
</html>