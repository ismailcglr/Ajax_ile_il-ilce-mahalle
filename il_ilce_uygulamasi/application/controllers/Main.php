<?php
class Main extends CI_Controller{
    public function index(){
        $data["il"]=$this->db->select("*")->from("il")->get()->result();
        $this->load->view("index",$data);
    }
    public function ilce(){
        header("Content-Type: application/json");
        $il_id=$this->input->post("ilId");
        $ilceler=$this->db->select("*")->from("ilce")->where("il_id",$il_id)->get()->result();
        $data["ilce"]=$ilceler;
        echo json_encode($data);
    }
    public function mahalle(){
        header("Content-Type: application/json");
        $ilce_id=$this->input->post("ilceId");
        $mahalleler=$this->db->select("*")->from("mahalle")->where("ilce_id",$ilce_id)->get()->result();
        $data["mahalle"]=$mahalleler;
        echo json_encode($data);
    }
}