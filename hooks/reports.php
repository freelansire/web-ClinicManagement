
<?php
define('PREPEND_PATH','../');
include("../defaultLang.php"); //1
include("../language.php"); //2
include("../lib.php"); //3
// this is the core file of the appGini
include_once("../header.php");
?>

<?php
echo '<div style="height:60px;">' . '</div>';

echo '<div class="btn-group-vertical btn-group-lg" style="width: 100%;">' .
 '<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">' .
 '<i class="glyphicon glyphicon-search"></i> Search Patients by History</button>' .
 '</div>';

echo '<div style="height:60px;">' . '</div>';


echo '<div class="btn-group-vertical btn-group-lg" style="width: 100%;">' .
 '<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal2">' .
 '<i class="glyphicon glyphicon-search"></i> Search  Patients by Prescription</button>' .
 '</div>';


echo '<div style="height:60px;">' . '</div>';


echo '<div class="btn-group-vertical btn-group-lg" style="width: 100%;">' .
 '<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal3">' .
 '<i class="glyphicon glyphicon-search"></i> Search  Patients by Diagnosis</button>' .
 '</div>';

include_once("../footer.php"); // include the footer file
?>




<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search By Patient History </h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <form action="patient_history.php" method="post">
                        <div class="form-group">

                            <div class="row">
                                <div class="col-sm-8" style="margin-left: 0px" >
                                    <input type="text" name="search" id="search_box" class="form-control"  />
                                </div>
                                <div class="col-sm-4" >    
                                    <div id="searchresults">
                                        <p id="results" class="update"> matching results
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <button type="submit" class="btn btn-success">Search</button>

                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>







<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search  Patients by Prescription</h4>
            </div>
            <div class="modal-body">


                <div class="form-grouPresciptionp">
                    <form action="patient_prescription.php" method="get">
                        <div class="form-group">

                            <div class="row">
                                <div class="col-sm-8" style="margin-left: 0px" >
                                    <input type="text" name="search" id="search_box2" class="form-control"  />
                                </div>
                                <div class="col-sm-4" >    
                                    <div id="searchresults1"> 
                                        <p id="results1" class="update"> matching results
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <button type="submit" class="btn btn-success">Search</button>

                    </form>
                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
















<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search  Patients by Diagnosis</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <form action="patient_diagnosis.php" method="post">
                        <div class="form-group">

                            <div class="row">
                                <div class="col-sm-8" style="margin-left: 0px" >
                                    <input type="text" name="search" id="search_box3" class="form-control"  />
                                </div>
                                <div class="col-sm-4" >    
                                    <div id="searchresults2">
                                        <p id="results2" class="update"> matching results
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <button type="submit" class="btn btn-success">Search</button>

                    </form>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>










<script>
	$j(function () {

		$j('#CategoryDropDown').select2();


		$j('#CategoryDropDown2').select2();



		$j('#CategoryDropDown3').select2();

	})

</script>


<script type="text/javascript">

	$j(function () {

		$j("#search_box").keyup(function () {
			// getting the value that user typed
			var searchString = $j("#search_box").val();
			// forming the queryString
			var data = 'search=' + searchString;

			// if searchString is not empty
			if (searchString) {
				// ajax call
				$j.ajax({
					type: "POST",
					url: "ajax_history.php",
					data: data,
					beforeSend: function (html) { // this happens before actual call
						$j("#results").html('');
						$j("#searchresults").show();
						$j(".word").html(searchString);

					},
					success: function (html) { // this happens after we get results
						$j("#results").show();
						$j("#results").append(html);
						// console.log(html)
					}
				});
			}
			return false;
		});



		$j("#search_box2").keyup(function () {
			// getting the value that user typed
			var searchString = $j("#search_box2").val();
			// forming the queryString
			var data = 'search=' + searchString;

			// if searchString is not empty
			if (searchString) {
				// ajax call
				$j.ajax({
					type: "POST",
					url: "ajax_presciption.php",
					data: data,
					beforeSend: function (html) { // this happens before actual call
						$j("#results1").html('');
						$j("#searchresults1").show();
						$j(".word").html(searchString);
					},
					success: function (html) { // this happens after we get results
						$j("#results1").show();
						$j("#results1").append(html);
					}
				});
			}
			return false;
		});



		$j("#search_box3").keyup(function () {
			// getting the value that user typed
			var searchString = $j("#search_box3").val();
			// forming the queryString
			var data = 'search=' + searchString;

			// if searchString is not empty
			if (searchString) {
				// ajax call
				$j.ajax({
					type: "POST",
					url: "ajax_diagnosis.php",
					data: data,
					beforeSend: function (html) { // this happens before actual call
						$j("#results2").html('');
						$j("#searchresults2").show();
						$j(".word").html(searchString);
					},
					success: function (html) { // this happens after we get results
						$j("#results2").show();
						$j("#results2").append(html);
					}
				});
			}
			return false;
		});











	});
</script>
<style>
    body{ font-family:Arial, Helvetica, sans-serif; }
    *{ margin:0;padding:0; }
    #container { margin: 0 auto; width: 600px; }
    a { color:#DF3D82; text-decoration:none }
    a:hover { color:#DF3D82; text-decoration:underline; }
    ul.update { list-style:none;font-size:1.1em; margin-top:10px }
    ul.update li{ height:30px; border-bottom:#dedede solid 1px; text-align:left;}
    ul.update li:first-child{ border-top:#dedede solid 1px; height:30px; text-align:left; }
    #flash { margin-top:20px; text-align:left; }
    #searchresults { text-align:left;padding-left: 0px; margin-top:0px; display:none; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000; }
    .word { font-weight:bold; color:#000000; }
    #searchresults1 { text-align:left;padding-left: 0px; margin-top:0px; display:none; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000; }
    #searchresults2 { text-align:left;padding-left: 0px; margin-top:0px; display:none; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000; }

    #search_box { padding:4px; border:solid 1px #666666; width:300px; height:30px; font-size:18px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }
    .search_button { border:#000000 solid 1px; padding: 6px; color:#000; font-weight:bold; font-size:16px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }
    .found { font-weight: bold; font-style: italic; color: #ff0000; }
    #search_box2 { padding:4px; border:solid 1px #666666; width:300px; height:30px; font-size:18px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }
    #search_box3 { padding:4px; border:solid 1px #666666; width:300px; height:30px; font-size:18px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }

    h2 { margin-right: 70px; } 

</style>