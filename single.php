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
                            <h2 class="post-title"><?php the_title(); ?></h2>
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
                                <?php if(has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                                <?php endif; ?>
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
<?php get_footer();?>