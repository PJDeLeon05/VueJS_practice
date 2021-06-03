<?php
/*
*   Plugin Name: WP Vue JS Implementation
*   Description: A simple plugin that implements vue js in wordpress and have samples using them
*   Version: 1.0.0
*   Textdomain: wp_vueJS-plugin
*   Author: Patrick James O. De Leon
*/
// Enable or Disable Auto Adding of Vue Script
if ( isset( $_POST[ 'wpVue_save' ] ) ) {
  $txtFile = fopen( plugin_dir_path( __FILE__ ) . '/autoAdd.txt', "w" ) or die( "Can't Access File" );
  if ( isset( $_POST[ 'vue_switch' ] ) ) {
    fwrite( $txtFile, "1" );
  }
  else {
    fwrite( $txtFile, "0" );
  }
  fclose( $txtFile );
}

// Adding Plugin Menu in Admin Dashboard
if ( !function_exists( 'wpVueJS_menu' ) ) {
  function wpVueJS_menu() {
    add_menu_page( 'WP VueJS Implementation', 'WP Vue JS', 'manage_options',
                    'wp-vueJS', 'wp_vueJS_toggle' );
  }
}

add_action( 'admin_menu', 'wpVueJS_menu' );

// Function that will be called when adding the plugin menu ( 4th Parameter of add_menu_page)
if ( !function_exists( 'wp_vueJS_toggle' ) ) {
  function wp_vueJS_toggle() {
    $txtFile = fopen( plugin_dir_path( __FILE__ ) . '/autoAdd.txt', "r" ) or die( "Can't Access File" );
    $autoAddVueJS = fgets( $txtFile );
    fclose($txtFile);
    wp_enqueue_style( 'wp_vueJS_menuStyle', plugins_url( '/menu_style.css', __FILE__ ) );
    wp_enqueue_script( 'wp_vueJS_menuScript', plugins_url( '/menu_script.js', __FILE__ ) );
    $html = '<h1>Welcome to this simple WP Vue JS Implementation Plugin</h1>'
          . '<form action="" method="post"><div id="vue-mainDiv"><div id="col1"><p>Manually Implement Vue JS using Shortcode "wp_vueJS"</p></div>';
    if ( $autoAddVueJS == 1 ) {
      $html .= '<div id="col2"><label class="toggleSwitch"><input name="vue_switch" value="yes" type="checkbox" checked><span class="toggleSlider"></span></label></div>';
    }
    else {
      $html .= '<div id="col2"><label class="toggleSwitch"><input name="vue_switch" value="yes" type="checkbox"><span class="toggleSlider"></span></label></div>';
    }
    $html .= '<div id="col3"><p>Auto implement Vue JS</p></div></div>'
           . '<div id="wp_vueJS_save"><input id="wp_vueJS_toggleSave" type="submit" value="SAVE" name="wpVue_save"></div></form>';
    echo $html;
  }
}

// Always add Vue JS script
if ( !function_exists( 'autoAdd_vueJS' ) ) {
  function autoAdd_vueJS() {
    $txtFile = fopen( plugin_dir_path( __FILE__ ) . '/autoAdd.txt', "r" ) or die( "Can't Access File" );
    $autoAddVueJS = fgets( $txtFile );
    fclose($txtFile);
    if ( $autoAddVueJS == 1 ) {
      echo '<script>console.log("Auto Added Vue JS Library.");</script>';
      wp_enqueue_script( 'wp_autoVueJS', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' );
    }
  }
}

add_action( 'wp_enqueue_scripts', 'autoAdd_vueJS' );

// Adding Vue JS Script via shortcode
//Registering Vue JS Script for use later
if ( !function_exists( 'reg_vueJS' ) ) {
  function reg_vueJS() {
    $txtFile = fopen( plugin_dir_path( __FILE__ ) . '/autoAdd.txt', "r" ) or die( "Can't Access File" );
    $autoAddVueJS = fgets( $txtFile );
    fclose($txtFile);
    if ( $autoAddVueJS == 0 ) {
      wp_register_script( 'wp_vueJS', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' );
    }
  }
}

add_action( 'wp_enqueue_scripts', 'reg_vueJS' );

// VUE JS Library can only be accessed when this shortcode is attached
if ( !function_exists( 'addViaSC_vueJS' ) ) {
  function addViaSC_vueJS() {
    $txtFile = fopen( plugin_dir_path( __FILE__ ) . '/autoAdd.txt', "r" ) or die( "Can't Access File" );
    $autoAddVueJS = fgets( $txtFile );
    fclose($txtFile);
    if ( $autoAddVueJS == 0 ) {
      echo '<script>console.log("Manually Added Vue JS Library");</script>';
      wp_enqueue_script( 'wp_vueJS' );
    }
  }
}

add_shortcode( 'wp_vueJS', 'addViaSC_vueJS' );
