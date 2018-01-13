<?php


class model_produk extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		function data($number,$offset){
		return $query = $this->db->get('produk',$number,$offset)->result();		
	}
		function mproduk(){
			$query=$this->db->query("select * from produk order by id_produk asc");
			return $query;
		}
		function depanv(){
			$query=$this->db->query("select * from produk order by id_produk asc limit 9");
			return $query;
		}
		function pilih_id($id){
			$query=$this->db->query("select * from produk where id_produk='$id' ");
			return $query;
		}
		function update_produk($id, $data){
		$this->db->where('id_produk', $id);
		$this->db->update('produk', $data);
		}
		
		function delete_produk($id){
			$this->db->where('id_produk', $id);
			$this->db->delete('produk');
		}
		function model_login($username,$password){
			
			$query=$this->db->query("select * from tbl_admin where username='$username' AND password='$password'");
			return $query;

		}
		
	
	
}
?>