<!-- rows etc go here -->
  <div class="table_container" style="width: 600px;">
    <div class="table_header">
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left">Server Economy (Last checked 9/24/2017)</td>
        </tr>
      </table>
    </div>
    <div class="table_content">
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td class="edit_form_content">
            <fieldset>
              <legend align="center"><strong>Total Cash on Rathe</strong></legend>
              <table class="edit_form_content" width="100%">
                <tr>
                  <th align="center">Platinum</th>
				  <th align="center">Gold</th>
				  <th align="center">Silver</th>
				  <th align="center">Copper</th>
          
                </tr>
                <tr>
				  <td align="center" width="25%"><?=$cash['platinum'];?></td>
				  <td align="center" width="25%"><?=$cash['gold'];?></td>
				  <td align="center" width="25%"><?=$cash['silver'];?></td>
                  <td align="center" width="25%"><?=$cash['copper'];?></td>
            
                </tr>
              </table>
            </fieldset>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td class="edit_form_content">
            <fieldset>
              <legend align="center"><strong>Top Wealthiest Players by Total Platinum</strong></legend>
              <table class="edit_form_content" width="100%">
                <tr>
                  <th align="center">Account ID</th>
                  <th align="center">Charname</th>
                  <th align="center">Last Login</th>
                  <th align="center">Platinum</th>
				  <th align="center">Platinum_Bank</th>
				  <th align="center">Total Platinum</th>
                </tr>

<?foreach ($richest as $players=>$z):?>
                <tr>
                  <td align="center"><?=$z['account_id']?></td>
                  <td align="center"><?=$z['name']?></td>
                  <td align="center"><?=$z['timelaston']?></td>
                  <td align="center"><?=$z['FORMAT(platinum, 0)']?></td>
                  <td align="center"><?=$z['FORMAT(platinum_bank, 0)']?></td>
				  <td align="center"><?=$z['FORMAT((platinum + platinum_bank), 0)']?></td>
                </tr>
<?endforeach;?>
              </table>
            </fieldset>
          </td>
        </tr>
      </table>
      
    </div>
  </div>
