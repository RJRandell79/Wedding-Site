
<?php
    /**
    * Template Name: Photo Gallery
    **/

    get_header();
?>

<!-- This is the photogallery-page.php -->
<section role="main" class="container-fluid">
    <div class="container">
        <div class="row">

            <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $photo_args = array(
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'posts_per_page' => 12,
                    'post_status' => 'any',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'exclude' => get_post_thumbnail_id(),
                    'paged' => $paged
                );
                $attachments = new WP_Query( $photo_args );
                $wp_query = $attachments;

                if( $wp_query->have_posts() ) :
            ?>

            <div class="col-md-12">

                <article class="photogallery">
                    <div class="headings">
                        <h2>Photo Gallery</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>A successful marriage requires falling in love many times over, with the same person.</p>
                    </div>

                    <div class="content">
                        <div class="row">

                            <?php
                                while( $wp_query->have_posts() ) : $wp_query->the_post();

                                $image_url = wp_get_attachment_url();
                                $excerpt = get_the_excerpt();
                                $charcount = strlen( $excerpt );
                                if( $charcount > 30 ) :
                                    $caption = substr( $excerpt, 0, 30 ) . '&hellip;';
                                else:
                                    $caption = $excerpt;
                                endif;
                            ?>

                            <div class="col-md-4">
                                <div class="galleryphoto">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <div style="background-image: url( '<?php echo $image_url; ?>' ); background-repeat: no-repeat; background-position: center center; background-blend-mode: multiply; background-size: cover;">
                                            <p class="gradient">See full photo</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="caption">
                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span><?php echo $caption; ?></span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <?php endwhile; ?>

                        </div>
                    </div>
                </article>

            </div><!-- /col-md-12 -->

            <div class="pagination">
                <?php html5wp_pagination(); ?>
            </div>

            <?php else: ?>

            <div class="col-md-12">

                <article class="photogallery">
                    <div class="headings">
                        <h2>Photo Gallery</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>Sorry, there is no photos to display yet.</p>
                    </div>
                </article>

            </div>

            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>
