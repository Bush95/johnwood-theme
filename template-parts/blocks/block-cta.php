<?php 
	$ctaTitle = get_field('cta_title','option');
	$ctaText = get_field('cta_text','option');
	$ctaImage = get_field('cta_image','option');
	$phone = get_field('phone','option');
	$validateNumber = str_replace(" ", "", $phone);
?>
<div class="cta-wrapper" style="background-image: url('<?php echo $ctaImage['url'] ; ?>)">

	<div class="cta-info">
		<p class="cta-info__title">
			<?php echo $ctaTitle;?>
		</p>
		<p class="cta-info__text">
			<?php echo $ctaText ;?>
		</p>
		<a href="tel:<?php echo $validateNumber ;?>" class="btn"><i class="icon-phone"></i>Zadzwoń</a>
	</div>
	
</div>