      <div class="table_container" style="width: 650px;">
      <div class="table_header">
        <table width="100%" cellpadding="0" cellspacing="0">
          <tr>
           <td>Hackers</td>
           <td align="right">
            </td>
           </tr>        
         </table>
      </div>

       <table class="table_content2" width="100%">
<? if (isset($hackers)) :?>
         <tr>
          <td align="center" width="5%"><strong>ID</strong></td>
          <td align="center" width="5%"><strong>Account</strong></td>
          <td align="center" width="5%"><strong>Name</strong></td>
          <td align="center" width="5%"><strong>Zone</strong></td>
          <td align="center" width="15%"><strong>Date</strong></td>
		  <td align="center" width="15%"><strong>Hack</strong></td>
          <th width="5%"></th>
         </tr>
      <?$x=0; foreach($hackers as $hackers=>$v):?>
        <tr bgcolor="#<? echo ($x % 2 == 0) ? "AAAAAA" : "BBBBBB";?>">
          <td align="center" width="5%"><?=$v['hid']?></td>
          <td align="center" width="5%"><?=$v['account']?></td>
          <td align="center" width="5%"><?=$v['name']?></td>  
          <td align="center" width="5%"><?=$v['zone']?></td>
          <td align="center" width="15%"><?=date("Y M d", strtotime($v['date'])) . "&nbsp;&nbsp;" . date("g:ia", strtotime($v['date']))?></td>
		  <td align="center" width="15%"><a><?=substr($v['hacked'], 0, 23)?></a></td>
          <td align="right">      
            <a href="index.php?editor=server&hid=<?=$v['hid']?>&action=24"><img src="images/edit2.gif" border="0" title="Hacker Details"></a>            
            <a onClick="return confirm('Really Delete Entry <?=$v['hid']?>?');" href="index.php?editor=server&hid=<?=$v['hid']?>&action=19"><img src="images/remove3.gif" border="0" title="Delete this entry"></a>
         </td>
       </tr>
        <?$x++; endforeach;?>
         </table>
        <?endif;?>