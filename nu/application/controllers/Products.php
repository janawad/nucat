<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
 function __construct()
  {
	parent::__construct();
	
	$this->load->helper(array('form','file','url'));
    $this->load->library(array('table','form_validation'));   
	$this->load->model('vendors_model','',TRUE);
	$this->load->model('sadmin_model','',TRUE);
	date_default_timezone_set('Asia/Kolkata');
  }
  function index()
  {
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'All Products';
       $data['menu_active'] = 'Products';
       
       
       $products = (array)$this->vendors_model->get_products_all()->result();
		
		$data['products'] = $products;
		
	if($products != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		                   );
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Image',
								  'Category ',
								  'Brand',
								  'Sizes-Prices ',
								  'Product Id ',
								  'Produtc Fit',
								  'Fabric',
								  'Colors',
								  'Sales Packages',
								  'Style',
								  'Inventory',
								  'Availability' ,
								  'Status'								  
 								);
				$i = 1;
				foreach($products as $product)
				{
					$status = $product->status;
					
				
			        if($status == '0')
				    $status1 = '<span class="label label-default">Rejected</span>';
			        if($status == '1')
				    $status1 = '<span class="label label-success">Accepted</span>';
				   
					
				$this->table->add_row($i++,	
										'<img src="'.base_url().'images_products/'.$product->image_name.'" width="40px" height="40px">'	,							
										$product->category,							
										$product->brand_name,	
										form_open('#')
										.'
										<button type="submit" class="label label-warning">Click</button>
										</form>',	
										$product->product_id,	
										$product->product_fit,	
										$product->fabric,
										$product->colors,							
										$product->sales_packages,	
										$product->style,	
										$product->inventory,	
										$product->availability,
										$status1
							         	);
							         	
				}
							         	
							         	
				
		
	         $data['table'] = $this->table->generate();    
		}
		else
		{
			$data['table'] = '<h5 class="text-semibold text-center">No Prodcut List Found..!</h5>';
		}
		
		
		$this->sadmin_template->show('categories/products_admin',$data);
       
       
	}
	else 
	{
		redirect('sadmin');
	}
  	
  }
}