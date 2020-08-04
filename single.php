<?php get_header(); ?>
<?php the_post(); ?>
<?php 
    /**
     * Google Microdata - Article
     * @property - datePublished (required)
     * @property - dateModified
     * @property - headline (required)
     * @property - image (required)
     * @property - articleBody (required)
     * @property - author (required) Can be string or person object
     * @property - publisher (required) Can be organization or person object
     */
?>
<?php get_template_part('template-parts/banner/banner', 'post'); ?>

<article class="post-view" itemscope itemtype="https://schema.org/BlogPosting">
    <main>
        <div class="post-view__info">
            <div class="post-view__meta">
                
                <meta itemprop="author" content="johnwood.pl">
                <meta itemprop="datePublished" content="<?php echo get_the_date('Y-m-d'); ?>">
                <meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>">
                <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                    <meta itemprop="name" content="Hat on the head">
                    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                        <meta itemprop="name" content="Logo John Wood">
                        <meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/assets/images/johnwood-logo.png">
                        <meta itemprop="width" content="500px">
                        <meta itemprop="height" content="300px">
                    </div>
                </div>
                <meta itemprop="image" content="<?php echo get_the_post_thumbnail_url(); ?>">
                <meta itemprop="url" content="<?php the_permalink(); ?>">
                <meta content="" itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>"/>
                <meta itemprop="headline" content="<?php the_title(); ?>">
            </div>
        </div>

        <div class="container">
            <div class="cms-content" itemprop="articleBody">
                <?php the_content(); ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <footer>
            <div class="container scroll-trigger fromLeft">
                <?php echo get_template_part('template-parts/blocks/block', 'share'); ?>
            </div>
        </footer>
    </main>
</article>

<?php echo get_template_part('template-parts/content-blocks/block', 'recent-news'); ?>

<?php get_footer(); ?>