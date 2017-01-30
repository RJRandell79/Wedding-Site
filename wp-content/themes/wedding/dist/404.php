
<?php get_header(); ?>

<!-- This is the 404.php -->
<section role="main" class="container-fluid">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <article class="text-center">
                    <h2>404</h2>
                    <p>Sorry, we can&rsquo;t seem to find the bride&hellip; I mean page.&hellip;</p>
                </article>

                <article class="text-center">
                    <p>It looks like you have clicked a broken link or something went arwy with the website. Please click <a href="javascript:history.go( -1 )" title="Back">here</a> to return to the page you came from or click <a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'title' ); ?>">here</a> to return to the homepage.</p>
                </article>

            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>
