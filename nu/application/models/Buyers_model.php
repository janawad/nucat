<?php

Class Buyers_model extends CI_Model

{

    private $primary_key = 'id';

	private $table_name = 'buyers';

    

	function save($Buyers)

	{

		$this->db->insert($this->table_name,$Buyers);

		$insert_id=$this->db->insert_id();

		return $insert_id;

	}
	function count_all_buyers(){
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}

	
	

	function get_vendor_email($vid)

	{

		$this->db->where('id',$vid);

		$this->db->select('email,vendor_name,mobile,address');

		return $this->db->get('vendors');

	}



	function product_count()

	{

		return $this->db->count_all('products_details');

	}

	

	function get_by_id($id)

	{

		$this->db->where($this->primary_key,$id);

		return $this->db->get($this->table_name);

	}

	function get_latest_buyers()
	{
		$this->db->where('status =','2');
		$this->db->limit('10');
		return $this->db->get($this->table_name);
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

	 

	 

	function get_all_buyers(){

		$this->db->order_by('reg_date','desc');

		//$this -> db -> where('status!=', '2');

		//$this -> db -> where('status!=', '3');

		return $this->db->get($this->table_name);

	}

	function get_search_buyers($vendor)

	{

		$this->db->order_by('reg_date','desc');		

		$this ->db->like('buyer_name', $vendor);

		$this ->db->or_like('email',$vendor);

		$this ->db->or_like('business_name',$vendor);

		$this ->db->or_like('mobile',$vendor);

		$this ->db->or_like('tin',$vendor);

		$this ->db->or_like('pan',$vendor);

		return $this->db->get($this->table_name);

	}

	function get_new_buyers(){

		$this->db->order_by('reg_date','desc');

		$this -> db -> where('status', '2');

		return $this->db->get($this->table_name);

	}

	

	function get_rejected_buyers(){

		$this->db->order_by('reg_date','desc');

		$this -> db -> where('status', '3');

		return $this->db->get($this->table_name);

	}

	

	function insert_det($det)

	{

		$this->db->insert('request_details',$det);

	}

	

	function update_buyer($id,$Buyer){

		$this->db->where($this->primary_key,$id);

		$this->db->update($this->table_name,$Buyer);

	}

	function all_products()
    {
		$this->db->order_by('product_id','RANDOM');
        $this->db->where('status','1');
        return $this->db->get('products_details');

	}

	
	function all_newthemeproducts(){
		$query = $this->db->query("SELECT p.id,p.category,p.brand_name, 
		ca.category_name,p.parent_category,p.image_name,p.price FROM products_details p 
		INNER JOIN categories ca ON p.category=ca.id WHERE p.status=1");
		return $query->result();
		}

	
	function product_sizes($product_id)

	{

		$this->db->where('product_id',$product_id);
       return $this->db->get('product_prices');

	}

	function product_price($size_id)

	{

		$this->db->where('id',$size_id);

		return $this->db->get('product_prices');

	}

	function get_price($id)

	{

		$this->db->where('id',$id);

		return $this->db->get('product_prices');

		

	}

   function get_images($product_id)

	{

		$this->db->where('product_id',$product_id);

		return $this->db->get('products_images');

	}

	function get_product($product_id)

	{

		$this->db->where('id',$product_id);

		return $this->db->get('products_details');

	}
	
	function get_productclr($product_id)

	{

		$this->db->where('productid',$product_id);

		return $this->db->get('products_cart');

	}
	
	function get_productclrr($product_id)

	{

		$this->db->where('id',$product_id);

		return $this->db->get('products_cart');

	}

	function add_final_cart($cart1)

	{

		$this->db->insert('products_cart_final',$cart1);

	}

	function update_cart_status($cart_id)

	{
                
		$det = array('status' => 2);
                $this->db->where('id',$cart_id);
		$this->db->update('products_cart',$det);

	}

	function get_orders($id)

	{

		$this->db->select('order_id');

		$this->db->where('buyer_id', $id);

		$this->db->order_by('updated_on','desc');

		$this->db->limit(1);

		return $this->db->get('order_details');

	}

	function get_orders1($order_id,$id)

	{

		$this->db->select('*');

		$this->db->where('buyer_id', $id);

		$this->db->where('order_id', $order_id);

		return $this->db->get('order_details');

	}

	function get_orders2($order_id,$id)

	{

		$this->db->select('*');

		$this->db->where('buyer_id', $id);

		$this->db->where('order_id', $order_id);

		$this->db->group_by('vendor_id');

		return $this->db->get('order_details');

	}

	function get_orders3($order_id,$id,$vendor_id)

	{

		$this->db->select('*');

		$this->db->where('buyer_id', $id);

		$this->db->where('vendor_id',$vendor_id);

		$this->db->where('order_id', $order_id);

		return $this->db->get('order_details');

	}

	function get_cart1($id)

	{

		$this->db->where('id', $id);

		return $this->db->get('products_cart');

	}

	function get_order_cart1($id,$cart_id)

	{

		$this->db->where('buyer_id',$id);

		$this->db->where('id', $cart_id);

		//$this->db->where('status','1');

		return $this->db->get('products_cart');

	}

	

	function add_order($cart)

	{

		$this->db->insert('order_details',$cart);

	}

	function get_user_orders($id)

	{

		$this->db->where('buyer_id', $id);

		$this->db->group_by('order_id');

		$this->db->order_by('updated_on','desc');

		$this->db->limit(5);

		return $this->db->get('order_details');

	}

	function get_user_orders1($id)

	{

		$this->db->select('order_id, count(order_id) as count, status, cart_id, buyer_id, updated_on');

		$this->db->where('buyer_id', $id);

		$this->db->group_by('order_id');

		$this->db->order_by('updated_on','desc');

		//$this->db->limit(5);

		return $this->db->get('order_details');

	}

	function get_final_cart($cart_id)

	{

		$this->db->where('cart_id',$cart_id);

		return $this->db->get('products_cart_final');

	}

	function delete_cart_final($id)

	{

		$this->db->where('id',$id);

		return $this->db->delete('products_cart_final');

	}

	function add_cart($insert_data)

	{
    
		$this->db->insert('products_cart',$insert_data);

		
		
	}

	function update_cart($insert_data,$cart_id)

	{

		$this->db->where('id',$cart_id);

		$this->db->update('products_cart',$insert_data);

	}

	function delete_cart_prodcut($id)

	{
             
		$this->db->where('id',$id);

	    $this->db->delete('products_cart');

	}

	function get_cart($id)

	{

		$this->db->where('buyer_id',$id);

		$this->db->where('status','1');

		return $this->db->get('products_cart');

	}

	function get_order_cart($id)

	{

		$this->db->where('buyer_id',$id);

		$this->db->where('status','1');

		return $this->db->get('products_cart_final');

	}

	function get_wish_list($id)

	{

		$this->db->where('buyer_id',$id);

		$this->db->where('status','0');

		return $this->db->get('products_cart');

	}

	function get_product_category($opt)

	{

		$this->db->where('category',$opt);

		$this->db->where('status','1');

		return $this->db->get('products_details');

	}
	
	function get_product_categoryyy($id,$subid)

	{

		$this->db->where('parent_category',$id);
		
		$this->db->where('category',$subid);

		$this->db->where('status','1');

		return $this->db->get('products_details');

	}
	
		function get_maincategoryname($id)

	{

		$this->db->where('id',$id);

		return $this->db->get('categories');

	}

	function search_products($serach)

	{

		$this->db->like('brand_name',$serach);

		$this->db->or_like('style',$serach);

		$this->db->or_like('colors',$serach);

		$this->db->or_like('sub_colors',$serach);

		$this->db->or_like('description',$serach);

		$this->db->or_like('category',$serach);	

		$this->db->or_like('parent_category',$serach);			

		return $this->db->get('products_details');

	}

	function search_products1($search)

	{

		$this->db->where('brand_name',$search);			

		return $this->db->get('products_details');

	}

	function brand_group()

	{

		$this->db->select('brand_name');

		$this->db->group_by('brand_name');
                $this->db->limit('8');

		return $this->db->get('products_details');

	}

	function add_review_product($insert_data)

	{
        
		$this->db->insert('products_reviews',$insert_data);

	}

	function get_reviews($product_id,$status)
	{

		$this->db->order_by('updated_on','desc');
		$this->db->where('product_id',$product_id);
		$this->db->where('approval',$status);
		$this->db->limit('7');
		return $this->db->get('products_reviews');

	}

	function get_reviews1()
	{
	  $this->db->select('products_details.brand_name, products_reviews.id, products_reviews.review_product,products_reviews.updated_on');
      $this->db->join('products_details', 'products_details.id = products_reviews.product_id');
      $this->db->where('products_reviews.approval','0');
      $this->db->order_by('products_reviews.updated_on','desc');
      return $this->db->get('products_reviews');
	}

	

	function change_password($password_details,$current_password, $email){

		$this->db->where('email',$email);

		$this->db->where('password',md5($current_password));

		$this->db->update($this->table_name,$password_details);

		return $this->db->affected_rows();

	}


	function get_buyers_dropdown(){
      $result=$this->db->get('buyers');
      $return['']='All Buyers';
      if($result->num_rows() >0){
        foreach($result->result_array() as $result1){
          $return[$result1['id']]=$result1['buyer_name'];
        }
      }
      return $return;
   }
   
   function getProductDetails($proId){
	  $query = $this->db->query("SELECT * FROM products_details WHERE id =$proId");   
	  return $query->row();
   }
   
   
    function getPriceDetails($proId){
	  $query = $this->db->query("SELECT * FROM product_prices WHERE product_id =$proId");   
	  return $query->row();
   }
   
    function getImageDetails($proId){
	  $query = $this->db->query("SELECT * FROM products_images WHERE product_id =$proId");   
	  return $query->result();
   }
   
   function addToCart(){
	   $proid    = $this->input->post('productId');
	   $cartquan = $this->input->post('cartquan');
	   $priceid = $this->input->post('priceid');
	   $today    =date('Y-m-d H:i:s');
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
	   $insert_data = array( 'product_id' =>$proid,
		 						  'size_id' => $priceid,
		 						  'buyer_id' =>$data['id'],
		 	                      'quantity' =>$cartquan,
		 	                      'status' =>1,
								   'updated_on' =>$today
		 	                      );
	$this->db->insert('products_cart',$insert_data);
   }
   
  function getcartDetailsCount(){
	   $session_data = $this->session->userdata('logged_in');
	   $sessionid = $session_data['id'];
	   $query = $this->db->query("SELECT count(id) as carttotal FROM products_cart WHERE buyer_id =$sessionid AND status=1");   
	   return $query->row();  
   }
   
   function getProductDetailsCount(){
	   $session_data = $this->session->userdata('logged_in');
	   $sessionid = $session_data['id'];
       $query = $this->db->query("SELECT p.brand_name,c.id,p.price,p.image_name FROM products_details p 
	   INNER JOIN products_cart c ON p.id=c.product_id WHERE c.buyer_id=$sessionid AND c.status=1");
       return $query->result(); 	  

	   
   }
   
   
   function DeleteCart() {
	    $cartid = $this->input->post('cartid');
        $this->db->where('id',$cartid);
        $this->db->delete('products_cart');
 }
    function subscriptionleads($data){

	   $result = $this->db->insert('subscribe_leads',$data);
	  }
	  
	  
 function contactleads($data){
	  if(isset($data)){
		     $result = $this->db->insert('contact_form_leads',$data);
			 return $result;
	   }
 }
 function all_newthemesearchproducts($serachproduct){
		$query = $this->db->query("SELECT p.id,p.category,p.brand_name, 
		ca.category_name,p.parent_category,p.image_name,p.price FROM products_details p 
		INNER JOIN categories ca ON p.category=ca.id WHERE p.status=1 AND p.brand_name='$serachproduct'");
		return $query->result();
		}
		
		 function inventory($invVndrId,$invprctId,$inventoryNow)
		                {
		                   $value=array('inventory'=>$inventoryNow);
                            $this->db->where('product_id',$invprctId);
                           $this->db->update('products_details',$value);

                        }
		
		
}

?>