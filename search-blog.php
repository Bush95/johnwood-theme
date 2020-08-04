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
                            <h2 class="search-results-title text-center">Wyniki wyszukiwania: <br>"<?php echo get_search_query(); ?>"</h2>

                            <div class="row">
                                <?php while ( have_posts() ): the_post(); ?>
                                    <div class="col-md-6">
                                        <?php get_template_part('template-parts/blocks/block', 'post'); ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <p class="search-page-no-results">Nie znaleziono wyników wyszukiwania dla "<strong class="red-text"><?php echo get_search_query(); ?></strong>". Spróbuj wpisać inną frazę.</p>
                            <div role="search">
                                <form class="search-form search-form--results" method="get" id="searchformresults" action="/">
                                    <label class="screen-reader-text" for="s4">Szukaj:</label>
                                    <input type="hidden" name="search-type" value="normal" />
                                    <input type="text" value="" name="s4" id="sr2" placeholder="Wpisz frazę" />
                                    <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
                                </form>
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