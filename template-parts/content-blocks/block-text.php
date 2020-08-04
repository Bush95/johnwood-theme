<?php 
	$rowId = get_row_index();
	$text = get_sub_field('text');
?>
<?php if ($text): ?>
	<div class="text-section">
		<div class="container">
			<div class="cms-content scroll-trigger fromBottom">
				<?php echo $text; ?>
			</div>
		</div>
	</div>
<?php endif; ?>