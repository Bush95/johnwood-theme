<?php
	$accordions = get_sub_field('accordions');
	$accordionsColumns = array_chunk($accordions, ceil(count($accordions)/2));
?>
<?php if ($accordions): ?>
	<div class="accordions">
		<div class="container">
			<div class="d-lg-none">
				<ul class="accordions__list">
					<?php foreach ($accordions as $item): ?>
						<li class="accordions__list-item">
							<div class="accordion">
								<h3 class="accordion__title"><?php echo $item['title']; ?><span class="icon"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></h3>
								<div class="accordion__content">
									<div class="cms-content">
										<?php echo $item['content']; ?>
									</div>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="d-none d-lg-block">
				<div class="row">
					<?php foreach($accordionsColumns as $column): ?>
						<div class="col-lg-6">
							<?php foreach ($column as $item): ?>
								<div class="accordions__list-item">
									<div class="accordion">
										<h3 class="accordion__title"><?php echo $item['title']; ?><span class="icon"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></span></h3>
										<div class="accordion__content">
											<div class="cms-content">
												<?php echo $item['content']; ?>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>