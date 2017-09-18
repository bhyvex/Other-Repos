<!-- events.php -->
<!-- Also, all Full Name information goes here event.tmpl.php -->
<?
$event1 = "New Year's Event";
$event2 = "Easter Event";
$event3 = "Bloodhunt Event";
$event4 = "Pitch Black Event";
$event5 = "Random Moonstone Event";
$event6 = "Christmas Event";
$event7 = "Band Dislikes Orcs";
$event8 = "";
$eventarr = array($event1, $event2, $event3, $event4, $event5, $event6, $event7, $event8);
?>
        <div class="table_container" style="width: 400px;">
          <div class="table_header">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td>
				<!-- Active events here -->
				<?$y = 0;$zero = 0; foreach($events as $head=>$g) {
					$active = $g['value'];
					if($active == 1) {
						echo  $g['name'] . " " . $eventarr[$y] . " is currently running!";
					} elseif($active == 0) {
						$zero++;
						if($zero == sizeof($events)) {
						echo "No Events are running";
						}
					}
					$y++;
				}
			    ?>
				</td>
                <td align="right"><a onClick="return confirm('Terminate all events?');" href="index.php?editor=events&action=1"><img src="images/remove3.gif" border="0" title="Terminate all Events"></a>&nbsp;&nbsp;<a onClick="return confirm('Add an Event?');" href="index.php?editor=events&action=3"><img src="images/add2.gif" border="0" title="Add an Event"></a></td>
              </tr>
            </table>
          </div>
          <table class="table_content2" width="100%">
<?if (isset($events)) :?>
            <tr>
              <td align="center" width="5%"><strong>Event</strong></td>
			  <td align="center" width="20%"><strong>Full Name</strong></td>
              <td align="center" width="5%"><strong>Value</strong></td>
            </tr>
<?$x=0; foreach($events as $events=>$v):?>
            <tr bgcolor="#<? echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
			
              <td align="center" width="5%"><?=$v['name']?></td>
			  <td align="center" width="5%"><?echo $eventarr[$x]?></td>
              <td align="center" width="5%"><?=$v['value']?></td>
             
              <td align="right" width="5%"><a onClick="return confirm('Activate <?=$v['name']?>?');" href="index.php?editor=events&name=<?=$v['name']?>&action=2"><img src="images/next.gif" border="0" title="Activate this Event"></a></td>
            </tr>
<?$x++; endforeach;?>
<?endif;?>
<?if (!isset($events)):?>
            <tr>
              <td align="left" width="100" style="padding: 10px;">No events in Database.</td>
            </tr>
<?endif;?>
          </table>
        </div>
