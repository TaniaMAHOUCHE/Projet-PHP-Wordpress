<?php
/**
* Template Name: Formulaire Inscription
* Template Post Type: page
*/
get_header() ;


    // if (isset($_POST['submit'])){


	// 	echo 'Louise' ;

	// 	function ifInputIsNumber($request_value){

    //         if ( isset($request_value) && !empty($request_value)){

    //             if(preg_match_all('/[0-9]*/',$request_value)) {
    //                 echo ' Match Requete  : '.$request_value ;
    //                 echo '<br> ' ;
    //                 print_r($request_value) ; 
    //                 echo '<br> :' ;
    //                 return $request_value;
    //               }
    //               else {
    //                 echo 'Pas match'.$request_value ;
    //                 print_r($request_value) ; 
    //                 echo '<br>' ;
                

    //                 false ;
    //               }
    //             };
    //         };

    //         function ifInputIsTexte($request_value){
    //             if ( isset($request_value) && !empty($request_value)){
    
    //                 if(preg_match_all('/[a-zA-Z]*/',$request_value)) {
    //                     echo 'La requete Pas de match: '.$request_value ;
    //                     echo '<br>' ;
    //                     print_r($request_value) ;
    //                     echo '<br>' ;
    //                     return $request_value;
    //                   }
    //                   else {
    //                         echo '<br>' ;
    //                         print_r($request_value) ;
    //                         echo '<br>' ;
    //                         false ;
    //                   }
    //                 };
    //             };


	// 			function regExMix($request_value){
	// 				if ( isset($request_value) && !empty($request_value)){
		
	// 					if(preg_match_all('/[a-zA-Z0-9.-]*/',$request_value)) {
	// 						echo 'La requete Pas de match: '.$request_value ;
	// 						echo '<br>' ;
	// 						print_r($request_value) ;
	// 						echo '<br>' ;
	// 						return $request_value;
	// 					  }
	// 					  else {
	// 							echo '<br>' ;
	// 							print_r($request_value) ;
	// 							echo '<br>' ;
	// 							false ;
	// 					  }
	// 					};
	// 				};
    


    //     if ( isset( $_POST['submit'])){
    //         $username = ifInputIsTexte(sanitize_user( $_POST['username'])) ;

    //         $password= ifInputIsTexte($_POST['category']) ;
    //         $email= ifInputIsNumber($_POST['email']);

    //         $lastname = ifInputIsTexte($_POST['lastname']);
    //         $firstname = ifInputIsTexte($_POST['firstname']) ;
    //         $nickname = ifInputIsTexte($_POST['nickname']) ;


	// 		$country = ifInputIsTexte($_POST['country']);
    //         $adress = ifInputIsTexte($_POST['adress']) ;
    //         $zip_code = ifInputIsNumber($_POST['zip-code']) ;

	// 		$city = ifInputIsTexte($_POST['city']) ;
    //         $bio = ifInputIsTexte($_POST['bio']) ;
			

    
    //     }
  
	// 	$now = new DateTime(); 
	// 	$datesent = $now->format('Y-m-d H:i:s'); 



	// 	// Data sent to $_POST
    //     $user_data = [
    //         'user_login' => $username,
    //         'user_pass'  => $password,
    //         'user_email' => $email,
    //         'first_name' => $firstname,
    //         'last_name'  => $lastname,
    //         'nickname'   => $nickname,
	// 		'description'=> $bio,
	// 		'user_registered' => $datesent,
	// 		'role' => 'Modérateur',
    //     ];
	// 	// $user_id = wp_insert_user( $user_data ) ;
    //     $user_id = wp_update_user( $user_data ) ;

	// 	if( ! $username == ""  && ! $password == ""  && ! $username == ""  && ! $email == ""  && ! $firstname == ""  && ! $lastname == ""  && ! $username == "" ){
	// 			if( ! is_wp_error( $user_id ) ){
	// 				return true;
	// 			}
	// 			else {
	// 				return $user_id->get_error_message();
	// 			}
	// 	} 
    // }



    // $username = $_POST['username'] ;

    // $password= $_POST['password'] ;
    // $email= $_POST['email'];

    // $lastname = $_POST['lastname'];
    // $firstname = $_POST['firstname'] ;
    // $nickname = $_POST['nickname'] ;


    // $country = $_POST['country'];
    // $adress = $_POST['adress'] ;
    // $zip_code = $_POST['zip-code'] ;

    // $city = $_POST['city'] ;
    // $bio = $_POST['bio'];
    // $now = new DateTime(); 
	// $datesent = $now->format('Y-m-d H:i:s'); 

    // $user_data = [
    //     'user_login' => $username,
    //     'user_pass'  => $password,
    //     'user_email' => $email,
    //     'first_name' => $firstname,
    //     'last_name'  => $lastname,
    //     'nickname'   => $nickname,
    //     'description'=> $bio,
    //     'user_registered' => $datesent,
    //     'role' => 'Modérateur',
    // ];
    // $user_id = wp_insert_user( $user_data ) ;

    




// $now = new DateTime(); 
// $datesent = $now->format('Y-m-d H:i:s'); 










?>

<div class="primary">
    <div class="container form-register">
        
            <h3 id="register"> Inscription</h3>  
            <form  method="post" action="">
            
                <div class="div-form">
                    <label for="username">Nom utilisateur <strong>*</strong>:</label>
                    <input type="text" name="username"   required>
                </div>
                     
                <div class="div-form">
                    <label for="password">Mot de passe <strong>*</strong>:</label>
                    <input type="password" name="password"  required>
                </div>
                 
                     
                <div class="div-form">
                    <label for="password2">Confirmez votre mot de passe <strong>*</strong>:</label>
                    <input type="password" name="password2"  required>
                </div>
                 
                <div class="div-form">
                    <label for="email">Email <strong>*</strong>:</label>
                    <input type="text" name="email"   required>
                </div>
                
                <hr>
                
                <div class="div-form">   
                    <label for="website">Nom de famille <strong>*</strong>:</label>
                    <input type="text" name="lastname"   required>
                </div>
                
                <div class="div-form">
                    <label for="firstname">Prénom <strong>*</strong>:</label>
                    <input type="text" name="firstname"    required>
                </div>
                
                <div class="div-form">
                    <label for="nickname">Surnom :</label>
                    <input type="text" name="nickname"   >
                </div>
                
                <hr>
                
                <div class="div-form">
                    <label for="country">Pays<strong>*</strong> : </label>
                    <input type="text" name="country"  required>
                </div>
                
                <div class="div-form">
                    <label for="adress"> Adresse <strong>*</strong>:</label>
                    <input type="text" name="adress"  required>
                </div>
                
                <div class="div-form">
                    <label for="zip-code">Code postal <strong>*</strong>:</label>
                    <input type="text" name="zip-code"  required>
                </div>
                
                <div class="div-form">
                    <label for="city">Ville <strong>*</strong>:</label>
                    <input type="text" name="city"  required>
                </div>
                
                <div class="div-form">
                    <label for="bio">Biographie :</label>
                    <textarea id="story" name="bio" rows="10" cols="33" placeholder="parlez nous un peu de vous">  </textarea>
                </div>
                
                <input type="submit" name="submit-register" value="S'inscrire "/>
                
                
            </form>
    </div>
</div>

<?php get_footer() ?>