<?
 switch ($action) {
	case 0: // View List of Events
		check_admin_authorization();
		$body = new Template("templates/events/event.tmpl.php");
		$events = get_events();
		if ($events) {
		  foreach ($events as $key=>$value) {
			$body->set($key, $value);
		   }
		 }
		break;
	case 1: // Terminate all events
		check_admin_authorization();
		terminate_events();
		header("Location: index.php?editor=events&action=0");
		exit;
	case 2: // Activate an Event
		check_admin_authorization();
		activate_events();
		header("Location: index.php?editor=events&action=0");
		exit;
	case 3: // Adding an Event
		check_admin_authorization();
		create_events();
		header("Location: index.php?editor=events&action=0");
		exit;
 }
function get_events() {
  global $mysql;
  $query = "SELECT name, value FROM quest_globals WHERE name REGEXP \"event\" AND name NOT REGEXP \"grieg_event\" AND name NOT REGEXP \"th$\"";
  $result = $mysql->query_mult_assoc($query);
  if ($result) {
    foreach ($result as $result) {
      $array['events'][$result['name']] = array("name"=>$result['name'], "value"=>$result['value']);
	}
  }
  return $array;	    
}
function terminate_events() {
  global $mysql;
  $query2 = "SELECT name, value FROM quest_globals WHERE name REGEXP \"event\" AND name NOT REGEXP \"grieg_event\" AND name NOT REGEXP \"th$\"";
  $result = $mysql->query_mult_assoc($query2);
  $enum = sizeof($result);
  $query = "UPDATE quest_globals SET value=\"0\" WHERE name >=\"event1\" AND name <=\"event$enum\"";
  $mysql->query_no_result($query);
}
function activate_events() {
  global $mysql;
  $query3 = "SELECT name, value FROM quest_globals WHERE name REGEXP \"event\" AND name NOT REGEXP \"grieg_event\" AND name NOT REGEXP \"th$\"";
  $result = $mysql->query_mult_assoc($query3);
  $enum = sizeof($result);
$query2 = "UPDATE quest_globals SET value=\"0\" WHERE name >=\"event1\" AND name <=\"event$enum\"";
  $mysql->query_no_result($query2);
  
  $ename = $_GET['name'];
  $query = "UPDATE quest_globals SET value=\"1\" WHERE name=\"$ename\"";
  $mysql->query_no_result($query);
}
function create_events() {
  global $mysql;
  $query2 = "SELECT name, value FROM quest_globals WHERE name REGEXP \"event\" AND name NOT REGEXP \"grieg_event\" AND name NOT REGEXP \"th$\"";
  $result = $mysql->query_mult_assoc($query2);
  $enum = sizeof($result)+1; # <--- Increment the next event here
  $mysql->query_no_result($query2);
  
  $query = "INSERT INTO quest_globals SET name=\"event$enum\", value=\"0\", charid=\"0\", npcid=\"0\", zoneid=\"0\", expdate=NULL";
  $mysql->query_no_result($query);
}
?>