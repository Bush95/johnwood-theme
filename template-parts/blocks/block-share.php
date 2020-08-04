<?php /* Share to social media */

    $post_url = urlencode(get_the_permalink());;
    $title = urlencode(get_the_title());

?>
<div class="social-share<?php if (is_singular('post')) echo ' social-share--article'; ?>">
    <p class="social-share__label">Udostępnij</p>
    <ul class="social-share__list">

        <?php // Pinterest ?>
        <li class="social-share__item">
            <a href="http://pinterest.com/pin/create/button/?url=<?php echo $post_url; ?>&media=<?php echo $post_img; ?>&description=<?php echo $title; ?>" target="_blank" class="fab fa-pinterest" title="Udostępnij na Pinterest"></a>
        </li>

        <?php // Facebook ?>
        <li class="social-share__item">
            <a class="fab fa-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $post_url; ?>" title="Udostępnij na Facebooku" target="_blank"></a>
        </li>


        <?php // Twitter ?>
        <li class="social-share__item">
            <a class="fab fa-twitter" title="Udostępnij na Twitterze" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $title . '+-+' . $post_url ?>"></a>
        </li>
        
        <?php // Share to friend ?>
        <li class="social-share__item">
            <a class="fa fa-envelope" title="Wyślij link przez e-mail" href="mailto:?subject=<?php echo rawurlencode(get_bloginfo('name')); ?>%20-%20<?php echo rawurlencode(get_the_title()); ?>&body=<?php echo rawurlencode('Hey! Check this article on' . get_bloginfo('name') . ' website.') . '%0A' . rawurlencode(get_the_permalink()); ?>"></a>
        </li> 
    </ul>
</div>
