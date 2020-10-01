<div class="form-group">
<label class="col-md-3">Categories:</label>
<div class="col-md-9">
	<select id="photo_category" name="photo_category" class="form-control select2" style="width: 100%;">
	<?php
	foreach($photocategories as $row){
		//echo "<option disabled=\"disabled\">{$row['names']}</option>";
		foreach($row['children'] as $srow){
			if($selected_item==$srow['names'])echo "<option selected>{$srow['names']}</option>";
			else echo "<option>{$srow['names']}</option>";
		}
	}?>
	</select>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#photo_category").select2();
	});
</script>