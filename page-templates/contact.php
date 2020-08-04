<?php /* Template Name: Kontakt */ ?>
<?php the_post(); ?>
<?php get_header(); ?>

<?php 
	$address = get_field('address','theme_settings');
	$phone = get_field('phone','theme_settings');
	$validatePhone = str_replace(" ", "", $phone);
	$email = get_field('email','theme_settings');
	$openingHours= get_field('opening_hours','theme_settings');

?>
<main class="page-main">
	<div class="contact-page">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="contact-page__content">
						<h1 class="contact-title">Kontakt</h1>
						<p><?php echo $address ; ?></p>
						<p>TEL:<a href="tel:<?php echo $validatePhone ;?>"><span class="red-text"><?php echo $phone ;?></span></a></p>
						GODZINY OTWARCIA: <p><span class="red-text"><?php echo $openingHours ;?></span></p>
						<?php the_content();?>
					</div>
				</div>
				<div class="col-md-8">
					<?php echo do_shortcode('[ninja_form id=1]'); ?>
				</div>
			</div>
		</div>
	</div>

		<div class="contact-content-blocks">
			<?php echo get_template_part('template-parts/render-content-blocks'); ?>
		</div>
</main>

<?php get_footer(); ?>