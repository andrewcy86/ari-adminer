<?php
namespace Ari_Adminer\Controllers\Connections;

use Ari\Controllers\Controller as Controller;
use Ari\Utils\Response as Response;
use Ari_Adminer\Helpers\Helper as Helper;

class Reset_Default extends Controller {
    public function execute() {
        $model = $this->model();

        $params = array(
            'page' => 'ari-adminer-connections',

            'filter' => $model->encoded_filter_state(),
        );

        $result = false;
        if ( Helper::has_access_to_adminer() ) {
            $result = Helper::set_default_connection( 0 );
        }

        if ( $result ) {
            $params['msg_type'] = ARIADMINER_MESSAGETYPE_SUCCESS;
            $params['msg'] = __( 'Connection to WordPress database is set as default connection', 'ari-adminer' );
        } else {
            $params['msg_type'] = ARIADMINER_MESSAGETYPE_WARNING;
            $params['msg'] = __( 'Connection could not be reset', 'ari-adminer' );
        }

        Response::redirect(
            Helper::build_url(
                $params
            )
        );
    }
}
