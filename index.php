<?php get_header(); ?>
<header>
<?php get_template_part('template-parts/banner/banner', 'page'); ?>
</header>

<div class="content-block-wrap">
    <section class=" section-block blog-wrapper">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <?php if ( have_posts() ): ?>
                            <div class="row">
                                <?php while ( have_posts() ): the_post(); ?>
                                    <div class="col-md-6 scroll-trigger fromBottom">
                                        <?php get_template_part('template-parts/blocks/block', 'post'); ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4">
                        <?php echo get_sidebar('blog'); ?>
                    </div>
                </div>
                <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => '<i class="icon-angle-left"></i>',
                        'next_text' => '<i class="icon-angle-right"></i>',
                    ) );
                ?>
            </div>
        </main>
    </section>
</div>
<?php get_footer(); ?>