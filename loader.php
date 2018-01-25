<?php
defined( 'ABSPATH' ) or die( 'Access forbidden!' );

if ( ! function_exists( 'ari_adminer_init' ) ) {
    function ari_adminer_init() {
        if ( defined( 'ARIADMINER_INITED' ) )
            return ;

        define( 'ARIADMINER_INITED', true );

        require_once ARIADMINER_PATH . 'includes/defines.php';
        require_once ARIADMINER_PATH . 'libraries/arisoft/loader.php';

        Ari_Loader::register_prefix( 'Ari_Adminer', ARIADMINER_PATH . 'includes' );

        $plugin = new \Ari_Adminer\Plugin(
            array(
                'class_prefix' => 'Ari_Adminer',

                'version' => ARIADMINER_VERSION,

                'path' => ARIADMINER_PATH,

                'url' => ARIADMINER_URL,

                'assets_url' => ARIADMINER_ASSETS_URL,

                'view_path' => ARIADMINER_PATH . 'includes/views/',

                'main_file' => __FILE__,
            )
        );
        $plugin->init();
    }
}
