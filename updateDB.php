<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5){
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)){
			$silent=true;
		}

		// set up tables
		setupTable('patients', "create table if not exists `patients` (   `id` INT unsigned not null auto_increment , primary key (`id`), `last_name` VARCHAR(40) not null , `first_name` VARCHAR(40) not null , `gender` VARCHAR(10) not null default 'Unknown' , `sexual_orientation` TEXT not null , `birth_date` DATE , `age` INT , `image` VARCHAR(40) , `address` TEXT , `city` VARCHAR(40) , `state` VARCHAR(15) , `zip` CHAR(8) , `home_phone` VARCHAR(40) , `work_phone` VARCHAR(40) , `mobile` VARCHAR(40) , `tobacco_usage` VARCHAR(40) not null default 'Unknown' , `alcohol_intake` VARCHAR(40) not null default 'Unknown' , `history` VARCHAR(100) not null default 'Unknown' , `surgical_history` TEXT , `obstetric_history` TEXT , `genetic_diseases` TEXT , `contact_person` VARCHAR(100) , `other_details` TEXT , `comments` TEXT , `filed` DATETIME , `last_modified` DATETIME ) CHARSET latin1", $silent);
		setupTable('disease_symptoms', "create table if not exists `disease_symptoms` (   `id` INT unsigned not null auto_increment , primary key (`id`), `disease` VARCHAR(200) , `symptoms` TEXT , `reference` TEXT ) CHARSET latin1", $silent);
		setupTable('medical_records', "create table if not exists `medical_records` (   `id` INT unsigned not null auto_increment , primary key (`id`), `patient` INT unsigned , `image_1` VARCHAR(40) , `image_2` VARCHAR(40) , `image_3` VARCHAR(40) , `image_4` VARCHAR(40) , `image_5` VARCHAR(40) , `document_1` VARCHAR(40) , `document_2` VARCHAR(40) , `document_3` VARCHAR(40) , `document_4` VARCHAR(40) , `document_5` VARCHAR(40) , `description` TEXT ) CHARSET latin1", $silent, array( "ALTER TABLE `medical_records` CHANGE `document` `image_1` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `image_1` `image_1` VARCHAR(40) ","ALTER TABLE `medical_records` ADD `image_1_1` VARCHAR(40) ","ALTER TABLE `medical_records` ADD `image_1_2` VARCHAR(40) ","ALTER TABLE `medical_records` ADD `image_1_3` VARCHAR(40) ","ALTER TABLE `medical_records` ADD `image_1_4` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `image_1_1` `image_5` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `image_1_2` `image_2` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `image_1_3` `image_3` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `image_1_4` `image_4` VARCHAR(40) ","ALTER TABLE medical_records ADD `field9` VARCHAR(40)","ALTER TABLE `medical_records` CHANGE `field9` `document_1` VARCHAR(40) ","ALTER TABLE `medical_records` ADD `document_1_1` VARCHAR(40) ","ALTER TABLE `medical_records` ADD `document_1_1_1` VARCHAR(40) ","ALTER TABLE `medical_records` DROP `document_1_1_1`","ALTER TABLE `medical_records` ADD `document_1_1_1` VARCHAR(40) ","ALTER TABLE `medical_records` DROP `document_1_1_1`","ALTER TABLE `medical_records` ADD `document_1_2` VARCHAR(40) ","ALTER TABLE `medical_records` ADD `document_1_3` VARCHAR(40) ","ALTER TABLE `medical_records` ADD `document_1_4` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `document_1` `document_5` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `document_1_1` `document_1` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `document_1_2` `document_2` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `document_1_3` `document_3` VARCHAR(40) ","ALTER TABLE `medical_records` CHANGE `document_1_4` `document_4` VARCHAR(40) "));
		setupIndexes('medical_records', array('patient'));
		setupTable('events', "create table if not exists `events` (   `id` INT unsigned not null auto_increment , primary key (`id`), `title` VARCHAR(40) , `date` DATE , `status` VARCHAR(40) not null , `name_patient` INT unsigned , `time` TIME default '12:00' , `prescription` VARCHAR(40) , `diagnosis` VARCHAR(40) , `comments` TEXT ) CHARSET latin1", $silent, array( "ALTER TABLE `events` ADD `document_1` VARCHAR(40) ","ALTER TABLE `events` DROP `document_1`"));
		setupIndexes('events', array('name_patient'));


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')){
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields){
		if(!is_array($arrFields)){
			return false;
		}

		foreach($arrFields as $fieldName){
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")){
				continue;
			}
			if(!$row=@db_fetch_assoc($res)){
				continue;
			}
			if($row['Key']==''){
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter=''){
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)){
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)){
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")){ // table already exists
			if($row = @db_fetch_array($res)){
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)){
					echo '<br>';
					foreach($arrAlter as $alter){
						if($alter!=''){
							echo "$alter ... ";
							if(!@db_query($alter)){
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!=''){ // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")){ // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)){
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)){
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent){
			echo $out;
		}
	}
?>