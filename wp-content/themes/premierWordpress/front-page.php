<?php get_header(); ?>

<!-- Multiple Links -->
<?php $urls = get_field('page_url'); ?>

<?php foreach($urls as $url) : ?>
    <a href="<?= $url ?>"><button type="button">Link</button></a>
<?php endforeach ?>

<h1><?php the_field('home_page_header_text'); ?></h1>

<p><?php the_field('home_page_header_description'); ?></p>

<img src="<?php the_field('home_page_header_image'); ?>" alt="" height="500">

<!-- List of links -->
<?php if( have_rows('home_page_button_links') ): ?>
    <ul>
    <?php while( have_rows('home_page_button_links') ) : the_row(); ?>
        <li>
            <a href="<?php the_sub_field('button_url'); ?>" target="_blank" >
                <button type="button">
                    <?php the_sub_field('button_text'); ?>
                </button>
            </a>
        </li>
    <?php endwhile; ?>
    </ul>
    <?php else : ?>
        No rows found
<?php endif; ?>

<!-- Image Gallery -->
<?php 

$images = get_field('home_page_gallery');

if( $images ): ?>
    <ul>
        <?php foreach( $images as $image ): ?>
            <li>
                <a href="<?php echo $image['url']; ?>">
                     <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" height="200"/>
                </a>
                <p><?php echo $image['caption']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Movies -->
<?php $the_query = new WP_Query( array( 'post_type' => 'movie' ) ); ?>
 
<?php if ( $the_query->have_posts() ) : ?>

    <?php while ( $the_query->have_posts() ) : ?>
        <?php $the_query->the_post(); ?>
        <h3><?php the_field('movie_title') ?></h3>
        <?php if(get_field('is_available')) : ?>
            <div>Available</div>
            <div>Cost: $<?php the_field('cost') ?></div>
        <?php else : ?>
            <div>Not Available</div>
        <?php endif ?>
        <p><?php the_field('movie_description') ?></p>
        <img src="<?php the_field('movie_image') ?>" height="200"/>
    <?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>