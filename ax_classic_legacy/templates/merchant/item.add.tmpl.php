      <center>
        <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
        <input id="button" type="button" value='Hide Item Search' onclick='hideSearch("searchframe");' style='display:none; margin-bottom: 20px;'>
      </center>

       <form method="post" action="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&action=5">
         <div class="edit_form" style="width: 200px">
           <div class="edit_form_header">
	  	       Add an Item to Merchant <?=$mid?>
           </div>
           <div class="edit_form_content">
             <strong>Enter an Item ID:</strong> (<a href="javascript:showSearch('searchframe');">search</a>)<br>
             <input class="indented" id="id" type="text" name="itemid"><br><br>
             <center>
               <input type="hidden" name="mid" value="<?=$mid?>">
               <input type="submit" name="submit" value=" Submit ">
             </center>
           </div>
         </div>
       </form>