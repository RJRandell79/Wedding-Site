
<?php
    /**
    * Template Name: Messages Page
    **/

    get_header();
?>

<!-- This is the page.php -->
<section role="main" class="container-fluid">
    <div class="container">
        <div class="row">

            <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $messages_args = array(
                    'post_type' => 'messages',
                    'posts_per_page' => 12,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'paged' => $paged
                );
                $messages = new WP_Query( $messages_args );
                $wp_query = $messages;

                if( $wp_query->have_posts() ) :
            ?>

            <div class="col-md-12">

                <article class="friends">
                    <div class="headings">
                        <h2>Friends&rsquo; Wishes</h2>
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

                            <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                            <?php
                                $column = 'col-md-4';
                                switch( $wp_query->post_count ) {
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
                    </div>
                </article>

            </div><!-- /col-md-12 -->

            <div class="pagination">
                <?php html5wp_pagination(); ?>
            </div>

            <?php else : ?>

            <div class="col-md-12">

                <article class="friends">
                    <div class="headings">
                        <h2>Friends&rsquo; Wishes</h2>
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
                            <div class="col-md-12">
                                <p class="text-center">There are no messages yet to show here yet!</p>
                            </div>
                        </div>
                    </div>

                </article>

            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>
