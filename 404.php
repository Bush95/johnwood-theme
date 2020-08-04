<?php get_header(); ?>
<main>
    <div class="container">
        <div class="page-404">
    		<div class="text-center">
	    		<h1 class="page-title text-center">404 - Strona nie została znaleziona</h1>

				<div class="buttons-404">
		            <a href="<?php echo get_home_url(); ?>" class="btn btn--default">Wróć do strony głównej</a>
                    <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn--border-turquoise">Skontaktuj się z nami</a>
		        </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>