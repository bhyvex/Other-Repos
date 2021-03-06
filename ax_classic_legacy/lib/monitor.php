<?
switch ($action) {
	case 0: // Monitor online players
		check_admin_authorization();
		$breadcrumbs = "Monitor Players";
		$body = new Template("templates/monitor/monitor.tmpl.php");
		$getcount = get_count();
		if ($getcount) {
		  $body->set("getcount", $getcount);
		}
		$monitor = get_monitor();
		if ($monitor) {
		  foreach ($monitor as $key=>$value) {
			$body->set($key, $value);
		   }
		 }
	 break;
	case 1: // view detailed information through LS name
		check_admin_authorization();
		$accounts = account_details($_GET['accountid']);
		$breadcrumbs =  "<a href='index.php?editor=monitor&action=0'>" . "Monitor Players</a> >> " . $_GET['accountname'] . " " . "(" . $_GET['accountid'] . ")";
		$body = new Template("templates/monitor/monitor.details.php");
		$body->set("accounts", $accounts);
		$body->set('yesno', $yesno);
		if ($accounts) {
			foreach ($accounts as $key=>$value) {
				$body->set($key, $value);
			}
		}
	 break;
}
function get_count() {
	global $mysql;
	$query = "SELECT COUNT(name) FROM (SELECT * FROM character_) AS x where unix_timestamp() <= timelaston + 300";
	$result = $mysql->query_assoc($query);
	return $result;
}
function get_monitor() {
	global $mysql;
	$query = "SELECT character_.account_id, character_.name as 'charname', 
	account.name, account.status, character_.level, character_.class, account.karma, 
	account.hideme, character_.zonename 
	FROM character_, account WHERE character_.account_id = account.id AND unix_timestamp() <= timelaston + 300";
	$result = $mysql->query_mult_assoc($query);
	if ($result) {
    foreach ($result as $result) {
      $array['monitor'][$result['account_id']] = array("character_.account_id"=>$result['account_id'], 
	  "character_.name"=>$result['charname'], "account.name"=>$result['name'], 
	  "account.status"=>$result['status'], "character_.level"=>$result['level'], "character_.class"=>$result['class'], "account.karma"=>$result['karma'], 
	  "account.hideme"=>$result['hideme'],  "character_.zonename"=>$result['zonename']);
    }
  }
  return $array;
}
function get_ips($x) {
	$HOSTNAME = "192.168.2.125";
	$USERNAME = "eq";
	$PASSWORD = "lansing222";
	$DATABASE = "ax_classic";
	$CON = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
	$query = "SELECT ip FROM account_ip where accid = '$x' ORDER BY lastused DESC LIMIT 1";
	$result = mysqli_query($CON, $query);
	$row = mysqli_fetch_array($result);
	return $row;
}
function get_classes($y) {
	// classes
	$classes = array("Warrior","Warrior","Cleric","Paladin","Ranger","Shadowknight","Druid",
	"Monk","Bard","Rogue","Shaman","Necromancer","Wizard","Magician","Enchanter",
	"Beastlord","Berserker");
for($i = 0; $i < sizeof($classes); $i++) {
	if($y == $i) {
		$y = $classes[$i];
	}
}
	return $y;
}
 function account_details($z) {
  global $mysql;
  $account_array = array();
  $character_array = array();
  $ip_array = array();
  $query = "SELECT * FROM account WHERE id= '$z'";
  $account_array = $mysql->query_assoc($query);

  //Load character names
  $query = "SELECT id, account_id, class, name FROM character_ WHERE account_id = '$z'";
  $character_array = $mysql->query_mult_assoc($query);
  if ($character_array) {
    $account_array['characters'] = $character_array;
  }
  
  //Load ip info
  $query = "SELECT * FROM account_ip WHERE accid = '$z'";
  $ip_array = $mysql->query_mult_assoc($query);
  if ($ip_array) {
    $account_array['ips'] = $ip_array;
  }
  return $account_array;
}
?>