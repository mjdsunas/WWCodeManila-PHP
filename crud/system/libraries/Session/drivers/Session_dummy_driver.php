<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CI_Session_dummy_driver extends CI_Session_driver implements SessionHandlerInterface
{

        public function __construct(&$params)
        {
                // DO NOT forget this
                parent::__construct($params);

                // Configuration & other initializations
        }

        public function open($save_path, $name)
        {
                // Initialize storage mechanism (connection)
                return true;
        }

        public function read($session_id)
        {
                // Read session data (if exists), acquire locks
                return true;
        }

        public function write($session_id, $session_data)
        {
                // Create / update session data (it might not exist!)
                return true;
        }

        public function close()
        {
                // Free locks, close connections / streams / etc.
                return true;
        }

        public function destroy($session_id)
        {
                echo 'wahaha';
                return true;
                // Call close() method & destroy data for current session (order may differ)
        }

        public function gc($maxlifetime)
        {
                // Erase data for expired sessions
                return true;
        }

}
