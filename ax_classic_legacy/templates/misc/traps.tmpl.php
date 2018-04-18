      <div class="table_container" style="width: 750px;">
      <div class="table_header">
        <table width="100%" cellpadding="0" cellspacing="0">
          <tr>
           <td>Traps</td>
           <td align="right">    
          <a href="index.php?editor=misc&z=<?=$currzone?>&action=23"><img src="images/add.gif" border="0" title="Add an entry to this zone"></a>
            </td>
           </tr>        
         </table>
      </div>

       <table class="table_content2" width="100%">
<? if (isset($traps)):?>
         <tr>
          <td align="center"><strong>id</strong></td>
          <td align="center"><strong>x</strong></td>
          <td align="center"><strong>y</strong></td>
          <td align="center"><strong>z</strong></td>
          <td align="center"><strong>maxzdiff</strong></td>
          <td align="center"><strong>radius</strong></td>
          <td align="center"><strong>chance</strong></td>
          <td align="center"><strong>effect</strong></td>
          <td align="center"><strong>value</strong></td>
          <td align="center"><strong>value2</strong></td>
          <td align="center"><strong>skill</strong></td>
          <td align="center"><strong>level</strong></td>
          <td align="center"><strong>respawn</strong></td>
          <td align="center"><strong>variance</strong></td>
          <td align="center"><strong>version</strong></td>
          <td align="center"></td>
         </tr>
<?$x=0; foreach($traps as $traps=>$v):?>
        <tr bgcolor="#<? echo ($x % 2 == 0) ? "AAAAAA" : "BBBBBB";?>">
          <td align="center"><?=$v['tid']?></td>
          <td align="center"><?=$v['x_coord']?></td>
          <td align="center"><?=$v['y_coord']?></td>
          <td align="center"><?=$v['z_coord']?></td>
          <td align="center"><?=$v['maxzdiff']?></td>
          <td align="center"><?=$v['radius']?></td>
          <td align="center"><?=$v['chance']?>%</td>
          <td align="center"><?=$traptype[$v['effect']]?></td>
<?if($v['effect'] == 2 || $v['effect'] == 3):?>
          <td align="center"><a href="index.php?editor=npc&z=<?=get_zone_by_npcid($v['effectvalue'])?>&npcid=<?=$v['effectvalue']?>"><?=getNPCName($v['effectvalue'])?></td>
<?endif;?>
<?if($v['effect'] == 1 || $v['effect'] == 4):?>
          <td align="center"><?=$v['effectvalue']?></td>
<?endif;?>
<?if($v['effect'] == 0):?>
          <td align="center"><?=getSpellName($v['effectvalue'])?> <span>[<a href="http://lucy.allakhazam.com/spell.html?id=<?=$v['effectvalue']?>">lucy</a>]</span>
<?endif;?>    
<?if($v['effect'] == 1):?>   
          <td align="center"><?=$alarmtype[$v['effectvalue2']]?></td>  
<?endif;?>
<?if($v['effect'] < 1 || $v['effect'] > 1):?>
          <td align="center"><?=$v['effectvalue2']?></td>
<?endif;?> 
          <td align="center"><?=$v['skill']?></td>
          <td align="center"><?=$v['level']?></td>
          <td align="center"><?=$v['respawn_time']?></td>
          <td align="center"><?=$v['respawn_var']?></td>
          <td align="center"><?=$v['version']?></td>
          <td>      
            <a href="index.php?editor=misc&z=<?=$currzone?>&tid=<?=$v['tid']?>&action=20"><img src="images/edit2.gif" border="0" title="Edit Entry"></a>          
            <a onClick="return confirm('Really Delete Trap <?=$v['tid']?>?');" href="index.php?editor=misc&z=<?=$currzone?>&tid=<?=$v['tid']?>&action=22"><img src="images/remove3.gif" border="0" title="Delete this entry"></a>
          </td>
        </tr>
        <?$x++; endforeach;?>
        </table>
        <?endif;?>
<? if (!isset($traps)):?>
        <tr>
          <td align="left" width="100" style="padding: 10px;">Walk confidently, there are no traps here</td>
        </tr>
<?endif;?>