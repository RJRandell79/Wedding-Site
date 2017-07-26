
<?php
    get_header();

    $bg_image_1 = get_field( 'background_image_1' );
    $bg_image_2 = get_field( 'background_image_2' );
    $bg_image_3 = get_field( 'background_image_3' );
    $bg_image_4 = get_field( 'background_image_4' );
?>

<!-- This is the front-page.php -->
<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="intro">
                    <h2>Hello!</h2>
                    <h3>December 2nd 2017, Chorley, Lancashire</h3>
                    <h5>&ndash; St. Joseph&rsquo;s Roman Catholic Church &ndash;</h5>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </article>

                <article class="thehappycouple">
                    <div class="headings">
                        <h2>The Happy Couple</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>He proposed, she said <span class="sub">Yes!</span></p>
                    </div>

                    <div class="content">
                        <div class="row">

                            <?php
                                $groom_args = array(
                                    'post_type' => 'people',
                                    'posts_per_page' => 1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'taxonomies_people',
                                            'field' => 'id',
                                            'terms' => 3
                                        )
                                    )
                                );
                                $groom = new WP_Query( $groom_args );
                                if( $groom->have_posts() ) : while( $groom->have_posts() ) : $groom->the_post();

                                // Get post featured image
                                $thumbnail_id = get_post_thumbnail_id();

                                if ( $thumbnail_id ) :
                                    $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
                                else :
                                    $thumbnail_url = get_template_directory_uri() . '/dist/img/placeholder-image-sq.jpg';
                                endif;

                                $fb_url = get_field( 'facebook_url' );
                                $tw_url = get_field( 'twitter_url' );
                                $in_url = get_field( 'instagram_url' );
                                $pi_url = get_field( 'pinterest_url' );
                                $go_url = get_field( 'google_plus_url' );
                                $li_url = get_field( 'linkedin_url' );
                            ?>

                            <div class="col-md-6 groom">
                                <img src="<?php if ( $thumbnail_id ) : echo $thumbnail_url[ 0 ]; else: echo $thumbnail_url; endif; ?>" alt="<?php the_title(); ?>, The groom" />

                                <h3><?php the_title(); ?></h3>
                                <ul>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    <li><span><?php echo get_cat_name( 3 ); ?></span></li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                </ul>

                                <?php the_content(); ?>

                                <?php if( $fb_url || $tw_url || $in_url || $pi_url || $go_url || $li_url ) : ?>
                                <ul>
                                    <?php if( $fb_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $fb_url; ?>" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $tw_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $tw_url; ?>" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $in_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $in_url; ?>" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $pi_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $pi_url; ?>" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $go_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $go_url; ?>" title="Google+"><i class="fa fa-google-plus-official"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $li_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $li_url; ?>" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                                <?php endif; ?>
                            </div>

                            <?php
                                endwhile; endif;
                                wp_reset_query();

                                $bride_args = array(
                                    'post_type' => 'people',
                                    'posts_per_page' => 1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'taxonomies_people',
                                            'field' => 'id',
                                            'terms' => 2
                                        )
                                    )
                                );
                                $bride = new WP_Query( $bride_args );
                                if( $bride->have_posts() ) : while( $bride->have_posts() ) : $bride->the_post();

                                // Get post featured image
                                $thumbnail_id = get_post_thumbnail_id();

                                if ( $thumbnail_id ) :
                                    $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
                                else :
                                    $thumbnail_url = get_template_directory_uri() . '/dist/img/placeholder-image-sq.jpg';
                                endif;

                                $fb_url = get_field( 'facebook_url' );
                                $tw_url = get_field( 'twitter_url' );
                                $in_url = get_field( 'instagram_url' );
                                $pi_url = get_field( 'pinterest_url' );
                                $go_url = get_field( 'google_plus_url' );
                                $li_url = get_field( 'linkedin_url' );
                            ?>

                            <div class="col-md-6 bride">
                                <img src="<?php if ( $thumbnail_id ) : echo $thumbnail_url[ 0 ]; else: echo $thumbnail_url; endif; ?>" alt="<?php the_title(); ?>, The bride" />

                                <h3><?php the_title(); ?></h3>
                                <ul>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    <li><span><?php echo get_cat_name( 2 ); ?></span></li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                </ul>

                                <?php the_content(); ?>

                                <?php if( $fb_url || $tw_url || $in_url || $pi_url || $go_url || $li_url ) : ?>
                                <ul>
                                    <?php if( $fb_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $fb_url; ?>" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $tw_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $tw_url; ?>" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $in_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $in_url; ?>" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $pi_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $pi_url; ?>" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $go_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $go_url; ?>" title="Google+"><i class="fa fa-google-plus-official"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $li_url ) : ?>
                                    <li><a target="_blank" href="<?php echo $li_url; ?>" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                                <?php endif; ?>
                            </div>

                            <?php
                                endwhile; endif;
                                wp_reset_query();
                            ?>

                        </div>
                    </div><!-- /content -->
                </article><!-- /thehappycouple -->

            </div><!-- /col-md-12 -->
        </div>
    </div><!-- /container -->
</section>

<section class="container-fluid image-background" style="background-color: #333; <?php if( $bg_image_1 ) : echo 'background-image: url( ' . $bg_image_1 . ' ) no-repeat center center; background-size: cover;'; endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="ceremony">
                    <div class="headings">
                        <h2>The Wedding Day</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>We&rsquo;ve picked a date. Now, the countdown is on&hellip;!</p>

                        <div id="countdown">
                            <p><span class="days"></span> days</p>
                            <p><span class="hours"></span> hours</p>
                            <p><span class="minutes"></span> minutes</p>
                            <p><span class="seconds"></span> seconds</p>
                        </div>
                    </div>

                    <div class="content">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="church">
                                    <h3>Church</h3>

                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <h5>December 2nd 2017, 12:00pm</h5>
                                    <h5>St. Joseph&rsquo;s RC Church,<br/>Harpers Lane, Chorley</h5>

                                    <p>St Joseph&rsquo;s Roman Catholic Church is a local church with a friendly and inviting congregation. The church was originally opened in 1910 is situated on Harpers Lane, Chorley, Lancashire. The Parish Priest, Canon Peter G Stanley welcomes all. Please arrive by 11.45am.</p>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="reception">
                                    <h3>Reception</h3>

                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <h5>December 2nd 2017, 3:00pm</h5>
                                    <h5>Beeston Manor,<br/>Hoghton</h5>

                                    <p>Beeston Manor is a family run and owned venue set in 140 acres of land at Hoghton near Preston. The venue is a beautifully converted 16th Century barn complete with oak beams and sandstone walls. The restaurant and it&rsquo;s two function rooms have backdrop views of stunning panoramic views. The venue is also close to the M6, M61 and M65 motorway networks.</p>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="evening">
                                    <h3>Evening</h3>

                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <h5>December 2nd 2017, 7:00pm</h5>
                                    <h5>Beeston Manor,<br/>Hoghton</h5>

                                    <p>Time to let your hair down and celebrate. Join us for the evening reception for food, drink and dancing. Put on your dancing shoes, we&rsquo;ll put on some cool tunes and there will be cake&hellip; lots of cake!</p>

                                </div>
                            </div>

                        </div>

                        <a class="btn" href="<?php the_permalink( 42 ); ?>" title="Get directions">Directions</a>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

<?php
    global $post;
    $photo_args = array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'exclude' => get_post_thumbnail_id()
    );
    $attachments = get_posts( $photo_args );
    if( $attachments ) :
