    
 <div class="col-md-9">
 <div class="container" style="width:100%">
                    <div class="row" data-gutter="15">
                        <?php if($Products1 != null)
                        {
                          foreach($Products1 as $product)
                          {
                          	echo $product;
                          }
                        }
                        else 
                        {
                           echo "<center><img src='".base_url()."assets/images/no_data.png'/> <h5 class='text-default'> Oops..! No products found. </h4>";
                        }?>
                        
             </div>                        
       </div>
                        
    </div>
                     