<?php
Class Vendors_model extends CI_Model
{
    private $primary_key = 'id';
	private $table_name = 'vendors';
    
	function save($Vendor){
		$this->db->insert($this->table_name,$Vendor);
		$insert_id=$this->db->insert_id();
		return $insert_id;
		//die;
	}
	
	function get_info($tb_name){
		return $this->db->get($tb_name);
	}

	function get_by_id($id){
		$this->db->where($this->primary_key,$id);
		return $this->db->get($this->table_name);
	}
	
	function get_by_field($field,$id,$tb_name){
		$this->db->where($field,$id);
		return $this->db->get($tb_name);
	}

	function get_buyer_det($buyer_id)
	{
		$this->db->where('id',$buyer_id);
		return $this->db->get('buyers');
	}
	
	function update_ven_det($email,$det)
	{
		$this->db->where('email',$email);
		$this->db->update($this->table_name,$det);
	}
	
	 function login($email, $password)
	 {
//	   $this -> db -> select('id, username, password');
	   $this -> db -> from($this->table_name);
	   $this -> db -> where('email', $email);
	   $this -> db -> where('password', MD5($password));
	   $this -> db -> where('status', '1');
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	 }
	 
	 
	function get_all_vendors(){
		$this->db->order_by('reg_date','desc');
		//$this -> db -> where('status!=', '2');
		//$this -> db -> where('status!=', '3');
		return $this->db->get($this->table_name);
	}

	function count_all_vendors(){
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}

	function count_all_products(){
		$this->db->from('products_details');
		return $this->db->count_all_results();
	}

	function get_search_vendors($vendor)
	{
		$this->db->order_by('reg_date','desc');
		$this ->db->like('status', '1');
		$this ->db->like('vendor_name', $vendor);
		$this ->db->or_like('email',$vendor);
		$this ->db->or_like('business_name',$vendor);
		$this ->db->or_like('mobile',$vendor);
		$this ->db->or_like('brand',$vendor);
		$this ->db->or_like('tin',$vendor);
		$this ->db->or_like('pan',$vendor);
		return $this->db->get($this->table_name);
	}
	function get_all_vendors1(){
		$this->db->order_by('reg_date','desc');
		$this -> db -> where('status', '1');		
		return $this->db->get($this->table_name);
	}
	
	function get_new_vendors(){
		$this->db->order_by('reg_date','desc');
		$this->db-> where('status', '2');
		return $this->db->get($this->table_name);
	}
	function get_pending_orders($id)
	{
		$this->db->where('vendor_id', $id);
		$this->db->where('status', '1');
		$this->db->order_by('updated_on','desc');
		return $this->db->get('order_details');
	}
	function get_delivered_orders($id)
	{
		$this->db->where('vendor_id', $id);
		$this->db->where('status', '2');
		$this->db->order_by('updated_on','desc');
		return $this->db->get('order_details');
	}
	function deliver_status($order_id)
	{
		$today = date('Y-m-d H:i:s');
		$det = array('status' => 2,'delivered_on' => $today);
		$this->db->where('id', $order_id);
		$this->db->update('order_details', $det);
	}
	function get_orders($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('order_details');
	}
	function get_orders1($id)
	{
		$this->db->where('id',$id);
		$this->db->order_by('updated_on','desc');
		return $this->db->get('order_details');
	}
	function add_product($insert_data)
	{		
		$this->db->insert('products_details',$insert_data);
		return $this->db->insert_id();
	}
	function add_images($image_data)
	{
		$this->db->insert('products_images',$image_data);
		return $this->db->insert_id();
	}
	function delete_images($product_id)
	{
		$this->db->where('product_id',$product_id);
		$this->db->delete('products_images');
	}
	function get_images($product_id)
	{
		$this->db->where('product_id',$product_id);
		return $this->db->get('products_images');
	}
	function add_price($insert_data)
	{
		$this->db->insert('product_prices',$insert_data);
		return $this->db->insert_id();
	}
	function delete_prices_product($product_id)
	{
		$this->db->where('product_id',$product_id);
		$this->db->delete('product_prices');
	}
	function get_prices($product_id)
	{
		$this->db->where('product_id',$product_id);
		return $this->db->get('product_prices');
	}
	function get_price($price_id)
	{
		$this->db->where('id',$price_id);
		return $this->db->get('product_prices');
	}
	function get_size($id)
	{
		       $this->db->where('id',$id);
		return $this->db->get('product_size');
	}
	function delete_price($id)
	{
	   $this->db->where('id',$id);
       $this->db->delete('product_prices');
	}
	function get_product($product_id)
	{
		       $this->db->where('id',$product_id);
		return $this->db->get('products_details');
	}
	function get_productss($product_id)
	{
		$this->db->where('id',$product_id);
		return $this->db->get('products_details');
	}
	
	function get_productid($product_id)
	{ 
		       $this->db->where('id',$product_id);
		return $this->db->get('products_cart');
	}
	
	function products_vendor($vendor_id)
	{
		$this->db->where('vendor_id',$vendor_id);
		$this->db->where('status','1');
		return $this->db->get('products_details');
	}
	function delete_product($product_id)
	{
		 $this->db->where('id',$product_id);
		 $this->db->delete('products_details');
	}
	function get_products_all()
	{
		$this->db->where('status','1');
		return $this->db->get('products_details');
	}
	function get_products_new()
	{
		$this->db->where('status =','2');
		return $this->db->get('products_details');
	}
	function get_latest_products()
	{
		$this->db->where('status =','2');
		$this->db->limit('10');
		return $this->db->get('products_details');
	}
	function get_latest_vendors()
	{
		$this->db->where('status =','2');
		$this->db->limit('10');
		return $this->db->get($this->table_name);
	}
	function get_products_rejected()
	{
		$this->db->where('status =','0');
		return $this->db->get('products_details');
	}
	function update_product($insert_data,$product_id)
	{
		       $this->db->where('id',$product_id);
		return $this->db->update('products_details',$insert_data);
	}
	function update_price($insert_data,$price_id)
	{		
		       $this->db->where('id',$price_id);
		return $this->db->update('product_prices',$insert_data);
	}	
	function get_rejected_vendors(){
		       $this->db->order_by('reg_date','desc');
		       $this -> db -> where('status', '3');
		return $this->db->get($this->table_name);
	}
	
	function update_vendor($id,$Vendor){
		$this->db->where($this->primary_key,$id);
		$this->db->update($this->table_name,$Vendor);
	}
	
	function get_by_email($email){
		       $this->db->where('email',$email);
		return $this->db->get($this->table_name);
	}

	function get_products_by_id($id)
	{
		       $this->db->where('vendor_id',$id);
		return $this->db->get('products_details');
	}

	function get_products_by_id1($id)
	{
		$this->db->where('vendor_id',$id);
		$this->db->limit(10);
		return $this->db->get('products_details');
	}
	
	function check_user($mobile,$email)
	{
		$this->db->where('mobile',$mobile);
		$this->db->or_where('email',$email);
		return $this->db->get($this->table_name);
	}
	
	function get_latest_product(){
		$this->db->where('status','1');
		$this->db->limit(10);
		$this->db->order_by('id','ASC');
		return $this->db->get('products_details');
	}

	function get_recent_orders($id)
	{
		$this->db->where('vendor_id', $id);
		// $this->db->where('status', '1');
		$this->db->limit(10);
		$this->db->order_by('updated_on','desc');
		return $this->db->get('order_details');
	}
	
	function change_password($password_details,$current_password, $email){
		$this->db->where('email',$email);
		$this->db->where('password',md5($current_password));
		$this->db->update($this->table_name,$password_details);
		return $this->db->affected_rows();
	}
function UpdateP_price($product_id){
$updatePrice=$this->input->post('price');
   $query=$this->db->query("UPDATE products_details
   SET price= '$updatePrice'
   WHERE id= $product_id;");
 
}

function addUpdate_images($product_id,$img){
$updatePrice=$this->input->post('price');
   $query=$this->db->query("UPDATE products_details
   SET image_name= '$img'
   WHERE id= $product_id;");
 
}

	function get_vendors_dropdown(){
      $result=$this->db->get('vendors');
      $return['']='All Vendors';
      if($result->num_rows() >0){
        foreach($result->result_array() as $result1){
          $return[$result1['id']]=$result1['vendor_name'];
        }
      }
      return $return;
   }

  
	
	
}
?>