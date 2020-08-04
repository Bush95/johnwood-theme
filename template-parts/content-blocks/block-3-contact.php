<?php 
	$phone1 		= get_sub_field('phone_1');
	$phone2 		= get_sub_field('phone_2');
	$address 		= get_sub_field('address');
	$addressLink 	= get_sub_field('address_link');
	$email 			= get_sub_field('email');
	$validatePhone1 = str_replace(" ", "", $phone1);
	$validatePhone2 = str_replace(" ", "", $phone2);
?>
<div class="block-3-contact scroll-trigger">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-8 col-md-6 col-lg-4">
				<article class="box-contacts">
					<div class="box-contacts__body">
						<div class="box-contacts__icon fas fa-mobile-alt"></div>
						<div class="box-contacts__decor"></div>
            			<?php if ($phone1): ?>
							<p class="box-contacts__link"><a href="tel:<?php echo $validatePhone1; ?>"><?php echo $phone1; ?></a></p>
						<?php endif; ?>
            			<?php if ($phone2): ?>
							<p class="box-contacts__link"><a href="tel:<?php echo $validatePhone2; ?>"><?php echo $phone2; ?></a></p>
						<?php endif; ?>
					</div>
				</article>
			</div>
			<div class="col-sm-8 col-md-6 col-lg-4">
				<article class="box-contacts">
					<div class="box-contacts__body">
						<div class="box-contacts__icon fas fa-map-marked-alt"></div>
						<div class="box-contacts__decor"></div>
						<p class="box-contacts__link">
							<?php if ($addressLink): ?>
								<a href="<?php echo $addressLink; ?>" target="_blank"><?php echo $address; ?></a>
							<?php else: ?>
								<?php echo $address; ?>
							<?php endif; ?>
						</p>
					</div>
				</article>
			</div>
			<div class="col-sm-8 col-md-6 col-lg-4">
				<article class="box-contacts">
					<div class="box-contacts__body">
						<div class="box-contacts__icon fas fa-envelope-open-text"></div>
						<div class="box-contacts__decor"></div>
						<p class="box-contacts__link"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>