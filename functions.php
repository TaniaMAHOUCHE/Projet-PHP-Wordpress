<?php

function register(){

    if (isset($_POST['submit-register'])){


		$username = $_POST['username'] ;
		$password= $_POST['password'] ;
		$email= $_POST['email'];
	
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'] ;
		$nickname = $_POST['nickname'] ;
	
	
		$country = $_POST['country'];
		$adress = $_POST['adress'] ;
		$zip_code = $_POST['zip-code'] ;
	
		$city = $_POST['city'] ;
		$bio = $_POST['bio'];
		$now = new DateTime(); 
		$datesent = $now->format('Y-m-d H:i:s'); 
	
		$user_data = [
			'user_login' => $username,
			'user_pass'  => $password,
			'user_email' => $email,
			'first_name' => $firstname,
			'last_name'  => $lastname,
			'nickname'   => $nickname,
			'description'=> $bio,
			'user_registered' => $datesent,
			'role' => 'Modérateur',
		];
		$user_id = wp_insert_user( $user_data ) ;
		if ( is_wp_error($user_id ) ){
			session_start();
		  	return  $user_id->get_error_message();
		}
		else {
		 	wp_update_user( array ('ID' => $user_id, 'role' => 'Modérateur') ) ;
		 	$creds['user_login'] = $_POST["username"];
		 	$creds['user_password'] = $_POST["password"];
		 	$creds['remember'] = true;
		 	$user = wp_signon( $creds, false );
			$url = admin_url();
		   	wp_redirect($url);
			return true;
		   	exit();
		}
	}
}


add_action('init', 'register');


function redirect_login_page() {
	$login_page  = home_url( '/login/wp-admin' );
	$page_viewed = basename($_SERVER['REQUEST_URI']);
	 
	if( $page_viewed == "wp-connexion.php" && $_SERVER['REQUEST_METHOD'] == 'POST') {
	  wp_redirect($login_page);
	  exit;
	}
  }
  add_action('init','redirect_login_page');



function login_failed() {
	$login_page  = home_url( '/login/' );
	wp_redirect( $login_page . '?login=failed' );
	exit;
  }
add_action( 'wp_login_failed', 'login_failed' );
   

function verify_username_password( $user, $username, $password ) {
	$login_page  = home_url( '/login/' );
	  if( $username == "" || $password == "" ) {
		  wp_redirect( $login_page . "?login=empty" );
		  exit;
	  }
  }
add_filter( 'authenticate', 'verify_username_password', 1, 3);


function logout_page() {
	$login_page  = home_url( '/login/' );
	wp_redirect( $login_page . "?login=false" );
	exit;
  }
add_action('wp_logout','logout_page');

// Enregistrement des fichier css à appliquer
function wp_css(){
    // applique style.css qui s'applique à toutes les pages
	wp_enqueue_style('main_style',  get_stylesheet_directory_uri() . '/style.css');    // second fichier css appliqué
    // wp_enqueue_style('melon', get_template_directory_uri() . '/testercss.css');
}

add_action( 'wp_enqueue_scripts','wp_css' ) ;


// Navigation menus qui apparait dans dashBoard Wordpress dans la rublique apparence - Menus
// Fonctions navtive wordpress
// les clés sont issus du header et du footer grace à la fonction wp_nav_menu( $args )
register_nav_menus (array(
    'primary' =>  __('Header Menu'),
    'footer' => __('Footer Menu'),

));


//Changer le nom de caractère manimum dans une publication
function change_length(){
  return 20 ;
}
add_filter('excerpt_length','change_length') ;



function redirect_espace_page() {
	$login_page  = home_url( '/mon-espace/' );
	$page_viewed = basename($_SERVER['REQUEST_URI']);
	 
	if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
	  wp_redirect($login_page);
	  exit;
	}
  }
add_action('init','redirect_espace_page');



/* Enregistrer des images de support : pour mes Postes */

function my_theme_register_thumbnail_support() {
    add_theme_support( 'post-thumbnails' );
	add_image_size('small-thumbnail',280,220,true);
	add_image_size('banner-image',920,210,true);
}

add_action( 'after_setup_theme', 'my_theme_register_thumbnail_support' );



