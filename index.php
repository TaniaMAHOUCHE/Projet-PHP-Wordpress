<?php get_header() ?>

<main>
    <section class="hero">
        <div class="hero-inner">
            <h3> Redonnez un nouveau souffle à vos vacances  </h3>
            <h4>Trouvez la location qu'il vous faut</h4>
        </div>
    </section>

    
    <section>
        <div class="container-grid">
        <?php 
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();?>

                <!-- le nom content match avec le nom du fichier content.php. ce fichier affiche les élements posts. -->
                <?php get_template_part('content'); ?>
        
        <?php
            endwhile;
        else :
            _e( 'Aucun post trouvé.', 'textdomain' );
        endif;
        ?>
        </div>

    </section>

</main>





<?php get_footer() ?>