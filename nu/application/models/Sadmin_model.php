<?php

Class Sadmin_model extends CI_Model

{

 function login($username, $password)

 {

//   $this -> db -> select('id, username, password');

   $this -> db -> from('sadmin');

   $this -> db -> where('username', $username);

   $this -> db -> where('password', MD5($password));   

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

 function insert_det($det,$tb_name){

 	$this->db->insert($tb_name,$det);

 	return $this->db->insert_id();

 }

 function get_info($tb_name){

 	return $this->db->get($tb_name);

 }

 function get_by_id($id,$tb_name){

 	$this->db->where('id',$id);

 	return $this->db->get($tb_name);

 }

 function update_det($id,$det,$tb_name){

 	$this->db->where('id',$id);

 	$this->db->update($tb_name,$det);

 }

 function delete_det($id,$tb_name){

 	$this->db->where('id',$id);

 	$this->db->delete($tb_name);

 }

 function get_request1($utype)

 {

	$this->db->where('user_type', $utype);

	$this->db->where('status','1');

	return $this->db->get('request_details');

 }

 function updated_status($det,$id)

 {

	 $this->db->where('id',$id);

	 $this->db->update('request_details',$det);

 }

 function updated_det($det,$id,$tb_name)

 {

	 $this->db->where('id',$id);

	 $this->db->update($tb_name,$det);

 }

 function categories_list()

 {

        $this->db->from('categories');

		

		$this->db->order_by('id');

		$result = $this->db->get();

		$return = array();

		$return[''] = '--Select Category--';

		$return['0'] = '--No Parent Category--';

		if($result->num_rows() > 0) {

		  foreach($result->result_array() as $row) {

			$return[$row['id']] = $row['category_name'];

		  }

		}

	    return $return;

 }

function categories_list1()

 {

        $this->db->from('categories');

		$this->db->where('parent_category_id','0');

		$this->db->order_by('id');

		$result = $this->db->get();

		$return = array();

		$return[''] = '--Select Category--';

		

		if($result->num_rows() > 0) {

		  foreach($result->result_array() as $row) {

			$return[$row['id']] = $row['category_name'];

		  }

		}

	    return $return;

 }

 function get_sub_category($category_id)

 {

 	    $this->db->from('categories');

		$this->db->where('parent_category_id',$category_id);

		$this->db->order_by('id');

		$result = $this->db->get();

		$return = array();

		$return[''] = '--Select Sub Category--';

		

		if($result->num_rows() > 0) {

		  foreach($result->result_array() as $row) {

			$return[$row['id']] = $row['category_name'];

		  }

		}

	    return $return;

 	

 }

 function get_sizes_list($category_id)

 {

 	    $this->db->from('product_size');

		$this->db->where('category_id',$category_id);

		$this->db->order_by('id');

		$result = $this->db->get();

		$return = array();

		$return[''] = '--Select Size--';

		

		if($result->num_rows() > 0) {

		  foreach($result->result_array() as $row) {

			$return[$row['id']] = $row['sizes'];

		  }

		}

	    return $return;

 	

 }

 function add_category($insert_data)

 {

 	

 	$this->db->insert('categories',$insert_data);

 }

 function get_categories()

 {

 	       $this->db->select('*');

 	       $this->db->order_by('category_name','asc');

 	return $this->db->get('categories');

 }
 
 function get_categoriesfromhome($id)

 {

 	       $this->db->select('*');
		   $this->db->where('parent_category_id',$id);

 	       $this->db->order_by('category_name','asc');

 	return $this->db->get('categories');

 }

 function get_category($id)

 {    

 	$this->db->where('id',$id); 	

 	$this->db->order_by('category_name','asc');

 	return $this->db->get('categories');

 	

 }
 
  
 
 function get_subcategory($id)

 {    

 	$this->db->where('parent_category_id',$id); 	

 	$this->db->order_by('category_name','asc');

 	return $this->db->get('categories');

 	

 }


 function sameproduct($brand)

 {    
     
 	$this->db->where('brand_name',$brand);
 	
 	$this->db->where('status','1');

 	$this->db->order_by('brand_name','asc');

 	$query = $this->db->get('products_details');

 	 return $result = $query->result();

 }

 function get_category1($id)

 {

 	$this->db->where('parent_category_id',$id); 	

 	$this->db->order_by('category_name','asc');

 	return $this->db->get('categories');

 	

 }

 function get_sizes_list1($id)

 {

 	       $this->db->where('category_id',$id); 	

 	return $this->db->get('product_size');

 }

function get_sizes_list12($id)

 {
       
 	  $this->db->where('id',$id); 	

 	return $this->db->get('product_size');

 }

 function delete_sizes($category_id)

 {

 	$this->db->where('category_id',$category_id); 	

 	$this->db->delete('product_size');

 }

 function update_category($insert_data,$id)

 {

 	$this->db->where('id',$id);

 	$this->db->update('categories',$insert_data);

 	

 }

 function delete_category($id)

 {

 	$this->db->where('id',$id);

 	$this->db->delete('categories');

 }

 function add_sizes($insert_data)

 {

 	$this->db->insert('product_size',$insert_data);

 }

 function get_sub_list($id)

 {

 	

 	$this->db->from('categories');

 	$this->db->where('parent_category_id',$id);

 	$this->db->order_by('updated_on','asc');

 	return $this->db->get();


 }

 function search_orders($vendor_id, $buyer_id, $order_status){
 	if($vendor_id){
 		$this->db->where('vendor_id',$vendor_id);
 	}
 	if($buyer_id){
 		$this->db->where('buyer_id',$buyer_id);
 	}
 	if($order_status){
 		$this->db->where('status',$order_status);
 	}
 	$this->db->order_by('updated_on','desc');
	return $this->db->get('order_details');
 }
 
 
 function super_category($supercateId){
	  $query = $this->db->query("SELECT * FROM categories WHERE id=$supercateId limit 12");
	 return $query->row();
 }

  function subscription(){
	 
	  $this->db->select('*');

 	       $this->db->order_by('subscribed_id','desc');

 	return $this->db->get('subscribe_leads');
 }
 function contactform(){
	 
	  $this->db->select('*');

 	       $this->db->order_by('contact_form_id','desc');

 	return $this->db->get('contact_form_leads');
 }

}

?>