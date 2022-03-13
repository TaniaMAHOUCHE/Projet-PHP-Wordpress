
<div class="div">
    <div class="small-image-area">
    <?php the_post_thumbnail('small-thumbnail') ?>
    </div>
    <!-- Le contenu des articles -->
    <div class="content">
         <!-- Le titre des articles -->
        <h1> <?php  the_title() ?> </h1>
        <!-- Limite le champ des posts et ajoute à la fin More -->
        <p> <?php echo get_the_excerpt() ?> </p>

        <div class="box-buttn">
            <button> <a href="<?php the_permalink() ;?>"> Réserver</a> </button>
        </div>
        
        
    </div>
</div>


        
        