function taxo_logement() {

	register_taxonomy('logement', 'post', [
		'labels' => [
			'name' =>  'Logement', 
			'singular_name' => 'Logement',
			'search_items' => 'Rechercher des logements',
			'all_items' => 'Tous les logements',
			'edit_item' => 'Editer le logement',
			'update_item' => 'Ajouter un sport',
			'add_new_item' => 'Mettre à jour le logement',
			'new_item_name' => 'Ajouter un nouveau logement',
			'menu_name' => 'Logement',
		], 
			'with_front' => false, 
			'show_in_rest' => true,
			'hierarchical' => true , 
			'show_admin_column' => true, 
		
	]);
}

add_action('init', 'taxo_logement');


function taxo_price() {

	register_taxonomy('Prix', 'post', [
		'labels' => [
			'name' =>  'Prix', 
			'singular_name' => 'Prix',
			'search_items' => 'Rechercher des Prix',
			'all_items' => 'Tous les prix',
			'edit_item' => 'Editer le prix',
			'update_item' => 'Ajouter un prix',
			'add_new_item' => 'Mettre à jour le prix',
			'new_item_name' => 'Ajouter un nouveau prix',
			'menu_name' => 'Prix',
		], 
			'with_front' => false, 
			'show_in_rest' => true,
			'hierarchical' => true , 
			'show_admin_column' => true, 
		
	]);
}

add_action('init', 'taxo_price');





function taxo_localisation() {

	register_taxonomy('Localisation', 'post', [
		'labels' => [
			'name' =>  'Localisation', 
			'singular_name' => 'Localisation',
			'search_items' => 'Rechercher des Localisations',
			'all_items' => 'Toutes les Localisations',
			'edit_item' => 'Editer la Localisation',
			'update_item' => 'Ajouter une localisation',
			'add_new_item' => 'Mettre à jour la Localisation',
			'new_item_name' => 'Ajouter une nouvelle Localisation',
			'menu_name' => 'Localisation',
		], 
			'with_front' => false, 
			'show_in_rest' => true,
			'hierarchical' => true , 
			'show_admin_column' => true, 
		
	]);
}
add_action('init', 'taxo_localisation');


function taxo_nombre_de_pieces() {

	register_taxonomy('Nombre de pieces', 'post', [
		'labels' => [
			'name' =>  'Nombre de pieces M2', 
			'singular_name' => 'Nombre de pieces',
			'search_items' => 'Rechercher des nombres de pieces',
			'all_items' => 'Tous les nombres de pièces',
			'edit_item' => 'Editer le nombre de pièces',
			'update_item' => 'Ajouter un nombre de pièces',
			'add_new_item' => 'Mettre à jour le nombre de pièces',
			'new_item_name' => 'Ajouter un nouveau nombre de pièces',
			'menu_name' => 'Nombre de pièces',
		], 
			'with_front' => false, 
			'show_in_rest' => true,
			'hierarchical' => true , 
			'show_admin_column' => true, 
		
	]);
}
add_action('init', 'taxo_nombre_de_pieces');


function taxo_Superficies() {

	register_taxonomy('Superficies m2', 'post', [
		'labels' => [
			'name' =>  'Superficies', 
			'singular_name' => 'Superficies',
			'search_items' => 'Rechercher des Superficiess',
			'all_items' => 'Toutes les Superficiess',
			'edit_item' => 'Editer la Superficies',
			'update_item' => 'Ajouter une Superficies',
			'add_new_item' => 'Mettre à jour la Superficies',
			'new_item_name' => 'Ajouter une nouvelle Superficies',
			'menu_name' => 'Superficies',
		], 
			'with_front' => false, 
			'show_in_rest' => true,
			'hierarchical' => true , 
			'show_admin_column' => true, 
		
	]);
}
	
add_action('init', 'taxo_Superficies');



add_role(
    'Modérateur', //  System name of the role.
    __( 'Modérateur'  ), // Display name of the role.
    array(
        'read'  => true,
        'delete_posts'  => true,
        'delete_published_posts' => true,
        'edit_posts'   => true,
        'publish_posts' => true,
        'upload_files'  => true,
        'edit_pages'  => true,
        'edit_published_pages'  =>  true,
        'publish_pages'  => true,
        'delete_published_pages' => false, 
		'moderate_comments'=> true 
    )
);