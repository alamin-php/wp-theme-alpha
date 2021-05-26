<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part('/template-parts/common/hero'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="search-header">Your keyword <span><?php _e('');echo '&quot;'.$s.'&quot;'; ?></span> Reqults are below.</h1>
        </div>
    </div>
</div>
<div class="posts" <?php post_class();?>>
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post();?>
            <div class="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <strong><?php the_author();?></strong><br/>
                                <?php echo get_the_date("jS M, Y");?>
                            </p>
                            <?php the_tags( '<ul class="list-unstyled"><li>', '</li><li>', '</li></ul>' ); ?>
                        </div>
                        <div class="col-md-8">
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
                            <?php 
                                the_excerpt();
                            ?>
                        </div>
                    </div>

                </div>
            </div>
    <?php endwhile;?>
    <?php wp_reset_postdata(); ?>
    <?php else: echo "<h2 class='errorview'>Sorry! Not Found</h2>"; endif;?>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php the_posts_pagination(array(
                'screen_reader_text' => ' ',
                'prev_text' => 'New Posts',
                'next_text' => 'Old Posts',
            )); ?>
        </div>
    </div>
</div>
<?php get_footer();?>