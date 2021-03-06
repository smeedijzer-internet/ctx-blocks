<?php
/**
 * Plugin Name:     CTX-Blocks
 * Description:     Common blocks utilizing tailwindcss and alipne.js
 * Version:         0.1.0
 * Author:          Thomas Gllenia
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     ctx-blocks
 *
 * @package         create-block
 */

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';



add_action( 'init', ['Contexis\\Utils\\Assets', 'register'] );



$args = Contexis\Utils\Assets::register();

// Register custom image sizes
Contexis\Utils\ImageSizes::register();

// Add Twig functions
add_filter( 'timber/twig', ["Contexis\\Utils\\TwigExtend", "add_to_twig"] );


// Register Blocks (from old ctx-blocks)

$standard_blocks = new \Contexis\Blocks\Block($args); 
$standard_blocks->register();

$nav_block = new \Contexis\Blocks\Nav($args);
$nav_block->register();

$post_block = new \Contexis\Blocks\Posts($args);
$post_block->register();