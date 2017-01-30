
<!-- This is the comments.php -->
<aside class="comments">
    <?php if( have_comments() ) : ?>
        <h3><?php printf( _nx( 'One comment on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?></h3>

        <ol>
            <?php
                wp_list_comments(
                    array(
                        'style' => 'ol',
                        'short_ping' => true,
                    )
                );
            ?>
        </ol>

        <?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="clearfix">
            <?php previous_comments_link( __( '&larr; Older comments' ) ); ?>
            <?php next_comments_link( __( 'Newer comments &rarr;' ) ); ?>
        </nav>
        <?php endif; ?>

        <?php if( !comments_open() && get_comments_number() ) : ?>
        <p>Comments are closed.</p>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form(); ?>
</aside>
