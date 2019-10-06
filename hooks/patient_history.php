<?php
define('PREPEND_PATH','../');
include("../defaultLang.php"); //1
include("../language.php"); //2
include("../lib.php"); //3
// this is the core file of the appGini
include_once("../header.php");
if (isset($_REQUEST['dvprint_x']))
	return;
$word = $_REQUEST['search']; // 3shan 2t2d in intger bs acept
$patients_table = get_sql_from('patients');
$result = sql("select * from patients where history LIKE '%" . $word . "%' ", $e0);
?>

<div class="input-group">
	<span class="input-group-btn">
		<a href="reports.php" class="btn btn-info hidden-print btn btn-secondary" role="button">Back to Reports</a>
	</span>
	<button class="btn btn-primary  hidden-print" type="button" id="sendToPrinter" onclick="window.print();"><i class="glyphicon glyphicon-print"></i> Print</button>
</div>





<div style="height: 90px"></div>
<?php if(db_num_rows($result)){?>
<table class="table table-striped table-bordered">
	<thead>

	<th class="text-center" style="color:#0066ff ; font-size: 15px"> Name</th>
	<th class="text-center" style="color:#0066ff ; font-size: 15px">Age</th>
	<th class="text-center" style="color:#0066ff ; font-size: 15px">Home Phone</th>
	<th class="text-center" style="color:#0066ff ; font-size: 15px">Work Phone</th>
	<th class="text-center" style="color:#0066ff ; font-size: 15px"> Image</th>
	<th class="text-center" style="color:#0066ff ; font-size: 15px"> Gender</th>
	<th class="text-center" style="color:#0066ff ; font-size: 15px">State</th>
	<th class="text-center" style="color:#0066ff ; font-size: 15px">History</th>
</thead>

<tbody>
<?php while ($order = db_fetch_assoc($result)) { ?>
		<tr>
			<td class="text-left"><a href="patients_view.php?SelectedID=<?= $order['id'] ?>"><?php echo $order['last_name']; ?>  <?php echo " ,   " . $order['first_name']; ?></a></td>

			<td class="text-right"><?php echo $order['age']; ?></td>
			<td class="text-right"><?php echo $order['home_phone']; ?></td>
			<td class="text-right"><?php echo $order['work_phone']; ?></td>
			<td class="text-center">
	<?php if ($order['image']) {
		?>
					<img src="../images/<?php echo $order['image']; ?>" alt="Smiley face" height="42" width="42">
				<?php }
				?>
			</td>
			<td class="text-left"><?php echo $order['gender']; ?></td>
			<td class="text-left"><?php echo $order['state']; ?></td>
			<td class="text-left"><?php echo $order['history']; ?></td>



		</tr>
<?php } ?>

</tbody>

</table>

<?php }else{
	echo '<div class="alert alert-danger">' . $Translation['No records found']. '</div>';
}?>
<?php
include_once("../footer.php"); // include the footer file
?>

