<div class="form-group">
<label class="col-md-2">Templates:</label>
<div class="col-md-10">
	<select id="photo_product" name="photo_product" class="form-control select2" style="width: 100%;">
	<?php
	echo "<option></option>";
	foreach($photo_products as $row){		
		if($selected_item==$row['ids'])echo "<option selected value=\"{$row['ids']}\">{$row['titles']}</option>";
		else echo "<option value=\"{$row['ids']}\">{$row['titles']}</option>";
	}?>
	</select>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#photo_product").select2();
	});
</script>