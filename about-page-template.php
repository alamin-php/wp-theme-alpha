<?php
/*
Template Name: About Page Template
*/
get_header();
?>
<body <?php body_class();?>>
<?php get_template_part('hero-page'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
<div class="posts" <?php post_class();?>>
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post();?>
            <div class="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="post-title"><?php the_title(); ?></h2>
                            <p>
                                <?php 
                                if(has_post_thumbnail()) :
                                    // $thumbnail_url = get_the_post_thumbnail_url( null, "large" );
                                    // echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                                    echo '<a class="popup" href="#" data-featherlight="image">';
                                    the_post_thumbnail('large', array('class' => 'img-fluid'));
                                    echo '</a>';
                                endif; 
                                ?>
                            </p>
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </div>
    <?php endwhile;?>
    <?php wp_reset_postdata();?>
    <?php else: endif;?>

</div>
        </div>
    </div>
</div>

<?php get_footer();?>