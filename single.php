<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part('/template-parts/common/hero'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            
<div class="posts" <?php post_class();?>>
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post();?>
            <div class="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="post-title"><?php the_title(); ?></h2>
                                <strong><?php the_author();?></strong> |
                                <?php echo get_the_date("jS M, Y");?>
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
                            <?php wp_link_pages();?>
                            <div class="post-pag-wrap">
                                <div class="post-pag-container prev">
                                    <?php previous_post_link('<span>Previous</span><h3>%link</h3>', '%title', false);?>
                                </div>                                
                                <div class="post-pag-container next">
                                    <?php next_post_link('<span>Next</span><h3>%link</h3>', '%title', false);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php endwhile;?>
    <?php wp_reset_postdata();?>
    <?php else: endif;?>
    <div class="authorsection my-5">
        <div class="row">
            <div class="col-md-2 authorimg mt-3">
                <?php 
                    echo get_avatar(get_the_author_meta("id"));
                ?>
            </div>
            <div class="col-md-10">
                <h4>
                    <?php echo get_the_author_meta("display_name"); ?>
                </h4>
                <p><?php echo get_the_author_meta("description"); ?></p>
            </div>
        </div>
    </div>
    <?php if (comments_open()) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 post-comments">
                    <?php comments_template(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
        </div>
        <div class="col-md-4">
            <div class="sidebar">
            <?php 
                if (is_active_sidebar('sidebar-1')) {
                dynamic_sidebar('sidebar-1');
                }
            ?>
            </div>      
        </div>
    </div>
</div>

<?php get_footer();?>