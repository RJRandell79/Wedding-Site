
<?php get_header(); ?>

<!-- This is the attachment.php -->
<section role="main" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php
                    if( have_posts() ) : while( have_posts() ) : the_post();
                    $image_url = wp_get_attachment_url( get_the_ID(), 'full' );
                ?>

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
                            <div class="col-md-8">
                                <img class="full-photo" src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>" />
                            </div>

                            <div class="col-md-4">
                                <?php comments_template(); ?>
                            </div>
                        </div>
                    </div>

                </article>

                <?php endwhile; endif; ?>
            </div>


        </div>
    </div>
</section>

<?php get_footer(); ?>
