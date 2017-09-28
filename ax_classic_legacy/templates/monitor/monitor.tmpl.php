        <div class="table_container" style="width: 750px;">
          <div class="table_header">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td>
				<?foreach($getcount as $getcount) {
					$players = $getcount['count(name)'];
						if($players == 0) {
							echo "No players online";
						} elseif($players == 1) {
							echo $players . " player online";
						} else {
							echo $players . " players online";
						}
				?></td>
                <td align="right">&nbsp;</td>
              </tr>
            </table>
          </div>
          <table class="table_content2" width="100%">
<?if (isset($monitor)):?>
            <tr>
              <td align="center" width="10%"><strong>ACC ID</strong></td>
              <td align="center" width="10%"><strong>IP Address</strong></td>
              <td align="center" width="10%"><strong>Character</strong></td>
              <td align="center" width="10%"><strong>LS Name</strong></td>
              <td align="center" width="5%"><strong>Status</strong></td>
			  <td align="center" width="5%"><strong>Level</strong></td>
			  <td align="center" width="7%"><strong>Class</strong></td>
			  <td align="center" width="7%"><strong>Karma</strong></td>
			  <td align="center" width="5%"><strong>HideMe</strong></td>
			  <td align="center" width="8%"><strong>Location</strong></td>
            </tr>
<?if ($players > 0):?>
<?foreach($monitor as $monitor=>$v):?>
<?$accid = $v['character_.account_id'];
$getips = get_ips($accid);
$classid = $v['character_.class'];
$getclass = get_classes($classid);

?>
            <tr bgcolor="#<? echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
              <td align="center" width="10%"><?=$v['character_.account_id']?></td>
              <td align="center" width="10%"><?=$getips['ip'];?></td>
              <td align="center" width="10%"><?=$v['character_.name']?></td>
              <td align="center" width="10%"><a href="index.php?editor=monitor&accountid=<?echo $v['character_.account_id'];?>&accountname=<?=$v['account.name']?>&action=1"><?=$v['account.name']?></a></td>
              <td align="center" width="5%"><?=$v['account.status']?></td>
              <td align="center" width="5%"><?=$v['character_.level']?></td>
              <td align="center" width="10%"><?=$getclass?></td>
              <td align="center" width="5%"><?=$v['account.karma']?></td>
			  <td align="center" width="7%"><?=$v['account.hideme']?></td>
			  <td align="center" width="7%"><?=$v['character_.zonename']?></td>
			</tr>

<?endforeach;// Closure from line 37?>
<?endif;// Closure from line 36?>
<?endif;// Closure from line 21?>
<?if ($players == 0):?>
            <tr>
              <td align="left" width="100" style="padding: 10px;"></td>
            </tr>
<?endif;?>
<?}// Closure from line 15 ?> 
          </table>
        </div>
