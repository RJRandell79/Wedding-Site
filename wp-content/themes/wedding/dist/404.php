
<?php get_header(); ?>

<!-- This is the 404.php -->
<section role="main" class="container-fluid">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <article class="four-oh-four">
                    <div class="headings">
                        <h2>Error 404</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>Sorry, we can&rsquo;t seem to find the bride&hellip; I mean page.&hellip;</p>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <p>It looks like you have clicked a broken link or something went arwy with the website.</p>
                                <p>Please click <a href="javascript:history.go( -1 )" title="Back">here</a> to return to the page you came from or click <a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'title' ); ?>">here</a> to return to the homepage.</p>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>
