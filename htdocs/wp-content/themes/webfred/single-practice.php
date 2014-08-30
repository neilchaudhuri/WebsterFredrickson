<?php get_header(); ?>
<?php
/*
    Template Name: Practice
*/
$attorney_connections = new WP_Query(array(
    'connected_type' => 'practices_to_attorneys',
    'connected_items' => get_queried_object(),
    'nopaging' => true,
));
?>
    <section id="content" role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1><?php single_post_title(); ?> </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <figure>

                       <div>
                            <?php
                            if ($attorney_connections->have_posts()) :
                                ?>
                                <ul>
                                    <?php while ($attorney_connections->have_posts()) : $attorney_connections->the_post(); ?>
                                        <?php the_post_thumbnail('medium'); ?>
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

                <div class="col-lg-9 text">
                    <?php the_content(); ?>
                    <div>If you need a lawyer to provide guidance with a bankruptcy, please contact us.</div>
                </div>
            </div>
        </div>

    </section>

<?php get_footer(); ?>