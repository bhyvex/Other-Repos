       <center>
        <div class="page_title"><span><br>AX-Classic Online Editing Interface</span></div>
        <img src="images/dontpanic.jpg">
        <div class="page_title"><span>Boomba The Big Revised: September 15, 2017</span></div>
       <p class="editor">
	   <?php
			error_reporting(E_ALL); //(E_ALL, 0)
			$editor = "http://www.axclassic.com/changelog_php.txt";
			$myfile = fopen($editor, "rb");
			
			for($i=0;$i<18;$i++) {
			if($i == 17) {
				echo fgets($myfile) . "<span>...<font size='1'><a href='http://www.axclassic.com/changelog_php.txt'><b><u>More</u></b></a></font></span>";
				fclose($myfile);
			} else {
				echo fgets($myfile) . "<br>";
				}
		}
		?>
	   </p>
	   </center>