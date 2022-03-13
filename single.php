<?php get_header() ;

if ( have_posts() ) :
    while ( have_posts() ) : the_post();?>

    <div class="single-post-zone">

        <div class="single all-post">

                <h1> <?php  the_title() ?> </h1>
                <!-- Le titre des articles -->
                <?php the_post_thumbnail() ?>
                <!-- Le contenu des articles -->


                <!-- Condition Si un post a comme condition excerpt on renvoie un bout du texte 
                Sinon on envoie tout le contenu. 
                le but : rentrer dans le contenu des postes après avoir cliquer dessus -->
                <?php if( $post->post_excerpt  ) { ?>
                <button>
                    <?php echo get_the_excerpt() ?>
                    <a href="<?php the_permalink() ;?>">More</a>
                </button>

                <?php } else {
                    the_content() ;
                } ?>

            </div>

        <!-- Création de commentaires -->
        <div id="comments" class="single comments-area">
                <?php 
                // On vérifie si la sexion commentaire est ouvert. Et si la section commentaire détient des coommentaires
                if( comments_open() || get_comments()){
                    comments_template( 'comments.php' );
                }
                ?>
        </div>

    </div>
        
        
<?php
    endwhile;
else :
    _e( 'Sorry, no posts were found.', 'textdomain' );
endif;



?>




<?php get_footer() ?>