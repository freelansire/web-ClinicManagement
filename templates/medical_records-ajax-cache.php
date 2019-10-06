<script>
	$j(function(){
		var tn = 'medical_records';

		/* data for selected record, or defaults if none is selected */
		var data = {
			patient: { id: '<?php echo $rdata['patient']; ?>', value: '<?php echo $rdata['patient']; ?>', text: '<?php echo $jdata['patient']; ?>' }
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for patient */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'patient' && d.id == data.patient.id)
				return { results: [ data.patient ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

