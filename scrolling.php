
   
   <?php
 $con = mysql_connect('50.63.105.50','weeereg','Weeereg@123');
 if (!$con)
   {
   die('Could not connect: ' . mysql_error());
   }

 $db_selected = mysql_select_db("weeereg",$con);
 $sql = "SELECT * from weeereg";
 $result = mysql_query($sql,$con);?>
<marquee behavior="scroll" direction="left"  bgcolor="#aaafc2"  scrollamount="4"  scrolldelay="50"onmouseover="this.stop()" onmouseout="this.start()"style="height: 55%;" ><?php 
 while ($row = mysql_fetch_object($result))
   {
   echo $row->OrgName . "&nbsp;" .  "&nbsp;" ."|". "&nbsp;"  ."&nbsp;"; 
   }
   ?></marquee>
