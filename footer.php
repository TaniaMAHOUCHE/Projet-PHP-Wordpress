




    <footer>
        <?php 
        // Ce tableau assocatif notamment la clé sert dans functions.php pour référer le menu dans le dashboard Wp
        $args = array(
            'theme_location' => 'footer' 
        );
        ?>

        <!-- Pour créer un une navbar / Affiche toutes pages que nous avons dans notre menu   -->
        <?php wp_nav_menu( $args ); ?> 

    </footer>
</body>
</html>