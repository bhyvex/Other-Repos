       <table class="edit_form">
         <tr>
           <td class="edit_form_header">
             Change Merchant ID
           </td>
         </tr>
         <tr>
           <td class="edit_form_content">
             <form name="merchant_id" method="post" action="index.php?editor=npc&z=<?=$currzone?>&npcid=<?=$npcid?>&action=23">
             New Merchant ID: <br>
             <input type="text" name="merchant_id" value="<?=$merchant_id?>"><br><br>
             <center>
               <input type="submit" value="Submit"></form><br><br>
             
               or<br><br>
             
               <a href="index.php?editor=npc&z=<?=$currzone?>&npcid=<?=$npcid?>&merchant_id=<?=$suggested_id?>&action=23">Assign next available ID</a>
             </center>
           </td>
         </tr>
       </table>