?>

<section class="container-fluid">
    <div class="container">
        <div class="row">
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
                                foreach( $attachments as $attachment ) :
                                    $image_url = wp_get_attachment_url( $attachment->ID );
                                    $charcount = strlen( $attachment->post_excerpt );

                                    if( $charcount > 30 ) :
                                        $caption = substr( $attachment->post_excerpt, 0, 30 ) . '&hellip;';
                                    else:
                                        $caption = $attachment->post_excerpt;
                                    endif;

                                    $column = 'col-md-4';
                                    switch( count( $attachments ) ) {
                                        case 1 : $column = 'col-md-4 col-md-offset-4';
                                        case 2 : $column = 'col-md-6';
                                        default : 'col-md-4';
                                    }
                            ?>
                            <div class="<?php echo $column; ?>">
                                <div class="galleryphoto">
                                    <a href="<?php the_permalink( $attachment->ID ); ?>" title="<?php echo $attachment->post_title; ?>">
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
                            <?php endforeach; ?>

                        </div>

                        <a class="btn" href="<?php echo get_permalink( 27 ); ?>" title="See more photos...">See more&hellip;</a>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

<?php endif; ?>


<section class="container-fluid image-background" style="background-color: #333; <?php if( $bg_image_2 ) : echo 'background-image: url( ' . $bg_image_2 . ' ) no-repeat center center; background-size: cover;'; endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="attendance">
                    <div class="headings">
                        <h2>Gift List</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>We have a gift list which will be added here soon.</p>
                    </div>

                    <!--
                    <div id="attendance-form" class="content">
                        <?php echo do_shortcode( '[contact-form-7 id="10" title="Attendance Form"]' ); ?>
                    </div>
                  -->
                </article>

            </div>
        </div>
    </div>
