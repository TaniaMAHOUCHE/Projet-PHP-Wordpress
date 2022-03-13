<?php

/**
 * Template Name: Formulaire login
 * Template Post Type: page
 */
get_header();

global $user_ID ;
global $wpdb ;

?>


        <div class="primary">
            <div class="container">
                        <div class="card-body">
                            <h2 > <span class="underline"> Se connecter  </span></h2>
                            <?php 
                                // Si aucun l'utilisateur n'est pas connecté
                                if (! $user_ID) {
                                    // wp_login_form(); 

                                    
                                    if ( ! is_user_logged_in() ) { 
                                    $args = array(
                                        'redirect' => admin_url(), 
                                        'form_id' => 'loginform-custom',
                                        'label_username' => __( 'Identifiant | Mail' ),
                                        'label_password' => __( 'Mot de Passe' ),
                                        'label_remember' => __( 'Se souvenir de moi' ),
                                        'label_log_in' => __( 'Connexion' ),
                                        'remember' => true
                                    );}
                                        wp_login_form( $args );
                                    } else { 
                                            wp_loginout( home_url() ); // Montrer le lien "Log Out"
                                            echo " | ";
                                            wp_register('', ''); // Montrer le lien "Site Admin" 
                                    } ;  

                             
                                ?>

                        </div>
                </div>
            </div> -->
   

            





    


