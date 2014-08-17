<?php get_header(); ?>
<?php
/*
    Template Name: Practice
*/
$attorney_connections = new WP_Query( array(
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
                <div class="col-lg-12">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php
                    if ( $attorney_connections->have_posts() ) :
                        ?>
                        <ul>
                            <?php while ( $attorney_connections->have_posts() ) : $attorney_connections->the_post(); ?>
                                <li>
                                    <figure>
                                        <?php the_post_thumbnail('medium'); ?>
                                        <figcaption> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></figcaption>
                                    </figure>

                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php
                        wp_reset_postdata();

                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>