<footer class="main-footer">
	<?php if (ENVIRONMENT=='development'): ?>
		<div class="pull-right hidden-xs">
			TheiCone Admin Version: <strong><?php echo "1.0"; ?></strong>, 
			Elapsed Time: <strong>{elapsed_time}</strong> seconds, 
			Memory Usage: <strong>{memory_usage}</strong>
		</div>
	<?php endif; ?>
	<strong>&copy; <?php echo date('Y'); ?></strong> All rights reserved.
</footer>