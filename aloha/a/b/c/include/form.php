             <?php
             require_once("include/constant.php");
             ?>
	     <form id="form" method="POST" action="processpresentation1.php?username=<?php echo $tryusername; ?>">
	      <textarea style="display:none" id="content1" name="content1">
             </textarea>
             <textarea style="display:none" id="divid" name="divid">
             </textarea>
             <input type="submit" value="Send to backend"/>
              </form>