</section>

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="ourstory">
                    <div class="headings">
                        <h2>Our story</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>Ei mel malis audiam. Eos persius labores intellegam ne, pri id option imperdiet.</p>
                    </div>

                    <div class="content">

                        <?php
                            $story_args = array(
                                'post_type' => 'story',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'ASC'
                            );
                            $stories = new WP_Query( $story_args );
                            $x = ( count( $stories->posts ) ) - 1;

                            if( $stories->have_posts() ) :
                                $i = 0;

                                while( $stories->have_posts() ) : $stories->the_post();

                                // Get post featured image
                                $thumbnail_id = get_post_thumbnail_id();

                                if ( $thumbnail_id ) :
                                    $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
                                else :
                                    $thumbnail_url = get_template_directory_uri() . '/dist/img/placeholder-image-sq.jpg';
                                endif;

                                $date = get_post_time( 'F Y', true );
                        ?>

                        <div class="bookmark">
                            <div class="row">

                                <?php if( $i % 2 == 0 ) : ?>
                                <div class="col-sm-5">
                                    <h3><?php the_title(); ?></h3>
                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span><?php echo $date; ?></span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <?php the_content(); ?>
                                </div>
                                <?php endif; ?>

                                <div class="col-sm-2 <?php if( $i % 2 != 0 ) : echo 'col-sm-offset-5'; endif; ?>">
                                    <img src="<?php if ( $thumbnail_id ) : echo $thumbnail_url[ 0 ]; else: echo $thumbnail_url; endif; ?>" alt="<?php the_title(); ?>" />
                                </div>

                                <?php if( $i % 2 != 0 ) : ?>
                                <div class="col-sm-5">
                                    <h3><?php the_title(); ?></h3>
                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span><?php echo $date; ?></span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <?php the_content(); ?>
                                </div>
                                <?php endif; ?>

                            </div>

                            <?php //if( $i !== $x ) : ?>
                            <!-- <div class="join"></div> -->
                            <?php //endif; ?>
                        </div>

                        <?php
                            $i++;
                            endwhile;
                            endif;
                            wp_reset_query();
                        ?>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

