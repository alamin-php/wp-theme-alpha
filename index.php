<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part('/template-parts/common/hero'); ?>
<div class="posts">
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post();?>
            <div class="post">
        <div <?php post_class(); ?>>
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
                            <?php 

                                $post_formats = get_post_format();

                                if($post_formats == "aside"){
                                    echo '<span class="dashicons dashicons-format-aside"></span>';
                                }else if($post_formats == "link"){
                                    echo '<span class="dashicons dashicons-format-links"></span>';
                                }else if($post_formats == "gallery"){
                                    echo '<span class="dashicons dashicons-format-gallery"></span>';
                                }else if($post_formats == "image"){
                                    echo '<span class="dashicons dashicons-format-image"></span>';
                                }else if($post_formats == "video"){
                                    echo '<span class="dashicons dashicons-format-video"></span>';
                                }else if($post_formats == "quote"){
                                    echo '<span class="dashicons dashicons-format-quote"></span>';
                                }else if($post_formats == "audio"){
                                    echo '<span class="dashicons dashicons-format-audio"></span>';
                                }else if($post_formats == "chat"){
                                    echo '<span class="dashicons dashicons-format-chat"></span>';
                                }
                            ?>
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

            </div>
    <?php endwhile;?>
    <?php wp_reset_postdata(); ?>
    <?php else: endif;?>
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