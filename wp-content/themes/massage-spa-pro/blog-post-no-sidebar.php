<?php
/* Template Name: Blog - No Sidebar */
get_header(); ?>

<div class="container content-area">
    <div class="middle-align">
        <div class="site-main nosidebar">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	            <header><h1 class="entry-title"><?php the_title(); ?></h1></header>
            <?php endwhile; else: endif; ?>

			<?php 
            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
            elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
            else { $paged = 1; }
            $query = new WP_Query( array('post_type' => 'post','paged' => $paged ) ); ?>
            <?php if( $query->have_posts() ) : ?>
                <?php while( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
                <?php spa_massage_custom_blogpost_pagination( $query ); ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'index' ); ?>
            <?php endif; ?>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>