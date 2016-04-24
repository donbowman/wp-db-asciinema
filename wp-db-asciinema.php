<?php

/*
   Copyright 2016 Don Bowman

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/

defined( 'ABSPATH' ) or die( 'abspath only' );

wp_register_style( 'asciinema', '/wp-content/plugins/wp-db-asciinema/asciinema-player.css' );
wp_enqueue_style('asciinema');
wp_register_script( 'asciinema', '/wp-content/plugins/wp-db-asciinema/asciinema-player.js' );
wp_enqueue_script( 'asciinema');

/*
Plugin Name:    octo-blog asciinema shortcode
Description:    A shortcode plugin to embed videos created by asciinema
Plugin URI:     https://github.com/donbowman/wp-db-asciinema
Version:        0.1
Author:         Don Bowman
Author URI:     https://github.com/donbowman
License:        Apache 2
License URI:    https://www.gnu.org/licenses/gpl-2.0.html
*/

function asciinema_video( $atts ) {
    // Attributes
    extract( shortcode_atts(
        array(
            'video' => '/wp-uploads/',
            'theme' => 'asciinema',
            'title' => '',
            'autoplay' => false,
            'time' => '0',
            'loop' => false,
            'speed' => 1
        ), $atts )
    );

    $apt = ($autoplay) ? 'true' : 'false';
    $loopt = ($loop) ? 'true' : 'false';

    $vs = '<div id="player-container"></div>' . "\n";
    $vs .= "<script>asciinema.player.js.CreatePlayer('player-container', '" . $video . "', {";
    $vs .= "speed: "    . $speed . ",\n";
    $vs .= "theme: '"   . $theme . "',\n";
    $vs .= "title: '"   . $title . "',\n";
    $vs .= "autoPlay: " . $apt . ",\n";
    $vs .= "time: "     . $time . ",\n";
    $vs .= "loop: "     . $loopt . "}\n";
    $vs .= ");\n</script>";

    return $vs;
}
add_shortcode( 'asciinema', 'asciinema_video' );

function asciinema_mime($mime_types) {
  $mime_types['json'] = 'application/json';
  return $mime_types;
}
add_filter('upload_mimes', 'asciinema_mime', 1, 1);
