<?php
	$stdDiff = 6;
	
	if(isset($_GET['numDice']) && isset($_GET['typeDice']) && isset($_GET['diff'])) {
		$numDice = $_GET['numDice']; 
		$typeDice = $_GET['typeDice']; 
		$diff = $_GET['diff'];
		
		$results = array();
		$success = array();
		$failed = array();
		$botch = array();
		
		for($t = 0; $t < $numDice; $t++) {
			$tmp = mt_rand(1, $typeDice);
			
			if($_GET['ob'] == 1) {
				if($tmp == $typeDice) {
					$t -= 1;
				} else {
					$results[] = $tmp;
				}
			} else {
				$results[] = $tmp;
			}
		}
		
		foreach($results as $result) {
			if($result >= $stdDiff+(int)$diff) {
				$success[] = $result;
			} elseif($result == 1) {
				$botch[] = $result;
			} else {
				$failed[] = $result;
			}
		}
		
		echo <<<TBL
		<table>
			<tr>
				<th>Success</th>
				<th>Failed</th>
				<th>Botch</th>
			</tr>
			<tbody>
TBL;

		$numSuccess = count($success);
		$numFailed = count($failed);
		$numBotch = count($botch);
		
		for($r = 0; $r < $numDice; $r++) {
			echo "<tr><td>";
			if(isset($success[$r])) {
				echo $success[$r];
			} else {
				echo "&nbsp;";
			}
			
			echo "</td><td>";
			
			if(isset($failed[$r])) {
				echo $failed[$r];
			} else {
				echo "&nbsp;";
			}
			
			echo "</td><td>";
			
			if(isset($botch[$r])) {
				echo $botch[$r];
			} else {
				echo "&nbsp;";
			}
			
			echo "</td></tr>";
		}

		echo <<<TBL2
			</tbody>
			<tfoot>
				<tr>
					<td>{$numSuccess}</td>
					<td>{$numFailed}</td>
					<td>{$numBotch}</td>
				</tr>
			</tfoot>
		</table>
TBL2;
	}
?>