
<?php
    /**
    * Template Name: Directions Page
    **/

    get_header();
?>

<!-- This is the directions-page.php -->
<section role="main" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <article class="ceremony directions">
                    <div class="headings">
                        <h2>Directions</h2>
                        <ul>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart fa-heartbeating" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                        </ul>
                    </div>

                    <div class="content">
                        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php the_content(); ?>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <?php endwhile; endif; ?>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="church">
                                    <h3>Church</h3>

                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <h5>December 2nd 2017, 12:00pm</h5>
                                    <h5>St. Joseph&rsquo;s RC Church,<br/>Harpers Lane, Chorley, PR6 0HR</h5>

                                    <div id="church-map" class="map-container"></div>

                                    <form id="church-directions" class="directions-form clearfix" method="GET">
                                        <input type="text" id="my-church-location" placeholder="Enter postcode/address">
                                        <input class="btn" type="submit" value="Get directions" />
                                    </form>

                                    <div id="church-directions-panel" class="directon-results"></div>

                                    <a class="btn" href="https://www.google.co.uk/maps/place/St+Joseph+Roman+Catholic+Church/@53.6614937,-2.6251339,17z/data=!3m1!4b1!4m5!3m4!1s0x487b0c6090a47a19:0x644a97d09a66dced!8m2!3d53.6614937!4d-2.6229399" title="Open in Google Maps" target="_blank">Open in Google Maps</a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="reception">
                                    <h3>Reception &amp; Evening</h3>

                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <h5>December 2nd 2017, 3:00pm</h5>
                                    <h5>Beeston Manor,<br/>Hoghton, PR5 0RA</h5>

                                    <div id="reception-map" class="map-container"></div>

                                    <form id="reception-directions" class="directions-form clearfix" method="GET">
                                        <input type="text" id="my-reception-location" placeholder="Enter postcode/address">
                                        <input class="btn" type="submit" value="Get directions" />
                                    </form>

                                    <div id="reception-directions-panel" class="directon-results"></div>

                                    <a class="btn" href="https://www.google.co.uk/maps/place/Beeston+Manor+Events+Venue/@53.744941,-2.604158,17z/data=!3m1!4b1!4m5!3m4!1s0x487b7483b0b3419f:0x6d50208700baf14d!8m2!3d53.744941!4d-2.601964" title="Open in Google Maps" target="_blank">Open in Google Maps</a>
                                </div>
                            </div>
                        </div>

                </article>

            </div><!-- /col-md-12 -->

        </div>
    </div>
</section>

<?php get_footer(); ?>
