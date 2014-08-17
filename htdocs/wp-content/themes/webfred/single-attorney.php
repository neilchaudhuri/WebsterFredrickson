<?php get_header(); ?>
<?php
/*
    Template Name: Attorney
*/
$practice_connections = new WP_Query( array(
    'connected_type' => 'practices_to_attorneys',
    'connected_items' => get_queried_object(),
    'nopaging' => true,
) );
?>
    <section id="content" role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1><?php echo get_the_title(get_the_ID()) ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <figure>
                        <?php the_post_thumbnail('medium'); ?>
                        <div>
                            <?php
                            if ( $practice_connections->have_posts() ) :
                                ?>
                                <ul>
                                    <?php while ( $practice_connections->have_posts() ) : $practice_connections->the_post(); ?>
                                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php
                                wp_reset_postdata();

                            endif;
                            ?>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-9">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>