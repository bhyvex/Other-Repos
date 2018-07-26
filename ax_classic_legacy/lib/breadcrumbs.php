<?

switch ($editor) {
  case '':
    break;
  case 'loot':
    $breadcrumbs = "Loot Editor";
    break;
  case 'npc':
    $breadcrumbs = "NPC Editor";
    break;
  case 'spawn':
    $breadcrumbs = "Spawn Editor";
    break;
  case 'merchant':
    $breadcrumbs = "Merchant Editor";
    break;
  case 'faction':
    $breadcrumbs = "Faction Editor";
    break;
  case 'spellset':
    $breadcrumbs = "Spellset Editor";
    break;
  case 'tradeskill':
    $breadcrumbs = "Tradeskill Editor";
    break;
  case 'zone':
    $breadcrumbs = "Zone Editor";
    break;
  case 'misc':
    $breadcrumbs = "Miscellaneous Editor";
    break;
  case 'server':
    $breadcrumbs = "Server Config";
    break;
  case 'adventures':
    $breadcrumbs = "Adventures Editor";
    break;
  case 'tasks':
    $breadcrumbs = "Task Editor";
    break;
  case 'items':
    $breadcrumbs = "Item Editor";
    break;
  case 'keys':
    $breadcrumbs = "Player Keys";
    break;
  case 'petitions':
    $breadcrumbs = "Player Petitions";
	break;
  case 'events':
    $breadcrumbs = "List of Events in DB";
	break;
  case 'economy':
    $breadcrumbs = "Server Economy";
	break;
  case 'monitor':
	$breadcrumbs = "Monitor Players";
	break;
  case 'chat':
    $breadcrumbs = "Chat Interface 2.0";
	break;
}

if ($z != '') $breadcrumbs .= " >> " . getZoneLongName($z) . "  (" . $z . ")";
if ($npcid != '' && $npcid != 'ID') $breadcrumbs .= " >> " . getNPCName($npcid) . " ($npcid)";
if ($fid != '') $breadcrumbs .= " >> " . getFactionName($fid);
if ($tskid != '') $breadcrumbs .= " >> " . getTaskTitle($tskid);
if ($ts != '') $breadcrumbs .= " >> " . $tradeskills[$ts];
if ($rec != '0') $breadcrumbs .= " >> " . getRecipeName($rec);
if ($spellset != '') $breadcrumbs .= " >> " . getSpellsetName($spellset);
if ($itemid != '' && $itemid != 'ID') $breadcrumbs .= " >> " . get_item_name($itemid) . " ($itemid)";

?>
