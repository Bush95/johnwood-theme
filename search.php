<?php get_header(); ?>
<?php
    global $post;

    $postsArr      = array();
    $pagesArr      = array();
    $productsArr   = array();
    $hasResults    = false;

    while ( have_posts() ) {
        the_post();
        $postType = get_post_type();

        if ($postType == 'product') {
            $productsArr[] = get_post();
        } elseif($postType == 'page') {
            $pagesArr[] = get_post();
        } else {
            $postsArr[] = get_post();
        }
    }

    $hasResults = count($productsArr) || count($pagesArr) || count($postsArr);

?>
<h1 class="text-center">Wyniki wyszukiwania: <br>"<?php echo get_search_query(); ?>"</h1>
<div class="content-block-wrap">
    <section class=" section-block blog-wrapper">
        <div class="container">
            <?php if ($hasResults): ?>

                <?php if ( count($productsArr) > 0 ): ?>
                    <h2>Produkty</h2>
                    <div class="woocommerce">
                        <ul class="products columns-4">
                            <?php foreach ($productsArr as $singleProduct): ?>
                                <?php 
                                    $post = $singleProduct;
                                    setup_postdata( $post );
                                    wc_get_template_part( 'content', 'product' );
                                ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                                 
                <?php if ( count($postsArr) > 0 ): ?>
                    <h2>Posty</h2>
                    <div class="row">
                        <?php foreach ($postsArr as $singlePost): ?>
                            <div class="col-md-6 col-lg-4">
                                <?php 
                                    $post = $singlePost;
                                    setup_postdata( $post );
                                    get_template_part('template-parts/blocks/block', 'post');
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                                 
                <?php if ( count($pagesArr) > 0 ): ?>
                    <h2>Strony</h2>
                    <div class="row">
                        <?php foreach ($pagesArr as $singlePage): ?>
                            <div class="col-md-6 col-lg-4">
                                <?php 
                                    $post = $singlePage;
                                    setup_postdata( $post );
                                    get_template_part('template-parts/blocks/block', 'page');
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                                       

                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p class="search-page-no-results">Nie znaleziono wyników wyszukiwania dla "<strong class="red-text"><?php echo get_search_query(); ?></strong>". Spróbuj wpisać inną frazę.</p>
                <div role="search">
                    <form class="search-form search-form--results" method="get" id="searchformresults" action="/">
                        <label class="screen-reader-text" for="s">Szukaj:</label>
                        <input type="hidden" name="search-type" value="normal" />
                        <input type="text" value="" name="s" id="sr" placeholder="Wpisz frazę" />
                        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>


<?php get_footer();?>