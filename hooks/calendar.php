<?php
define('PREPEND_PATH','../');
include("../defaultLang.php"); //1
include("../language.php"); //2
include("../lib.php"); //3
// this is the core file of the appGini
include_once("../hooks/calendar-functions.php");

if (isset($_POST['func']) && !empty($_POST['func'])) {
	switch ($_POST['func']) {
		case 'getCalender':
			getCalender($_POST['year'], $_POST['month']);
			exit;
		case 'getEvents':
			getEvents($_POST['date']);
			exit;
		default:
			break;
	}
}

include_once("../header.php");

?>
<link type="text/css" rel="stylesheet" href="../hooks/resources/calendar.css"/>


<div id="calendar_div">
	<?php 
	
	
	
	
	echo getCalender(); 
	
	
	
	?>
	
	
	<script type="text/javascript">
		function getCalendar(target_div, year, month) {
			$j.ajax({
				type: 'POST',
				url: 'calendar.php',
				data: 'func=getCalender&year=' + year + '&month=' + month,
				success: function (html) {
					$j('#' + target_div).html(html);
				}
			});
		}

		function getEvents(date) {
			$j.ajax({
				type: 'POST',
				url: 'calendar.php',
				data: 'func=getEvents&date=' + date,
				success: function (html) {
					$j('#event_list').html(html);
					$j('#event_list').slideDown('slow');
				}
			});
		}


	
	</script>
</div>
<?php include_once("../footer.php"); // include the footer file
?>
