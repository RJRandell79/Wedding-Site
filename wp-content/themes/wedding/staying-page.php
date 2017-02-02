
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

                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

                <article class="where-to-stay">
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

                    <div class="content">
                        <div class="row">

                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span>MacDonald Tickled Trout Hotel</span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <p><span>Address:</span> Preston New Road, Samlesbury, Preston PR5 0UJ</p>
                                    <p><span>Tel:</span> 01772 868000</p>
                                    <p><span>Distance from Beeston Manor:</span> 2.5 miles, 8 minute drive</span></p>
                                    <a class="btn" href="https://www.google.co.uk/maps/dir/Beeston+Manor+Events+Venue,+Quaker+Brook+Lane,+Preston/Macdonald+Tickled+Trout+Hotel,+Preston+New+Road,+Samlesbury,+Preston/@53.7519299,-2.6829654,13z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x487b7483b0b3419f:0x6d50208700baf14d!2m2!1d-2.601964!2d53.744941!1m5!1m1!1s0x487b7295c523af1d:0x91f73c4319019563!2m2!1d-2.6408633!2d53.7652932?hl=en" target="_blank" title="Get directions">Directions</a>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span>Samlesbury Hotel</span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <p><span>Address:</span> Preston New Road, Samlesbury, Preston PR5 0UL</p>
                                    <p><span>Tel:</span> 01772 868000</p>
                                    <p><span>Distance from Beeston Manor:</span> 3 miles, 10 minute drive</span></p>
                                    <a class="btn" href="https://www.google.co.uk/maps/dir/Beeston+Manor+Events+Venue,+Quaker+Brook+Lane,+Preston/Samlesbury+Hotel,+Preston+New+Road,+Preston/@53.75555,-2.6277804,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x487b7483b0b3419f:0x6d50208700baf14d!2m2!1d-2.601964!2d53.744941!1m5!1m1!1s0x487b7476c16ded79:0x615a3e9118c45cf8!2m2!1d-2.602999!2d53.766772?hl=en" target="_blank" title="Get directions">Directions</a>

                                </div>
                            </div>



                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span>Preston South Holiday Inn</span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <p><span>Address:</span> Reedfield Pl, Walton Summit, Walton Summit Centre, Preston PR5 8AA</p>
                                    <p><span>Tel:</span> 01772 289700</p>
                                    <p><span>Distance from Beeston Manor:</span> 4 miles, 12 minute drive</span></p>
                                    <a class="btn" href="https://www.google.co.uk/maps/dir/Beeston+Manor+Events+Venue,+Quaker+Brook+Lane,+Preston/Holiday+Inn+Express+-+Preston+South,+Reedfield+Pl,+Walton+Summit,+Walton+Summit+Centre,+Preston+PR5+8AA/@53.7349244,-2.6538656,13z/data=!4m13!4m12!1m5!1m1!1s0x487b7483b0b3419f:0x6d50208700baf14d!2m2!1d-2.601964!2d53.744941!1m5!1m1!1s0x487b7327d24d4fb9:0xe8e2ab2c72fea681!2m2!1d-2.6547136!2d53.718688?hl=en" target="_blank" title="Get directions">Directions</a>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span>South Craven Drive Premier Inn</span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <p><span>Address:</span> Lostock Lane, Bamber Bridge, Preston PR5 6BZ</p>
                                    <p><span>Tel:</span> 08715 278914</p>
                                    <p><span>Distance from Beeston Manor:</span> 5 miles, 15 minute drive</span></p>
                                    <a class="btn" href="https://www.google.co.uk/maps/dir/Beeston+Manor+Events+Venue,+Quaker+Brook+Lane,+Preston/Premier+Inn+Preston+South+Craven+Drive,+Lostock+Lane,+Bamber+Bridge/@53.7400365,-2.6517724,13z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x487b7483b0b3419f:0x6d50208700baf14d!2m2!1d-2.601964!2d53.744941!1m5!1m1!1s0x487b72db293ab44d:0x2699360c4795e8f2!2m2!1d-2.671545!2d53.720675?hl=en" target="_blank" title="Get directions">Directions</a>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span>Stanley House Hotel &amp; Spa</span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <p><span>Address:</span> Further Lane, Mellor BB2 7NP</p>
                                    <p><span>Tel:</span> 01254 769200</p>
                                    <p><span>Distance from Beeston Manor:</span> 5.5 miles, 15 minute drive</span></p>
                                    <a class="btn" href="https://www.google.co.uk/maps/dir/Beeston+Manor+Events+Venue,+Quaker+Brook+Lane,+Preston/Stanley+House+Hotel+%26+Spa,+Mellor/@53.7572356,-2.6140587,13z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x487b7483b0b3419f:0x6d50208700baf14d!2m2!1d-2.601964!2d53.744941!1m5!1m1!1s0x487b7452bcbbdc35:0x90c5904b1b2da994!2m2!1d-2.539434!2d53.764235?hl=en" target="_blank" title="Get directions">Directions</a>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span>Preston East</span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <p><span>Address:</span> Bluebell Way, Preston East Link Road, Preston PR2 5PZ</p>
                                    <p><span>Tel:</span> 08715 278910</p>
                                    <p><span>Distance from Beeston Manor:</span> 5.5 miles, 12 minute drive</span></p>
                                    <a class="btn" href="https://www.google.co.uk/maps/dir/Beeston+Manor+Events+Venue,+Quaker+Brook+Lane,+Preston/Premier+Inn+Preston+East,+Preston/@53.7646789,-2.6835744,13z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x487b7483b0b3419f:0x6d50208700baf14d!2m2!1d-2.601964!2d53.744941!1m5!1m1!1s0x487b73d9e40b620f:0x56b01486a6049e72!2m2!1d-2.6582676!2d53.7896969?hl=en" target="_blank" title="Get directions">Directions</a>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span>Preston Chorley Travelodge</span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <p><span>Address:</span> 472 Preston Rd, Clayton-le-Woods, Chorley PR6 7JB</p>
                                    <p><span>Tel:</span> 08719 846172</p>
                                    <p><span>Distance from Beeston Manor:</span> 5.5 miles, 13 minute drive</span></p>
                                    <a class="btn" href="https://www.google.co.uk/maps/dir/Beeston+Manor+Events+Venue,+Quaker+Brook+Lane,+Preston/Travelodge+Preston+Chorley,+Preston+Road,+Clayton-le-Woods/@53.7335122,-2.6537797,13z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x487b7483b0b3419f:0x6d50208700baf14d!2m2!1d-2.601964!2d53.744941!1m5!1m1!1s0x487b0cce6d9652fb:0x3fe833031d8b9f12!2m2!1d-2.6384913!2d53.701622?hl=en" target="_blank" title="Get directions">Directions</a>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span>Blackburn South Premier Inn</span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <p><span>Address:</span> Riversway Drive, off Eccleshill Road, Lower Darwen BB3 0SN</p>
                                    <p><span>Tel:</span> 08715 278100</p>
                                    <p><span>Distance from Beeston Manor:</span> 7 miles, 15 minute drive</span></p>
                                    <a class="btn" href="https://www.google.co.uk/maps/dir/Beeston+Manor+Events+Venue,+Quaker+Brook+Lane,+Preston/Premier+Inn+Blackburn+South,+Riversway+Drive,+Off+Eccleshill+Road,+Lower+Darwen+BB3+0SN/@53.7311272,-2.5741397,12.99z/data=!4m13!4m12!1m5!1m1!1s0x487b7483b0b3419f:0x6d50208700baf14d!2m2!1d-2.601964!2d53.744941!1m5!1m1!1s0x487b9ff381a18117:0xa9e21fffd63a556a!2m2!1d-2.474703!2d53.717441?hl=en" target="_blank" title="Get directions">Directions</a>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="hotel">

                                    <ul>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><span>Blackburn M65 Travelodge</span></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                    </ul>

                                    <p><span>Address:</span> Darwen Motorway Service Area, Commercial Road, Darwen BB3 0AT</p>
                                    <p><span>Tel:</span> 08719 846122</p>
                                    <p><span>Distance from Beeston Manor:</span> 7 miles, 15 minute drive</span></p>
                                    <a class="btn" href="https://www.google.co.uk/maps/dir/Beeston+Manor+Events+Venue,+Quaker+Brook+Lane,+Preston/Travelodge+Blackburn+M65+Hotel,+Darwen+Motorway+Service+Area,+Commercial+Road,+M65+Motorway,+Blackburn+with+Darwen,+Darwen+BB3+0AT/@53.7286985,-2.5749346,13z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x487b7483b0b3419f:0x6d50208700baf14d!2m2!1d-2.601964!2d53.744941!1m5!1m1!1s0x487b9ff66c27cf6b:0x9c6968a52d76496e!2m2!1d-2.4772162!2d53.712709?hl=en" target="_blank" title="Get directions">Directions</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </article>

                <?php endwhile; endif; ?>

            </div><!-- /col-md-12 -->

        </div>
    </div>
</section>

<?php get_footer(); ?>
