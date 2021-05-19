<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part('hero'); ?>
<div class="posts" <?php post_class();?>>
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post();?>
            <div class="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="post-title text-center"><?php the_title(); ?></h2>
                            <p class="text-center">
                                <strong><?php the_author();?></strong><br/>
                                <?php echo get_the_date("jS M, Y");?>
                            </p>
                            <p>
                                <?php if(has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                                <?php endif; ?>
                            </p>
                            <?php the_content();?>
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
<?php get_footer();?>