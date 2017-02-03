
<?php
    /**
    * Template Name: Where To Stay Page
    **/

    get_header();
?>

<!-- This is the staying.php -->
<section role="main" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="where-to-stay">

                <?php
                    $hotel_args = array(
                        'post_type' => 'hotels',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'ASC',
                    );
                    $hotels = new WP_Query( $hotel_args );

                    if( have_posts() ) : while( have_posts() ) : the_post();
                ?>

                    <div class="headings">
                        <h2><?php the_title(); ?></h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <?php the_content(); ?>
                    </div>

                    <?php endwhile; endif; wp_reset_query(); ?>

                    <div class="content">
                        <div class="row">

                            <?php if( $hotels->have_posts() ) : while( $hotels->have_posts() ) : $hotels->the_post(); ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span><?php the_title(); ?></span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <?php
                                        $hotel_tel = get_field( 'hotel_contact_number' );
                                        $hotel_dist = get_field( 'hotel_distance' );
                                        $hotel_time = get_field( 'driving_time' );
                                    ?>

                                    <p><span>Address:</span> <?php the_field( 'hotel_address' ); ?></p>
                                    <p><span>Tel:</span> <a href="<?php echo international_number_link( $hotel_tel ); ?>" title="Phone <?php the_title(); ?>"><?php echo $hotel_tel; ?></a></p>
                                    <p><span>Distance from Beeston Manor:</span> <?php echo $hotel_dist; ?> miles, <?php echo $hotel_time; ?> minute drive.</p>

                                    <a class="btn" href="<?php the_field( 'google_map_link' ); ?>" target="_blank" title="Get directions">Directions</a>
                                </div>
                            </div>
                            <?php endwhile; endif; ?>

                        </div>
                    </div>
                </article>

            </div><!-- /col-md-12 -->
        </div>
    </div>
</section>

<?php get_footer(); ?>
