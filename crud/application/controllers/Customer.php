<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller {

    public function order(){
        $this->load->library('cart');
        $this->load->model('ItemModel');
        $items = $this->ItemModel->getAllItems();
        $this->load->view('include/header');
        $this->load->view('include/mainnav');
        $this->load->view('customer/order',compact('items'));
        $this->load->view('include/footer');
    }

    public function additemtocart(){
        $this->load->library('cart');
        $this->load->model('ItemModel');
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $item = $this->ItemModel->getItem($id);
        $data = array(
            'id'      => $item->id,
            'qty'     => $qty,
            'price'   => $item->price,
            'name'    => $item->name,
            'image'   => $item->image
        );
        $this->cart->insert($data);
        $this->load_cart();
    }

    public function load_cart(){
        $this->load->view('customer/load_cart');
    }

    public function updateitemcart(){
        $this->load->library('cart');
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty'   => $this->input->post('qty'),
        );
        $this->cart->update($data);
        $this->load_cart();

    }

    public function removeitemcart(){
        $id = $this->input->post('id');
        $this->load->library('cart');
        $this->cart->remove($id);
        $this->load_cart();
    }


}
