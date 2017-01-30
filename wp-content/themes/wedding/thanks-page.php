
<?php
    /**
    * Template Name: Thank You Page
    **/

    get_header();
?>

<!-- This is the thanks-page.php -->
<section role="main" class="container-fluid">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <article class="thank-you">
                    <div class="headings">
                        <h2>Thank You</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                        <p>Thanks for getting in touch.</p>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <p>If you have left a message, check back soon and see if your message has been added on to the website.</p>
                                <p>If you have left a general query, we;&rsquo;ll get back to you as soon as possible.</p>
                                <p>Please click <a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'title' ); ?>">here</a> to return to the homepage.</p>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>
