<?php
/*
 * Get calendar full HTML
 */

function getCalender($year = '', $month = '') {
	$dateYear = ($year != '') ? $year : date("Y");
	$dateMonth = ($month != '') ? $month : date("m");
	$date = $dateYear . '-' . $dateMonth . '-01';
	$currentMonthFirstDay = date("N", strtotime($date));
	$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear);
	$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7) ? ($totalDaysOfMonth) : ($totalDaysOfMonth + $currentMonthFirstDay);
	$boxDisplay = ($totalDaysOfMonthDisplay <= 35) ? 35 : 42;
	?>



	<div style="margin-top: 20px" > <a href="../index.php" class="btn btn-info" role="button">Back to Home Page</a></div>



	<div class="container text-center">

		<div class="row">
			<div class="col-lg-8 col-sm-12 col-xs-12" style="margin-right: 0px">
				<div id="calender_section">
					<h2>
						<a href="javascript:void(0);" onclick="getCalendar('calendar_div', '<?php echo date("Y", strtotime($date . ' - 1 Month')); ?>', '<?php echo date("m", strtotime($date . ' - 1 Month')); ?>');">&lt;&lt;</a>
						<select name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths($dateMonth); ?></select>
						<select name="year_dropdown" class="year_dropdown dropdown"><?php echo getYearList($dateYear); ?></select>
						<a href="javascript:void(0);" onclick="getCalendar('calendar_div', '<?php echo date("Y", strtotime($date . ' + 1 Month')); ?>', '<?php echo date("m", strtotime($date . ' + 1 Month')); ?>');">&gt;&gt;</a>
					</h2>

					<div id="calender_section_top">
						<ul>
							<li>Sun</li>
							<li>Mon</li>
							<li>Tue</li>
							<li>Wed</li>
							<li>Thu</li>
							<li>Fri</li>
							<li>Sat</li>
						</ul>
					</div>
					<div id="calender_section_bot">
						<ul>
	<?php
	$dayCount = 1;
	for ($cb = 1; $cb <= $boxDisplay; $cb++) {
		if (($cb >= $currentMonthFirstDay + 1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)) {
			//Current date
			$currentDate = $dateYear . '-' . $dateMonth . '-' . $dayCount;
			$eventNum = 0;

			$result = sql("SELECT title FROM events WHERE date = '" . $currentDate . "' AND status = 'Active'", $e0);
			$eventNum = $result->num_rows;
			//Define date cell color
			if (strtotime($currentDate) == strtotime(date("Y-m-d")) ) {
				
				
				if ($eventNum > 0){
				
			
				
				echo '<li date="' . $currentDate . '" class="grey date_cell">'.'<span>'.$dayCount.'</span>'.'<a href="javascript:;" onclick=" getEvents(\'' . $currentDate . '\');">Appt. (' . $eventNum . ')</a>';;
				
				} else {
					echo '<li date="' . $currentDate . '" class="grey date_cell">'.'<span>'.$dayCount.'</span>';
				}
				
				
				
			} elseif ($eventNum > 0) {
				echo  '<li date="' . $currentDate . '" class="light_sky date_cell">'.'<span>'.$dayCount.'</span>'.'<a href="javascript:;" onclick=" getEvents(\'' . $currentDate . '\');">Appt. (' . $eventNum . ')</a>';
			} else {
				echo '<li date="' . $currentDate . '" class="date_cell">'.'<span>'. $dayCount.'</span>';
			}

			echo '</li>';
			$dayCount++;
			?>
								<?php } else { ?>
									<li><span>&nbsp;</span></li>
								<?php }
							}
							?>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-xs-8 col-lg-4">

				<div id="event_list" class="none"></div>
			</div>
		</div>
	</div>
	<script>
		$j(document).ready(function () {
			$j('.date_cell').mouseenter(function () {
				date = $j(this).attr('date');
				$j(".date_popup_wrap").fadeOut();
				$j("#date_popup_" + date).fadeIn();
			});
			$j('.date_cell').mouseleave(function () {
				$j(".date_popup_wrap").fadeOut();
			});
			$j('.month_dropdown').on('change', function () {
				getCalendar('calendar_div', $j('.year_dropdown').val(), $j('.month_dropdown').val());
			});
			$j('.year_dropdown').on('change', function () {
				getCalendar('calendar_div', $j('.year_dropdown').val(), $j('.month_dropdown').val());
			});
			$j(document).click(function () {
				$j('#event_list').show();
			});
		});
	</script>

	<?php
}

/*
 * Get months options list.
 */

function getAllMonths($selected = '') {
	$options = '';
	for ($i = 1; $i <= 12; $i++) {
		$value = ($i < 10) ? '0' . $i : $i;
		$selectedOpt = ($value == $selected) ? 'selected' : '';
		$options .= '<option value="' . $value . '" ' . $selectedOpt . ' >' . date("F", mktime(0, 0, 0, $i + 1, 0, 0)) . '</option>';
	}
	return $options;
}

/*
 * Get years options list.
 */

function getYearList($selected = '') {
	$options = '';
	for ($i = 2015; $i <= 2025; $i++) {
		$selectedOpt = ($i == $selected) ? 'selected' : '';
		$options .= '<option value="' . $i . '" ' . $selectedOpt . ' >' . $i . '</option>';
	}
	return $options;
}

/*
 * Get events by date
 * select * from event where date="2016-08-08"  AND status = "Active" ORDER BY time
 */

function getEvents($date = '') {
	$eventListHTML = '';
	$date = $date ? $date : date("Y-m-d");
	//Get events based on the current date
//include 'dbConfig.php';
	
	$result = sql("SELECT * FROM events WHERE date = '" . $date . "' AND status = 'Active'  ORDER BY time ", $e0);
	if ($result->num_rows > 0) {
		
		$eventListHTML .= '<h3>' . date("l, d M Y", strtotime($date)) . '</h3>';
		$eventListHTML .= '<ul class="text-left">';

		while ($row = $result->fetch_assoc()) {
			$name = sql("select first_name from patients where id='" . $row['name_patient'] . "'", $e0);
			if ($row_name = $name->fetch_assoc()) {
				$s = config("adminConfig");

				$eventListHTML .= "<li>" . $row['title'] . "  of   " . $row_name['first_name'] . "   at  " . date(substr($s['PHPDateTimeFormat'], 7), strtotime($row['time'])) . "</li>";
			}
		}
		$eventListHTML .= '</ul>';
	}
	echo $eventListHTML;
}
?>

<?php //include_once("$currDir/footer.php");  ?>
