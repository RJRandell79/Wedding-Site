
<!-- This is the footer.php -->
<?php
    $email = get_option( 'email_address' );
    $twitter = get_option( 'twitter_url' );
    $instagram = get_option( 'instagram_url' );
    $pinterest = get_option( 'pinterest_url' );
    $analytics = get_option( 'analytics' );
?>

<footer role="contentinfo" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer">
                    <div class="content">
                        <div class="row">

                            <div class="col-sm-6">
                                <?php if( $email || $twitter || $instagram || $pinterest ) : ?>
                                <ul>
                                    <?php if( $email ) : ?>
                                    <li><a target="_blank" href="mailto: <?php echo $email; ?>" title="Twitter"><i class="fa fa-envelope"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $twitter ) : ?>
                                    <li><a target="_blank" href="<?php echo $twitter; ?>" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $instagram ) : ?>
                                    <li><a target="_blank" href="<?php echo $instagram; ?>" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                    <?php endif; ?>
                                    <?php if( $pinterest ) : ?>
                                    <li><a target="_blank" href="<?php echo $pinterest; ?>" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                                <?php endif; ?>
                            </div>

                            <div class="col-sm-6">
                                <p class="copyright">&copy;2017 <a href="http://www.rjrstudios.co.uk/" target="_blank">RJR Studios</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<?php if( is_page( 42 ) ) : ?>
    <!-- Directions Stylesheet -->
    <link rel='stylesheet' href='http://wedding.dev/wp-content/themes/wedding/dist/css/directions.css' type='text/css' media='all' />
<?php endif; ?>

<?php
    if( $analytics ) :
        echo $analytics;
    endif;
?>

</body>
</html>
