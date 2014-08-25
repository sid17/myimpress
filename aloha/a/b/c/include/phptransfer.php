
		




<script type="text/javascript">
   for (var i=1;i<=1;i++)
   {
	Aloha.ready( function( ) {
		// Prepare
		var	$ = Aloha.jQuery,
			$body = $('body');
            $(".step").each(function() {
             $(this).aloha();
			$(this).blur(function(){

		     var id= $(this).attr("id");
             var e = Aloha.getEditableById(id);
		    $('#content1').html(e.getContents());
		    $('#divid').html(id);
		    $('#form').submit(); 
            });
		});
		});
}
			


			

	
	</script>



