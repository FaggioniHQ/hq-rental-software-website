<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link        https://dmtrmrv.com
 * @since       0.1.0
 * @package     meta boxes to api
 *
 * Plugin Name: meta boxes to api
 * Description: Adds and displays integrations for HQ.
 * Version:     0.1.1
 * Author:      Rafael Concha
 * Author URI:  
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: hq-integrations
 * Domain Path: /languages
 */


// define the delete_post callback 
// function action_delete_post( $post_ID ) { 
//      $post = get_post($post_ID);
//     if($post->post_type == 'features'){
//          try {
//              $response = wp_remote_request( 'https://api.caagcrm.com/api/new-features/'.$post_ID, array(
//             	'method'    => 'DELETE',
//             	'body' => array('id'=>post_ID))
//             	);
//             $body = $response['body'];
//             $json_decode = json_decode( $response['body'] );

//             if(isset($json_decode->success)){
//                 return;
//             }else{
//                 throw new Exception($body['errors'][0]);
//             }
//           } catch (Exception $e) {
//                  echo $e->getMessage();
//                  die();
//           }
//     }
// }; 
         
// add_action( 'delete_post', 'action_delete_post', 10, 1 ); 

function send_meta_boxes_to_api($post_ID, $post, $update ){
    
    $post = get_post($post_ID);
   
    if($post->post_type == 'features' && $post->post_status != 'auto-draft' && $post->post_status == 'publish'){
        $body = [];
        $body['id'] = $post->ID;
        $body['title'] = $post->post_title;
        $body['created_at'] = $post->post_date;
        $myvals = get_post_meta($post_ID);
        $des_text = $myvals['post_description'][0];
        $pos = array_keys(str_word_count($des_text, 2));
        $body['description'] = (str_word_count($des_text) < 20 ) == true? $des_text:  substr($des_text, 0, $pos[20]).' ...';
        
        // $body['description'] = $myvals['post_description'][0];
        
        $only_web = $myvals['only_web'][0];
        if($only_web == 'false'){
            try {
            $response = wp_remote_post('https://api.caagcrm.com/api/new-features', array('body' => $body));
            $body = $response['body'];
            $json_decode = json_decode( $response['body'] );

            if(isset($json_decode->success)){
                return;
            }else{
                throw new Exception($body['errors'][0]);
            }
          } catch (Exception $e) {
                 echo $e->getMessage();
                 die();
          }
        }
        
    }else if($post->post_type == 'features' && $post->post_status != 'auto-draft' && $post->post_status == 'trash'){
         try {
             $response = wp_remote_request( 'https://api.caagcrm.com/api/new-features/'.$post_ID, array(
            	'method'    => 'DELETE',
            	'body' => array('id'=>post_ID))
            	);
            $body = $response['body'];
            $json_decode = json_decode( $response['body'] );

            if(isset($json_decode->success)){
                return;
            }else{
                throw new Exception($body['errors'][0]);
            }
          } catch (Exception $e) {
                 echo $e->getMessage();
                 die();
          }
    }

}

add_action( 'wp_insert_post', 'send_meta_boxes_to_api', 10, 3 ); //don't forget the last argument to allow all three arguments of the function

// add_action('trash_post','my_trash_post_function',1,1);

// function my_trash_post_function($post_ID){
//     if(!did_action('trash_post')){
//       $post = get_post($post_ID);
//     if($post->post_type == 'features'){
//          try {
//              $response = wp_remote_request( 'https://api.caagcrm.com/api/new-features/'.$post_ID, array(
//             	'method'    => 'DELETE',
//             	'body' => array('id'=>post_ID))
//             	);
//             $body = $response['body'];
//             $json_decode = json_decode( $response['body'] );

//             if(isset($json_decode->success)){
//                 return;
//             }else{
//                 throw new Exception($body['errors'][0]);
//             }
//           } catch (Exception $e) {
//                  echo $e->getMessage();
//                  die();
//           }
//     }
//     }
// }
