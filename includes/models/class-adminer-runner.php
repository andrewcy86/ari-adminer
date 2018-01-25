<?php
namespace Ari_Adminer\Models;

use Ari\Models\Model as Model;
use Ari_Adminer\Models\Connections as Connections_Model;
use Ari_Adminer\Models\Connection as Connection_Model;
use Ari_Adminer\Helpers\Helper as Helper;

class Adminer_Runner extends Model {
    public function data() {
        $connections_model = new Connections_Model(
            array(
                'class_prefix' => $this->options->class_prefix,

                'disable_state_load' => true,
            )
        );

        $connections = $connections_model->items();

        $default_connection_id = Helper::get_default_connection();
        if ( $default_connection_id > 0 ) {
            $connection_model = new Connection_Model(
                array(
                    'class_prefix' => $this->options->class_prefix,

                    'disable_state_load' => true,
                )
            );

            $default_connection = $connection_model->get_connection( $default_connection_id );
            if ( false === $default_connection ) {
                $default_connection_id = 0;
            }
        }

        $data = array(
            'connections' => $connections,

            'default_connection_id' => $default_connection_id,
        );

        return $data;
    }
}
