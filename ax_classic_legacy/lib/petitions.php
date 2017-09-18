<?
 switch ($action) {
	case 0: // View petitions
		check_admin_authorization();
		$body = new Template("templates/petitions/petition.tmpl.php");
		#$body = new Template("templates/server/server.default.tmpl.php");
		$petitions = get_petitions();
		if ($petitions) {
		  foreach ($petitions as $key=>$value) {
			$body->set($key, $value);
		   }
		 }
		break;
	case 2: // Petition Details
		check_admin_authorization();
		$breadcrumbs .= " >> Petition Details";
		$body = new Template("templates/petitions/petition.view.tmpl.php");
		
		$body->set('yesno', $yesno);
		$body->set('classes', $classes);
		$body->set('races', $races);
		$petition = view_petition();
		if ($petition) {
		  foreach ($petition as $key=>$value) {
			$body->set($key, $value);
		   }
		 }
		break;
	case 3: // Update Petition
		check_admin_authorization();
		update_petition();
		header("Location: index.php?editor=petitions&action=0");
		exit;
    case 4: // Delete Petition
		check_admin_authorization();
		delete_petition();
		header("Location: index.php?editor=petitions&action=0");
		exit;
 }
	 
	 
function get_petitions() {
  global $mysql;

  $query = "SELECT dib, petid, accountname, charname, zone, senttime FROM petitions order by senttime DESC";
  $result = $mysql->query_mult_assoc($query);
  if ($result) {
    foreach ($result as $result) {
      $array['petitions'][$result['dib']] = array("dib"=>$result['dib'], "petid"=>$result['petid'], "accountname"=>$result['accountname'], "charname"=>$result['charname'], "senttime"=>$result['senttime'], "zone"=>$result['zone']);
    }
  }
  return $array;
}
function view_petition() {
  global $mysql;

  $dib = $_GET['dib'];

  $query = "SELECT * FROM petitions where dib = \"$dib\"";
  $result = $mysql->query_assoc($query);
  
  return $result;
}
function update_petition() {
  global $mysql;

  $dib = $_POST['dib'];
  $ischeckedout = $_POST['ischeckedout'];
  $lastgm = $_POST['lastgm'];
  $gmtext = $_POST['gmtext'];

  $query = "UPDATE petitions SET ischeckedout=\"$ischeckedout\", lastgm=\"$lastgm\", gmtext=\"$gmtext\" WHERE dib=\"$dib\"";
  $mysql->query_no_result($query);
}
function delete_petition() {
  global $mysql;

  $dib = $_GET['dib'];

  $query = "DELETE FROM petitions WHERE dib=\"$dib\"";
  $mysql->query_no_result($query);
}
?>
   