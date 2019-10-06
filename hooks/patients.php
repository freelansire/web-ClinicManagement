<?php
	// For help on using hooks, please refer to http://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function patients_init(&$options, $memberInfo, &$args){

		if(isset($_REQUEST['SelectedID'])){
			$id = makeSafe($_REQUEST['SelectedID']);
			$today = date('Y-m-d');
			
			sql("update patients set age=floor(datediff('{$today}', birth_date) / 365.25) where id='{$id}'", $eo);
		}
		return TRUE;
	}

	function patients_header($contentType, $memberInfo, &$args){
		$header='';

		switch($contentType){
			case 'tableview':
				$header='';
				break;

			case 'detailview':
				$header='';
				break;

			case 'tableview+detailview':
				$header='';
				break;

			case 'print-tableview':
				$header='';
				break;

			case 'print-detailview':
				$header='';
				break;

			case 'filters':
				$header='';
				break;
		}

		return $header;
	}

	function patients_footer($contentType, $memberInfo, &$args){
		$footer='';

		switch($contentType){
			case 'tableview':
				$footer='';
				break;

			case 'detailview':
				$footer='';
				break;

			case 'tableview+detailview':
				$footer='';
				break;

			case 'print-tableview':
				$footer='';
				break;

			case 'print-detailview':
				$footer='';
				break;

			case 'filters':
				$footer='';
				break;
		}

		return $footer;
	}

	function patients_before_insert(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function patients_after_insert($data, $memberInfo, &$args){

		return TRUE;
	}

	function patients_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function patients_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function patients_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function patients_after_delete($selectedID, $memberInfo, &$args){

	}

	function patients_dv($selectedID, $memberInfo, &$html, &$args){
       

	}

	function patients_csv($query, $memberInfo, &$args){

		return $query;
	}
	function patients_batch_actions(&$args){

		return array();
	}