<section class="container-fluid image-background" style="background-color: #111; <?php if( $bg_image_3 ) : echo 'background-image: url( ' . $bg_image_3 . ' ) no-repeat center center; background-size: cover;'; endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="people">
                    <div class="headings">
                        <h2>People</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>Our guests that will form the wedding party.</p>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">

                                <?php
                                    $groomsmen_args = array(
                                        'post_type' => 'people',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'taxonomies_people',
                                                'field' => 'id',
                                                'terms' => array( 4, 6 )
                                            )
                                        )
                                    );
                                    $groomsmen = new WP_Query( $groomsmen_args );
                                    if( $groomsmen->have_posts() ) : while( $groomsmen->have_posts() ) : $groomsmen->the_post();

                                    // Get post featured image
                                    $thumbnail_id = get_post_thumbnail_id();

                                    if ( $thumbnail_id ) :
                                        $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
                                    else :
                                        $thumbnail_url = get_template_directory_uri() . '/dist/img/placeholder-image-sq.jpg';
                                    endif;

                                    $id = get_the_ID();
                                    $terms = wp_get_post_terms( $id, 'taxonomies_people' );
                                ?>

                                <div class="row">
                                    <div class="clearfix groomsman">
                                        <div class="col-xs-4">
                                            <img src="<?php if ( $thumbnail_id ) : echo $thumbnail_url[ 0 ]; else: echo $thumbnail_url; endif; ?>" alt="<?php the_title(); ?>, <?php echo $terms[ 0 ]->name; ?>" />
                                        </div>
                                        <div class="col-xs-8">
                                            <h3><?php the_title(); ?></h3>
                                            <ul>
                                                <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                                <li><span><?php echo $terms[ 0 ]->name; ?></span></li>
                                                <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                            </ul>

                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    endwhile;
                                    endif;
                                    wp_reset_query();
                                ?>

                            </div>

                            <div class="col-md-6">

                                <?php
                                    $bridesmaid_args = array(
                                        'post_type' => 'people',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'taxonomies_people',
                                                'field' => 'id',
                                                'terms' => array( 5 )
                                            )
                                        )
                                    );
                                    $bridesmaid = new WP_Query( $bridesmaid_args );
                                    if( $bridesmaid->have_posts() ) : while( $bridesmaid->have_posts() ) : $bridesmaid->the_post();

                                    // Get post featured image
                                    $thumbnail_id = get_post_thumbnail_id();

                                    if ( $thumbnail_id ) :
                                        $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
                                    else :
                                        $thumbnail_url = get_template_directory_uri() . '/dist/img/placeholder-image-sq.jpg';
                                    endif;

                                    $id = get_the_ID();
                                    $terms = wp_get_post_terms( $id, 'taxonomies_people' );
                                ?>

                                <div class="row">
                                    <div class="clearfix bridesmaid">
                                        <div class="col-xs-8">
                                            <h3><?php the_title(); ?></h3>
                                            <ul>
                                                <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                                <li><span><?php echo $terms[ 0 ]->name; ?></span></li>
                                                <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                            </ul>

                                            <?php the_content(); ?>
                                        </div>

                                        <div class="col-xs-4">
                                            <img src="<?php if ( $thumbnail_id ) : echo $thumbnail_url[ 0 ]; else: echo $thumbnail_url; endif; ?>" alt="<?php the_title(); ?>, <?php echo $terms[ 0 ]->name; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    endwhile;
                                    endif;
                                    wp_reset_query();
                                ?>

                            </div>

                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

<?php
    $message_args = array(
        'post_type' => 'messages',
        'posts_per_page' => 3
    );
    $messages = new WP_Query( $message_args );
    if( $messages->have_posts() ) :
?>

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="friends">
                    <div class="headings">
                        <h2>Friends Wishes</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>Friends sending good vibes.</p>
                    </div>

                    <div class="content">
                        <div class="row">

                            <?php while( $messages->have_posts() ) : $messages->the_post(); ?>

                                <?php
                                    $column = 'col-md-4';
                                    switch( $messages->post_count ) {
                                        case 1 : $column = 'col-md-4 col-md-offset-4';
                                        case 2 : $column = 'col-md-6';
                                        default : $column = 'col-md-4';
                                    }
                                ?>

                            <div class="<?php echo $column; ?>">
                                <div class="wish">

                                    <?php the_content(); ?>

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span><?php the_title(); ?></span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                </div>
                            </div>

                            <?php endwhile; ?>
                        </div>

                        <a class="btn" href="<?php the_permalink( 30 ); ?>" title="See more messages...">See more&hellip;</a>
                    </div>
                </article>

            </div><!-- /col-12 -->

        </div>
    </div>
</section>

<?php endif; wp_reset_query(); ?>

<section class="container-fluid image-background" style="background-color: #222; <?php if( $bg_image_4 ) : echo 'background-image: url( ' . $bg_image_4 . ' ) no-repeat center center; background-size: cover;'; endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="messages">
                    <div class="headings">
                        <h2>Leave a message</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>Leave a message below, song requests are also welcome.<br/><small>* denotes required fields.</small></p>
                    </div>

                    <div id="message-form" class="content">
                        <?php echo do_shortcode( '[contact-form-7 id="9" title="Message Form"]' ); ?>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="outro">
                    <h2>Bring your dancing shoes!</h2>
                </article>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
