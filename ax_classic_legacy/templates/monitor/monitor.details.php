  <div class="table_container">
    <div class="table_header">
      <div style="float:right">
      </div>
	  <?=$id?> - <?echo trim($name);?>
    </div>
    <div class="table_content">
      <table cellspacing="0" border="0" width="100%">
        <tr>
          <td width="100%">
            <table cellspacing="0" border="0" width="100%">
              <tr>
                <td width="45%">
                  <fieldset>
                    <legend align="center"><strong>Account Info</strong></legend>
                    <b>Account ID:</b> <?=$id?><br/>
                    <b>LS Name:</b> <?=$name?><br/>
                    <b>LS ID:</b> <?=$lsaccount_id?><br/>
                    <b>Status:</b> <?=$status?><br/>
                    <b>GM Speed:</b> <?=$yesno[$gmspeed]?><br/>
                    <b>Hide Me:</b> <?=$yesno[$hideme]?><br/>
                    <b>Karma:</b> <?=$karma?><br/>
					<b>Revoked:</b> <?=$yesno[$revoked]?><br/><br/>
                    <b>Suspended:</b> N/A<br/>
                    <b>SuspendReason:</b> N/A<br/>
                    <b>Ban Reason:</b> N/A<br/>
                    <b>Account Created:</b> N/A<br/>
                  </fieldset>
                </td>
                <td width="55%" rowspan="2">
                  <fieldset>
                    <legend align="center"><strong>IP Address Info</strong></legend>
                    <table>
                      <tr>
                        <td width="40%"><center><b>IP Address</b></center></td>
                        <td width="20%"><center><b>Login Count</b></center></td>
                        <td width="40%"><center><b>Last Login</b></center></td>
                      </tr>
<?
  if ($ips) {
    foreach ($ips as $ip_address) {
      echo '<tr>';
      echo '<td width="40%"><center>' . $ip_address['ip'] . '</center></td>';
      echo '<td width="20%"><center>' . $ip_address['count'] . '</center></td>';
      echo '<td width="40%"><center>' . date("Y M d", strtotime($ip_address['lastused'])) . "&nbsp;&nbsp;" . date("g:ia", strtotime($ip_address['lastused'])) . '</center></td>';
      echo '</tr>';
    }
  }
?>
                    </table>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td>
                  <fieldset>
                    <legend align="center"><strong>Characters</strong></legend>
<?
  if ($characters) {
    $count = 0;
    echo '<table cellspacing="0" border="0" width="100%">';
    foreach ($characters as $character) {
      $count++;
      echo '<tr>';
      echo '<td width="25%"><b>Character' . $count . ': </b></td>';
      echo '<td width="60%">';
      echo ($character['id'] != '') ? '<a>' . $character['name'] . '</a> (' . $character['id'] . ')' : 'EMPTY';
      echo '</td>';
      echo '<td width="15%" align="right"><img src="images/user.gif" height="13" width="13" title="Disabled"><img src="images/remove.gif" title="Disabled"></td>';
      echo '</tr>';
    }
    echo '</table>';
  }
  else {
    echo '<br/><br/><center>NO CHARACTERS ON THIS ACCOUNT</center><br/>';
  }
  echo '<br/>';
?>
                   <b>Last Character Used:</b> <?echo ($charname != '') ? $charname : 'Never Logged a Character';?><br/>
                  </fieldset>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </div>
