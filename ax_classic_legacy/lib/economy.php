<?
 switch ($action) {
	case 0: // View Server economics
		check_admin_authorization();
		$body = new Template("templates/economy/economy.tmpl.php");
		$cash = get_cash_totals();
			if ($cash) {
			  $body->set('cash', $cash);
			}
		 $richest = get_richest_players();
			if ($richest) {
				foreach ($richest as $key=>$value) {
				$body->set($key, $value);
				}
			}
		break;
 }
 function get_cash_totals() {
	$HOSTNAME2 = "localhost";
	$USERNAME2 = "root";
	$PASSWORD2 = "eqemu";
	$DATABASE2 = "polls";
	$CON2 = mysqli_connect($HOSTNAME2, $USERNAME2, $PASSWORD2, $DATABASE2);
	$query = "SELECT FORMAT(SUM(platinum) + SUM(platinum_bank), 0) AS 'platinum' FROM wealthiest";
	$result = mysqli_query($CON2, $query);
	$row = mysqli_fetch_array($result);
	$platinum = $row['platinum'];
	$query = "SELECT FORMAT(SUM(gold) + SUM(gold_bank), 0) AS 'gold' FROM wealthiest";
	$result = mysqli_query($CON2, $query);
	$row = mysqli_fetch_array($result);
	$gold = $row['gold'];
	$query = "SELECT FORMAT(SUM(silver) + SUM(silver_bank), 0) AS 'silver' FROM wealthiest";
	$result = mysqli_query($CON2, $query);
	$row = mysqli_fetch_array($result);
	$silver = $row['silver'];
	$query = "SELECT FORMAT(SUM(copper) + SUM(copper_bank), 0) AS 'copper' FROM wealthiest";
	$result = mysqli_query($CON2, $query);
	$row = mysqli_fetch_array($result);
	$copper = $row['copper'];
	$cash = array("copper"=> $copper, "silver"=> $silver, "gold"=> $gold, "platinum" => $platinum);
	return $cash;
 }
 function get_richest_players() {
	$HOSTNAME2 = "localhost";
	$USERNAME2 = "root";
	$PASSWORD2 = "eqemu";
	$DATABASE2 = "polls";
	$CON2 = mysqli_connect($HOSTNAME2, $USERNAME2, $PASSWORD2, $DATABASE2);
	$query = "SELECT name, account_id, FROM_UNIXTIME(timelaston, '%Y %b %e'), FORMAT(platinum, 0), FORMAT(platinum_bank, 0), FORMAT((platinum + platinum_bank), 0) FROM wealthiest ORDER BY (platinum + platinum_bank) DESC LIMIT 20";
	$result = mysqli_query($CON2, $query);
	
	while($row = mysqli_fetch_array($result)) {
	$array['richest'][$row['name']] = array("name" => $row['name'], "account_id" => $row['account_id'], "timelaston" => $row["FROM_UNIXTIME(timelaston, '%Y %b %e')"], 
	 "FORMAT(platinum, 0)" => $row['FORMAT(platinum, 0)'],  "FORMAT(platinum_bank, 0)" => $row['FORMAT(platinum_bank, 0)'], "FORMAT((platinum + platinum_bank), 0)" => $row['FORMAT((platinum + platinum_bank), 0)']);
	}
	return $array;
 }
?>