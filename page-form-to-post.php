<?php
/**
* Template Name: Formulaire Pour envoyer dans la partie post
* Template Post Type: page
*/
global $user_ID;
get_header() ;
 ; ?>
<!-- Il s'agit d'une page avec un template - autrement dit un model de page -->
<!-- ce nom de template est à sélectionner dans la partie graphique de WP quand on edit. Il y a une rublique Template -->
<div class="primary" class="site-content">
    <div id="content" role="main">

        <?php
        /** Si le user clique sur Submit (envoyer) , les données du formualires sont stocké dans le formulaire
         * Il faut que tous les champs soient remplis.
         */


        function ifInputIsNumber($request_value){

            if ( isset($request_value) && !empty($request_value)){

                if(preg_match_all('/[0-9]*/',$request_value)) {
                    echo ' Match Requete  : '.$request_value ;
                    echo '<br> ' ;
                    print_r($request_value) ; 
                    echo '<br> :' ;
                    return $request_value;
                  }
                  else {
                    echo 'Pas match'.$request_value ;
                    print_r($request_value) ; 
                    echo '<br>' ;
                

                    false ;
                  }
                };
            };

            function ifInputIsTexte($request_value){
                if ( isset($request_value) && !empty($request_value)){
    
                    if(preg_match_all('/[a-zA-Z]*/',$request_value)) {
                        echo 'La requete  : '.$request_value ;
                        echo '<br>' ;
                        print_r($request_value) ;
                        echo '<br>' ;
                        return $request_value;
                      }
                      else {
                            echo '<br>' ;
                            print_r($request_value) ;
                            echo '<br>' ;
                            false ;
                      }
                    };
                };
    


        if ( isset( $_POST['submit'])){
            $title = ifInputIsTexte($_POST['title']) ;
            $category= ifInputIsTexte($_POST['category']) ;
            $number_visitor = ifInputIsNumber($_POST['number_visitor']);
            $number_rooms = ifInputIsNumber($_POST['number_rooms']);
            $number_bed = ifInputIsNumber($_POST['number_bed']) ;
            $price = ifInputIsNumber($_POST['price']) ;

            $content = 
            '<div class="card-info"> 
                <p> '.$category  .'</p>
                <ul class="list_info">
                    <li>'.$number_visitor .' Personne(s)</li>
                    <li> '. $number_rooms .' Chambre(s)</li>
                    <li> '. $number_bed   .' Lit(s)</li>
                </ul>
            <p> '. $price .' € / nuits</p>
            </div> ';

        date_default_timezone_set('Europe/Paris');
        $post = array(
            'post_author'  => $user_ID,
            'post_content' => $content ,
            'post_title'   => $title,
            'post_status'  => 'publish',
            'post_type'    => 'post',
            'post_date'    => date('Y-m-d H:i:s'),

        );

       $post_id = wp_insert_post($post) ;

       if($post_id){
          
            $upload = wp_upload_bits($_FILES["image"]["name"], null, file_get_contents($_FILES["image"]["tmp_name"]));
            $post_id = $post_id; //set post id to which you need to set featured image
            $filename = $upload['file'];
            $wp_filetype = wp_check_filetype($filename, null);
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title' => sanitize_file_name($filename),
                'post_content' => '',
                'post_status' => 'inherit'
            );
    
            $attachment_id = wp_insert_attachment( $attachment, $filename, $post_id );
    
            if ( ! is_wp_error( $attachment_id ) ) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
                wp_update_attachment_metadata( $attachment_id, $attachment_data );
                set_post_thumbnail( $post_id, $attachment_id );
            }
        } else {
        echo "Attention: Votre post n'a pas pu être inséré dans Wordpress\n";
        }
    }
        ; ?>

        <!-- /** Affichage du formulaire */ -->

    <div class="container">
        <div class="card-body-post">
            <h2> Votre annonce</h2>
            <h5> Une annonce clair et précise est l'assurance de trouver très vite de nouveaux locataires </h5>
            <form action="<?php echo permalink_link(); ?>" method="post"  enctype="multipart/form-data"   >
                <div class="div-form">
                    <label for="title">Titre de l'annonce :</label>
                    <input type="text" id="title" name="title">
                </div>
                <div class="div-form">
                    <label id="price"> Prix : </label>
                    <input type="number" id="price" name="price" pattern="[0-9]" >
                </div>
                <div class="div-form">
                    <h4> Localisation </h4>
                    <div class="div-form">
                        <label id="country" > Pays : </label>
                        <input type="text" id="country" name="country" >
                    </div>
                    <div class="div-form">
                        <label id="city" > Ville : </label>
                        <input type="text" id="city" name="city" pattern="[a-zA-Z]{g}" >
                    </div>
                </div>
                
                <div>
                    <h4>Sélectionner les périodes de disponibilité du bien :</h4>
                    <div class="div-form">
                        <label id="date-beginning">Début de priode</label>
                        <input type="date" id="date-beginning" name="date-beginning">
                    </div>
                    <div class="div-form">
                        <label id="date-end">Début de fin</label>
                        <input type="date" id="date-end" name="date-end" >
                    </div>
                </div>
                <div>
                    <h4>Informations complémentaires :</h4>
                    <div class="div-form">
                        <label id="number_visitor" >Nombre de personnes :</label>
                        <input type="number" id="number_visitor" name="number_visitor" pattern="[0-9]" >
                    </div>
                    
                    <div class="div-form">
                        <label id="number_rooms">Nombre de chambres :</label>
                        <input type="number" id="number_rooms" name="number_rooms" pattern="[0-9]" >
                    </div>
                    <div class="div-form">
                        <label id="number_bed">Nombre de lits :</label>
                        <input type="number" id="number_bed" name="number_bed" pattern="[0-9]">
                    </div>
                </div>
                <div class="div-form">
                    <label id="description"> Description du bien  :</label>
                    <textarea col=50 rows="10" id="description" name="description" placeholder="Description du bien ..."></textarea>
                </div>
                <div class="div-form">
                    <label for="category">Catégorie :</label>
                    <select  name="category" id="category">
                        <option value="0"> - Logements -</option>
                        <option value="Appartements"> Appartements</option>
                        <option value="maison">Maison</option>
                        <option value="Villas"> Villas</option>
                        <option value="Chalets"> Chalets</option>
                        <option value="Cottages"> Cottages</option>
                        <option value="Loft"> Loft</option>
                    </select>
                </div>
                <!-- Partie du Formulaire pour choisir une image à télécharger pour aller dans le Post -->
                <div class="form-group div-form">
                    <label><?php _e('Choisissez une image:', 'Your text domain here');?></label>
                    <input type="file" name="image">
                </div>
                <div class="div-form submit-btn">
                    <input type="submit" name="submit" value="Publier votre annonce">
                </div>
            </form>
        </div>
    </div>

   


    
       
   






  
        
    </div> <!-- content -->
</div>  <!-- primary -->

<?php get_footer(); ?>