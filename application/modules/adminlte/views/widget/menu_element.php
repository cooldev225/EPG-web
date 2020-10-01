<div class="form-group">
<label class="col-md-2">Menu:</label>
<div class="col-md-10">
	<select id="photo_menu" name="photo_menu" class="form-control select2" style="width: 100%;">
	<?php
	foreach($photo_menu as $row)if($row['names']!='Today Deals'){
		if($selected_item==$row['names'])echo "<option selected>{$row['names']}</option>";
		else echo "<option>{$row['names']}</option>";
	}?>
	</select>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#photo_menu").select2();
	});
</script>