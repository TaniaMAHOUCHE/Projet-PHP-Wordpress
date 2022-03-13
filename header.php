<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title><?php bloginfo('name'); ?></title>
     <?php wp_head() ;?>
</head>
<body>

<header>

    <h1>
        <!-- Là on créé un lien qui a pour texte le nom du blog -->
        <a href="<?php echo home_url(); ?> "> 
        <!-- Nom de notre site  -->
            <?php bloginfo('name'); ?>
        </a>
    </h1>
    <nav class="site-nav">
        <!-- Pour créer un une navbar - Affiche toutes pages que nous avons dans notre menu   -->
        <?php $args = array( 'theme_location'  =>  'primary' ) ; ?>
        <?php wp_nav_menu( $args ); ?> 

    </nav>

</header>

    
