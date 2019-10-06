<?php

$script_name = basename($_SERVER['PHP_SELF']); // the url without the path
if ($script_name == 'index.php' && isset($_GET['signIn'])) {
	//echo "the form of loggin";
	?>
<script src="resources/jquery/js/jquery.background-fit.min.js"></script>
	<style>
		body{
			//background: url("images/hos.png") no-repeat fixed center center / cover;
			background-image:  url("images/hos.png");
			margin-top: 50px;
			background-position-y:60px;
			background-repeat: no-repeat;
         background-size: 40%;
		 

		}

	</style>


	<script>
		$j(function() {
  $j("body").bg_fit();
});
	</script>

<?php }
?>