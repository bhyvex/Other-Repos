<div class="edit_form" style="width: 750px">
      <div class="edit_form_header">
        Add Trap
      </div>
	<div style="background-color: #BBBBBB; border-bottom: 0.5px solid black; padding-left: 3px">
		<table>
			<tr><td> Note: effectvalue & effectvalue2 have different properties depending
						on the 'effect' chosen from the pull-down selection:
			</td></tr>
		</table>
      </div>
      <div class="edit_form_content">
        <form name="traps" method="post" action=index.php?editor=misc&z=<?=$currzone?>&action=24">
        <table width="100%">
          <tr>
            <th>id</th>
            <th>zone</th>
            <th>x</th>
            <th>y</th>
            <th>z</th>
            <th>maxzdiff</th>
            <th>radius</th>
            <th>version</th>
          </tr>
          <tr>
            <td><input type="text" size="7" name="tid" value="<?=$suggesttid?>"></td>
            <td><input type="text" size="10" name="zone" value="<?=$currzone?>"></td>
            <td><input type="text" size="7" name="x_coord" value="0"></td>
            <td><input type="text" size="7" name="y_coord" value="0"></td>
            <td><input type="text" size="7" name="z_coord" value="0"></td>
            <td><input type="text" size="7" name="maxzdiff" value="0"></td>
            <td><input type="text" size="7" name="radius" value="0"></td>
            <td><input type="text" size="7" name="version" value="0"></td>
            
          </tr>
          <tr>
            
            <th>effectvalue</th>
            <th>effectvalue2</th>
            <th>chance</th>
            <th>skill</th>
            <th>level</th>
            <th>respawn</th>
            <th>variance</th>
            <th>effect</th>
          </tr>
		  
          <tr>
            <td><input type="text" size="7" name="effectvalue" value="0"></td>
            <td><input type="text" size="10" name="effectvalue2" value="0"></td>
            <td><input type="text" size="7" name="chance" value="0"></td>
            <td><input type="text" size="7" name="skill" value="0"></td>
            <td><input type="text" size="7" name="level" value="1"></td>
            <td><input type="text" size="7" name="respawn_time" value="60"></td>
            <td><input type="text" size="7" name="respawn_var" value="0"></td>
            <td><select class="left" name="effect">
<?foreach($traptype as $k => $v):?>
              <option value="<?=$k?>"<? echo ($k == $effect) ? " selected" : ""?>><?=$v?></option>
<?$x++; endforeach;?>
           </td></tr>
		  <tr>
			<th>message</th>
		  </tr>
		  <tr>
            <td colspan="7"><input type="text" size="50" name="message" value=""></td>  
          </tr>            
              </table><br><br>
			
        <center>
          <input type="submit" value="Submit Changes">
        </center>
      </form>
      </div>
	  <div style="background-color: #BBBBBB; border-top: 0.5px solid black; padding-left: 3px">
			<table>
			<tr><td><br>
				effect: Spell<br>
				effectvalue = spellid<br>
				effectvalue2 = unused<br><br>
			</td></tr>
			<tr><td>
				effect: Alarm<br>
				effectvalue = distance<br>
				effectvalue2 = 0 or 1 (0 means all npc's within distance. <br>
				1 means only npc's you have bad faction with within distance, Threateningly to Scowls)<br><br>
			</td></tr>
			<tr><td>
				effect: NPC's Wide<br>
				effectvalue = npctypeid<br>
				effectvalue2 = number of npc's (spawned using this caluculation:<br>
				x-5+rand()%10, y-5+rand()%10, z-5+rand()%10)<br><br>
			</td></tr>
			<tr><td>
				effect: NPC's Close<br>
				effectvalue = npctypeid<br>
				effectvalue2 = number of npc's (spawned using this caluculation:<br>
				x-2+rand()%10, y-2+rand()%4, z-2+rand()%4)<br><br>
			</td></tr>
			<tr><td>
				effect: Damage<br>
				effectvalue = damage range low<br>
				effectvalue2 = damage range high (using this calculation: dmg = <br>
				MakeRandomInt(effectvalue, effectvalue2))<br><br>
			 </td></tr>
			</table>
			</div>
      </div>