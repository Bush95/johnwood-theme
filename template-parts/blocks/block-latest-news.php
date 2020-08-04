<?php // Latest news ?>
<?php $query_args = array(
    'posts_per_page' => 3,
    'post__not_in' => array( get_the_ID())
);
$query = new WP_Query( $query_args ); ?>
<?php if ( $query->have_posts() ): ?>
    <div class="latest-news">
        <h2 class="text-center h3 latest-news__title">Najnowsze posty</h2>
        <ul class="row justify-content-center blog-list">
            <?php while ( $query->have_posts() ): $query->the_post(); ?>
                <li class="col-md-4">
                    <?php echo get_template_part('template-parts/blocks/block', 'post'); ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>