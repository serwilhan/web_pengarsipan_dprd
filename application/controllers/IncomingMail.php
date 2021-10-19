<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IncomingMail extends CI_Controller {

    public function index() {
        $this->load->view('dashboard/mail');
    }
}
