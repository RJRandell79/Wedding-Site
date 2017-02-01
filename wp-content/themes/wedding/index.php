
<?php get_header(); ?>

<!-- This is the index.php -->
<section role="main" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

                <article>
                    <div class="headings">
                        <h2><?php the_title(); ?></h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <?php the_content(); ?>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>

                </article>
                
                <?php endwhile; endif; ?>
            </div>

            <div class="pagination">
                <?php html5wp_pagination(); ?>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
