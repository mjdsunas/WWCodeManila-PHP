<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->model('ItemModel');
            $this->load->library('form_validation');
    }

    public function fileupload(){
        $this->load->view('fileupload');

    }

    public function do_upload(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = TRUE;
        $config['max_size']             = 3000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->diedump($error);
        }
        else
        {
            $filedata = $this->upload->data();
            $filename = $filedata['file_name'];
            $this->load->library('image_lib');
            $config2['image_library'] = 'gd2';
            $config2['source_image'] = './uploads/'.$filename;
            $config2['new_image'] = './uploads_thumb';
            $config2['create_thumb'] = FALSE;
            $config2['maintain_ratio'] = TRUE;
            $config2['width']         = 150;
            $config2['height']       = 100;
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
                echo 'success';
        }
    }

    public function index(){
        $msg = "From Controller Message";
        $offset = $this->uri->segment(3);
        $noofitems = 5;
        $items = $this->ItemModel->getItems($offset, $noofitems);
        $this->load->library('pagination');
        $config['base_url'] = base_url().'item/index';
        $config['total_rows'] = $this->ItemModel->countRecords();
        $config['per_page'] = $noofitems;
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();

        $this->load->view('include/header');
        $this->load->view('include/mainnav');
        $this->load->view('item/index',compact('msg','items','links'));
        $this->load->view('include/footer');
    }

    public function diedump($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }

    public function view($id){
        $item = $this->ItemModel->getItem($id);
        $this->load->view('include/header');
        $this->load->view('include/mainnav');
        $this->load->view('item/view', compact('item'));
        $this->load->view('include/footer');

    }

    public function edit($id){
        $item = $this->ItemModel->getItem($id);
        $this->load->view('include/header');
        $this->load->view('include/mainnav');
        $this->load->view('item/edit', compact('item'));
        $this->load->view('include/footer');

    }

    public function delete($id){
        $item = $this->ItemModel->getItem($id);
        $this->load->view('include/header');
        $this->load->view('include/mainnav');
        $this->load->view('item/delete', compact('item'));
        $this->load->view('include/footer');

    }


    public function add(){
        $this->load->view('include/header');
        $this->load->view('include/mainnav');
        $this->load->view('item/add');
        $this->load->view('include/footer');

    }

    public function destroy($id){
        $this->ItemModel->destroy($id);
        redirect('item/index');

    }

    public function insert(){
        
        $this->form_validation->set_rules('name','Item Name','required|is_unique[tblitem.name]');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('price','Price','required|numeric');
        if($this->form_validation->run() == FALSE){
            $this->add();
        }else{
            $data = $this->input->post();
            unset($data['button']);
            $this->ItemModel->insert($data);
            redirect('item/index');
        }
        
    }

    public function name_check($str)
    {
            if (!preg_match('/^(\d{2}-){3}\d{2}$/',$str))
            {
                    $this->form_validation->set_message('name_check', 'Ang nilagay mong pangalan na {field} ay bawal');
                    return FALSE;
            }
            else
            {
                    return TRUE;
            }
    }


    public function update(){

        $data = $this->input->post();
        $id = $this->input->post('id');
        unset($data['button']);
        $this->form_validation->set_rules('name','Item Name','required|callback_check_file');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('price','Price','required|numeric');
        if($this->form_validation->run() == FALSE){
            $this->edit($id);
        }else{
            $filedata = $this->upload->data();
            $filename = $filedata['file_name'];
            $this->load->library('image_lib');
            $config2['image_library'] = 'gd2';
            $config2['source_image'] = './uploads/'.$filename;
            $config2['new_image'] = './uploads_thumb';
            $config2['create_thumb'] = FALSE;
            $config2['maintain_ratio'] = TRUE;
            $config2['width']         = 75;
            $config2['height']       = 50;
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
            $filedata = $this->upload->data();
            $data['image'] = $filename;
            unset($data['button']);
            $this->ItemModel->update($id,$data);
            redirect('item/index');
        }
    }

    public function check_file(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = TRUE;
        $config['max_size']             = 1000;
        $config['max_width']            = 2048;
        $config['max_height']           = 1500;
        $config['file_name']            = $this->input->post('id');
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = $this->upload->display_errors();
                $this->form_validation->set_message('check_file', $error);
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }


    public function test($id){
        echo $this->uri->segment(3);
    }

    public function itemlist(){
        
        $noofrecords = $this->ItemModel->countRecords();
        $items = $this->ItemModel->getItems(0, $noofrecords);
        $this->load->view('include/header');
        $this->load->view('include/mainnav');
        $this->load->view('item/itemlist',compact('items'));
        $this->load->view('include/footer');
        
    }

    public function report(){
        $noofrecords = $this->ItemModel->countRecords();
        $items = $this->ItemModel->getItems(0, $noofrecords);
        $report = array();
        $str = "['ITEM', 'QUANTITY'],";
        foreach($items as $item){ 
             $str .= "['$item->name',$item->quantity],";
        }
        $str = substr($str,0,strlen($str)-1);

        $this->load->view('include/top');
        $this->load->view('include/headertop',compact('str'));
        $this->load->view('include/mainnav');
        $this->load->view('item/report');
        $this->load->view('include/footer');
    }


}
