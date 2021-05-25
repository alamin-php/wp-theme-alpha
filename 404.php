<?php get_header();?>

<body <?php body_class();?>>
    <div class="container errorview">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    <?php 
                        _e("Sorry, We could not found what you are want", "alpha");
                    ?>
                </h1>
            </div>
        </div>
    </div>
</body>

<?php get_footer();?>