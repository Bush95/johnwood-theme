<?php /* Template Name: Lista podstron */ ?>
<?php the_post(); ?>
<?php get_header(); ?>
<?php get_template_part('template-parts/banner/banner-header'); ?>
<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );


$parent = new WP_Query( $args ); ?>

<?php if ( $parent->have_posts() ) : ?>
	<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
	    <div class="subpages-container">
			<div class="container">
	    	<div class="row">
	    		<div class="subpages-wrapper">
			        <div id="parent-<?php the_ID(); ?>" class="parent-page col-md-6">
			            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

			            <?php the_excerpt(); ?>
			            <a href="<?php the_permalink();?>" class="btn">Dowiedz się więcej</a>
			        </div>
			        <div class="subpages-wrapper__image col-md-6">
			        	<?php if(has_post_thumbnail()):?>
			        		<?php echo the_post_thumbnail('large');?>
			        	<?php else:?>
			        		<?php echo '<img src="' . get_template_directory_uri() . '/assets/images/placeholder.png" alt=""/>'; ?>
			        	<?php endif ;?>
			        </div>
		    	</div>
	    	</div>
    	</div>
    </div>
<?php endwhile; ?>

<?php endif; wp_reset_postdata(); ?>

<?php echo get_template_part('template-parts/render-content-blocks'); ?>

<?php get_footer();?>