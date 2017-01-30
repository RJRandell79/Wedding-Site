
<?php get_header(); ?>

<!-- This is the home.php -->
<section role="main" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                    <?php the_title(); ?>
                    <?php the_content(); ?>

                <?php endwhile; endif; ?>
            </div>

            <div class="pagination">
                <?php html5wp_pagination(); ?>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
