<!-- Page container -->
	<div class="page-container login-container">
<style>
.subscribe-form  button, .form button {
    background-color: #96b6ce;
    border: medium none;
    color: #ffffff;
    float: left;
    height: 50px;
    margin-left: 20px;
    min-width: 80px;
    width: 25%;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    border: 1px solid #96b6ce;
    text-transform: uppercase;
}.subscribe-form a , .form button {
	 text-align: center;
    border: medium none;
    color: #ffffff;
    float: left;
    height: 50px;
    margin-left: 20px;
    min-width: 80px;
    width: 25%;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    border: 1px solid #96b6ce;
    text-transform: uppercase;
}
.subscribe-form button:hover, .form button:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #96b6ce;
}
.subscribe-form a:hover, .form button:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #96b6ce;
}
.cancelbutton{
	padding-top: 15px;
}



</style>
		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
              <div class="container col-xs-12 col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3" >
				<!-- Simple login form -->
				<?php echo form_open($action,'class="form-horizontal" name="add_student_new_new3" '); ?>
					<div class="panel panel-body login-form1" style="width:100%">
						<div class="text-center">
							<div class="icon-object1 border-slate-300 text-slate-300">
								<?php echo "<img src='".base_url()."assets/images/vendor.png' width='100px'>"; ?>
							</div>
							<h5 class="content-group">Vendor Registration Form <small class="display-block">Enter the Following Details</small></h5>
						</div>
						
						
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Vendor Name" name="vendor_name" id="vendor_name" value="<?php echo (set_value('vendor_name'))?set_value('vendor_name'):$Vendor['vendor_name']; ?>">
							<div class="form-control-feedback">
								<i class="icon-user text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('vendor_name','<p class="text-warning">','</p>'); ?>	
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Business Name" id="business_name" name="business_name" value="<?php echo (set_value('business_name'))?set_value('business_name'):$Vendor['business_name']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-building text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('business_name','<p class="text-warning">','</p>'); ?>
						</div>
						
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Date of birth(dd/mm/yyyy)" id="dob" name="dob" value="<?php echo (set_value('dob'))?set_value('dob'):$Vendor['dob']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-calendar text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('dob','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Address" id="address" name="address" value="<?php echo (set_value('address'))?set_value('address'):$Vendor['address']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-globe" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('address','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter GST No." id="tin" name="tin" value="<?php echo (set_value('tin'))?set_value('tin'):$Vendor['tin']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-barcode text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('tin','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter PAN No." id="pan" name="pan" value="<?php echo (set_value('pan'))?set_value('pan'):$Vendor['pan']; ?>">
							<div class="form-control-feedback">
								<i class="icon-credit-card text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('pan','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Brand Name" id="brand" name="brand" value="<?php echo (set_value('brand'))?set_value('brand'):$Vendor['brand']; ?>">
							<div class="form-control-feedback">
								<i class="fa fa-bars text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('brand','<p class="text-warning">','</p>'); ?>
						</div>
						
						<small class="text-danger">Note: Password will be sent to this Mobile No. Only.</small>
						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" maxlength="10" placeholder="Enter Mobile No." id="mobile" name="mobile" value="<?php echo (set_value('mobile'))?set_value('mobile'):$Vendor['mobile']; ?>">
							<div class="form-control-feedback">
								<i class="icon-mobile text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('mobile','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control"   placeholder="Enter Office Number" id="office" name="office" value="<?php echo (set_value('office'))?set_value('office'):$Vendor['office']; ?>">
							<div class="form-control-feedback">
								<i class="icon-phone text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('office','<p class="text-warning">','</p>'); ?>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" placeholder="Enter Email id" id="email" name="email" value="<?php echo (set_value('email'))?set_value('email'):$Vendor['email'];?>">
							<div class="form-control-feedback">
								<i class="fa fa-envelope text-muted" style="margin-top: .3cm; color: #999999;"></i>
							</div>
							<?php echo form_error('email','<p class="text-warning">','</p>'); ?>
						</div>
						
						<div class="form-group has-feedback has-feedback-left">
							<select class="form-control" name="pack_id">
								<option value="">--Select Package--</option>
								<?php foreach ($packs as $pack){?>
								<option value="<?=$pack->id;?>"><?=$pack->package_name.' Pack - '.$pack->validity.' Months ['.number_format($pack->price).'/- per Month]';?></option>
								<?php }?>
							</select>
							<div class="form-control-feedback">
								<i class="icon-user text-muted" style="margin-top: .3cm;"></i>
							</div>
							<?php echo form_error('pack_id','<p class="text-warning">','</p>'); ?>
						</div>
						
						
						
						<div class="form-group">
							<input type="checkbox" class="checkbox form-control" placeholder="" id="agree" name="agree" value="1" style="width: 4%; height: 15px; min-height: 18px; float: left;"> <p> <a data-toggle="modal" data-target="#myModal">I agree the vendor Agreement</a></p>
							
							
							<?php echo form_error('agree','<p class="text-warning">','</p>'); ?>
						</div>
						
						
						
						
						<div class="form-group">
							<center>
							<button type="submit" class="btn btn-primary">Register</button> &nbsp;
							<?php echo anchor('http://nucatalog.com','Cancel','class="btn btn-danger"');?>
							</center>
						</div>

					</div>
				<?php echo form_close();?>
				<!-- /simple login form -->
				</div>
			
				
<head>
  
<style>
.text-warning {
    color: #ff5722;
}
.modal-dialog{
    overflow-y: initial !important
   
}
.modal-body{
    height: 250px;
    overflow-y: auto;
   
}
</style>
</head>
<div class="container">


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width:87%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Terms and Conditions</h4>
        </div>
        <div class="modal-body">
        <pre>  <p>
          This AGREEMENT witnesses as follows:

I. WHEREAS, the Firm BHANDARI &amp; CHOPRA VENTURES (WWW.NUCATALOG.COM), No.32 &amp; 37, 3rd Floor, Karthik Mansion, Above Srinivasa Jewellers,
 Nagarathpet Main Road, Bengaluru – 560 002, provides an extensive business - to - business environment through its website www.nucatalog.com 
 and has developed certain software that it is made available for access by users on a subscription basis to showcase / market their products 
 to the general public; and

II. WHEREAS, the Vendor is engaged in the business of textile, textile goods, fashion garments, garments and all such other goods and products
 associated with textile and garment industry, has approached the Firm to showcase / market its products / goods through www.nucatalog.com 
 website owned and managed by the Firm;

III. WHEREAS, the parties have agreed to enter into a strategic e-commerce marketing relationship under which the Firm will showcase / promote
 / market the products / goods listed by the Vendor through its website www.nucatalog.com.

IV. NOW, THEREFORE, for other good and valuable consideration, the receipt and sufficiency of which are hereby acknowledged, the parties agree
 as follows:

<strong>1. TERM</strong>

This Agreement shall commence on the Effective Date and shall remain in effect upto the period the Vendor has opted for and thereafter this
 Agreement shall be renewed automatically upon payment and package thus opted for by the Vendor, unless one party notifies the other of its 
 desire to terminate this Agreement at least Thirty (30) days prior to the expiration of the Initial Term or then current renewal term, as 
 applicable.

<strong>2. MARKETING SUPPORT, PRODUCTS, AVAILABILITY OF PRODUCTS ETC.</strong>

The Vendor will keep informed at all times the Firm about the availability of the products in its inventory along with detailed specifications
 like size, colour, texture etc., as may be required of the product. Order once placed on the Vendor the same have to be honoured by the Vendor
 at all costs.

<strong>3. INTELLECTUAL PROPERTY</strong>

Each party shall exclusively own its respective trademarks and service marks, copyrights, trade secrets, and patents (collectively, the 
“Intellectual Property”) and no party will have any claim or right to the Intellectual Property of the other by virtue of this Agreement or
 the performance of services hereunder. Neither party will take any action or make any claim to any Intellectual Property belonging to the 
 other party, whether during the Term or thereafter, which is inconsistent with this Paragraph.

<strong>4. OBLIGATIONS OF THE PARTIES:</strong>

4.1 To deliver the product of the ordered specifications / description only including quantity and quality prescribed in the Order and there
should be no instance of wrong item being delivered and / or quality issue and / or issue of Non delivery. Further, the Vendor shall 
maintain adequate stock / inventory of the items at all times. In case the Vendor is running out of supplies or is likely not to fulfill
the Order received, it shall intimate to the Firm at least 48 (Forty Eight) hours (two days) in advance so that notice of OUT OF STOCK for
the product can be placed on the website.

4.2 Not to send any kind of promotion material or any such material, which is, derogatory to and/or adverse to the interests financial or 
otherwise of the Firm, to the customer either along with the products supplied or in any manner whatsoever.

4.3 Not to do any act/deal in a thing / products/goods/services which are either banned/prohibited by law or violates any of the intellectual
 property right of any party in respect of such product.

4.4 The Vendor declares that it has all rights and authorisations in respect of intellectual property rights of third parties and is authorised
 to sell/provide/licence such products to the customer. The copy of such authorization shall be provided on demand without failure and/or protest.

4.5 The Vendor agrees to indemnify and keep indemnified the Firm from all claims/losses (including advocate fee for defending/prosecuting any case)
 that may arise against the Firm due to acts/omission on the part of the Vendor.

4.6 To provide to the Firm, for the purpose of the creation/display on website of Firm, the product description, images, disclaimer, delivery time
 lines, price and such other details for the products to be displayed and offered for sale.

4.7 To ensure and not to provide any description/image/text/graphic which is unlawful, illegal, intimidating, obnoxious, objectionable, obscene, 
vulgar, opposed to public policy, prohibited by law or morality or is in violation of intellectual property rights including but not limited to
Trademark and copyright of any third party or of inaccurate, false, incorrect, misleading description or is surrogatory in nature. Further it will
forward the product description and image only for the product which is offered for sale through the website of the Firm. The Vendor agrees that 
in case there is violation of this covenant, it shall do and cause to be done all such acts as are necessary to prevent disrepute being caused to
the Firm.

4.8 To provide full, correct, accurate and true description of the product so as to enable the customers to make an informed decision. The Vendor 
agrees not to provide any such description/information regarding the product which amounts to misrepresentation to the customer.

4.9 To be solely responsible for the quality, quantity, merchantability, guarantee, warranties in respect of the products offered for sale through 
portal of the Firm.

4.10 At all times have access to the Internet and its email account to check the status of approved orders and will ensure prompt deliveries within 
the time frame mentioned herein before in the agreement.

4.11 To raise an invoice as well as receipt of payment in the name of Customer for an amount equivalent to the amount displayed on the online store
 to the customer and paid by/charged to the customer.

4.12 Not to offer any Products for Sale on the Online Store, which are prohibited for sale, dangerous, against the public policy, banned, unlawful,
 illegal or prohibited under the Indian laws.

4.13 To provide satisfactory proof about the ownership/licences of all the legal rights in the Products that are offered for sale on the Online Store
 as and when demanded by the Firm.

4.14 To pass on the legal title, rights and ownership in the Products sold to the Customer.

4.15 To be solely responsible for any dispute that may be raised by the customer relating to the goods, merchandise and services provided by the Vendor.
No claim of whatsoever nature will be raised on the Firm.

4.16 The Vendor shall at all time during the pendency of this agreement endeavor to protect and promote the interests of the Firm and ensure that third
parties rights including intellectual property rights are not infringed.

4.17 The Vendor shall at all times be responsible for compliance of all applicable laws and regulations including but not limited to Intellectual 
Property Rights, Goods and Services Tax, Local Sales Tax, Central Sales Tax, Service Tax, Value Added Tax, Standards of Weights &amp; Measures 
legislation, Sale of Goods Act, Excise and Import duties, Code of Advertising Ethics, and any other such laws applicable.

4.18 To provide to the Firm copies of any document required by the Firm for the purposes of performance of its obligations under this agreement
 within 48 hours of getting a written notice from the Firm.

4.19 To seek advance written approval from the Firm, prior to release of any promotion/advertisement material, in so far as the same relates to
services offered pursuant to the terms of this Agreement.

<strong>5. LIMITATION OF LIABILITY</strong>

The Firm on the basis of representation by the Vendor is marketing the products of the Vendor through its website www.nucatalog.com to enable 
Vendor to offer it’s products for sale through the said online shopping portal. This representation is the essence of the Contract. It is expressly
agreed by the Vendor that the Firm shall under no circumstances be liable or responsible for any loss, injury or damage to the Vendor, customer
or any other party whomsoever, arising on account of any transaction under this Agreement or as a result of the Products being in any way damaged,
defective, in unfit condition, infringing/ violating any laws/ regulations/ intellectual property rights of any third party. The Vendor agrees 
and acknowledges that it shall be solely liable for any claims, damages, allegation arising out of the Products offered for sale through online
shopping through its website www.nucatalog.com (including but not limited to quality, quantity, price, merchantability, use for a particular 
purpose, or any other related claim) and shall hold the Firm harmless and indemnified against all such claims and damages. Further the Firm
shall not be liable for any claims, damages arising out of any negligence, misconduct or misrepresentation by the Vendor or any of its
representatives.

<strong>6. TERMINATIION</strong>

This Agreement may be terminated by either party upon (Thirty) 30 days’ written notice to the other party in the event of a breach of a material
 provision of this Agreement by the other party, provided that, during the (Thirty) 30 day period, the breaching party fails to cure such breach.

<strong>7. REPRESENTATIONS AND WARRANTIES</strong>

A. Each party represents and warrants that it has the right, title, interest, and authority to enter into this Agreement and to fully perform its
 obligations hereunder, and that the rights granted hereunder shall not violate the rights of any third party. Each party represents and warrants
  that its conduct hereunder shall conform to all applicable central, state, and local laws and regulations.

B. All obligations narrated under this Agreement are legal, valid, binding and enforceable in law against Vendor. There are no proceedings pending
 against the Vendor, which may have a material adverse effect on its ability to perform and meet the obligations under this Agreement;

C. Vendor warrants that it shall, at all times ensure compliance with all the requirements applicable to its business and for the purposes of this
 agreement including but not limited to Intellectual Property Rights, Goods and Service Tax, Sales Tax, Central Sales Tax, Service tax, Standards 
 of Weights &amp; Measures legislation, Sale of Goods Act, Value added tax, Excise and Import duties, etc. It further declares and confirms that 
 it has paid and shall continue to discharge all its obligations towards statutory authorities.

D. That it has adequate rights under relevant laws including but not limited to various Intellectual Property Legislation(s) to enter into this 
Agreement with the Firm and perform the obligations contained herein and that it has not violated/ infringed any intellectual property rights
 of any third party.

E. It shall maintain details of all transaction and mark as complete / incomplete as the case may be and shall provide the same to the Firm
 upon demand.

<strong>8. INDEMNITY</strong>

Each party hereby indemnifies and holds harmless the other party, their officers, directors, and employees from any and all liabilities,
 claims, causes of actions, suits, losses, damages, fines, judgments, and expenses (including reasonable attorney’s fees) which may be incurred 
 by the Indemnities arising out of any breach of the covenants, warranties, representations, and agreements herein.

<strong>9. RELATIONSHIP OF PARTIES</strong>

Nothing in the Agreement shall be deemed to constitute, create, give effect to, or otherwise recognize a partnership, joint venture, or formal
 business entity of any kind; and the rights and obligations of the Parties shall be limited to those expressly set forth herein.

<strong>10. CONFIDENTIALITY</strong>

“Confidential Information” shall mean any confidential technical data, trade secret, know-how, or other confidential information disclosed
by any party hereunder in writing, orally, or by drawing or other form and which shall be marked by the disclosing party as “Confidential” 
or “Proprietary”. If such information is disclosed orally, or through demonstration, in order to be deemed Confidential Information, it must
be specifically designated as being of a confidential nature at the time of disclosure and reduced in writing and delivered to the receiving party.

Notwithstanding the foregoing, Confidential Information shall not include information which: (i) is known to the receiving party at the time
of disclosure or becomes known to the receiving party without breach of this Agreement; (ii) is or becomes publicly known through no wrongful
act of the receiving party or any subsidiary of the receiving party; (iii) us rightfully received from a third party without restriction on
disclosure; (iv) is independently developed by the receiving party or any of its subsidiary; (v) is furnished to any third party by the 
disclosing party without restriction on its disclosure; (vi) is approved for release upon a prior written consent of the disclosing party;
(vii) is disclosed pursuant to judicial order, pursuant to requirement of a governmental agency, or by operation of law.

The receiving party agrees that it will not disclose any Confidential Information to any third party and will not use Confidential Information 
of the disclosing party for any purpose other than for the performance of the rights and obligations hereunder during the term of this Agreement 
and for any period thereafter, without the prior written consent of the disclosing party. The receiving party further agrees that Confidential 
Information shall remain the sole property of the disclosing party and that it will take all reasonable precautions to prevent any unauthorized 
disclosure of Confidential Information by its employees. No license shall be granted by the disclosing party to the receiving party with respect
 to Confidential Information disclosed hereunder unless otherwise expressly provided herein.

Upon the request of the disclosing party, the receiving party will promptly return all Confidential Information furnished hereunder and all copies
 thereof.

The parties agree that all publicity and public announcements concerning the formation and existence of this Agreement shall be jointly planned 
and coordinated by and among the Parties. Neither party shall disclose any of the specific terms of this Agreement to any third party without the
 prior written consent of the other party, which consent shall not be withheld unreasonably. Notwithstanding the foregoing, any party may disclose
  information concerning this Agreement as required by the rules, orders, regulations or directives of a court, government, or governmental agency,
   after giving prior notice to the other party.

If a party breaches any of its obligations with respect to confidentially and unauthorized use of Confidential Information hereunder, the non-breaching
 party shall be entitled to equitable relief to protect its interest therein, including but not limited to injunctive relief, as well as money damages
  notwithstanding anything to the contrary contained herein.

<strong>11. EFFECT OF TERMINATION</strong>

Upon termination or expiration of this Agreement, all rights granted to the Vendor shall forthwith revert to the Firm which shall be free to contract
 with others without any obligation to the Vendor.

<strong>12. FORCE MAJEURE</strong>

Neither party will be liable for, or will be considered to be in breach of or default under, this Agreement on account of any delay or failure to 
perform as required by this Agreement as a result of any causes or conditions that are beyond such Party’s reasonable control and that such Party is
 unable to overcome through the exercise of commercially reasonable diligence. If any force majeure event occurs, the affected party will give prompt
  written notice to the other party and will use commercially reasonable efforts to minimize the impact of the event.

<strong>13. NOTICE AND PAYMENT</strong>

Any Notice required to be given under this Agreement shall be in writing and delivered personally to the other designated party at the above-stated
 address or mailed by certified, registered, or express mail, return receipt requested or by such other valid modes of communication.

Either party may change the address to which notice or payment is to be sent by written notice to the other under any provision of this paragraph.

<strong>14. JURISDICTION/DISPUTES</strong>

This Agreement shall be governed in accordance with the laws of Republic of India. All disputes under this Agreement shall be resolved by litigation
 in the courts of the Bengaluru, and the Parties consent to the jurisdiction of such courts, agree to accept service of process by mail, and hereby 
 waive any jurisdictional or venue defenses otherwise available to it.

<strong>15. AGREEMENT BINDING ON SUCCESSORS</strong>

The provisions of the Agreement shall be binding upon and shall inure to the benefit of the parties hereto, their heirs, administrators, successors,
 and assigns.

<strong>16. ASSIGNABILITY</strong>

Neither party may assign this Agreement or the rights and obligations thereunder to any third party without the prior express written approval of the
 other party which shall not be unreasonably withheld.

<strong>19. WAIVER</strong>

No waiver by either party of any default shall be deemed a waiver of prior or subsequent default of the same of other provisions of this Agreement.

<strong>20. SERVERABILITY</strong>

If any term, clause, or provision hereof is held invalid or unenforceable by a court of competent jurisdiction, such invalidity shall not affect the
 validity or operation of any other term, clause, or provision and such invalid term, clause, or provision shall be deemed to be severed from the 
 Agreement.

<strong>21.</strong> This Agreement constitutes the entire understanding of the Parties, and revokes and supersedes all prior agreements between 
the Parties and is intended as a final expression of their Agreement. It shall not be modified or amended except in writing signed by the Parties
 hereto and specifically referring to this Agreement. This Agreement shall take precedence over any other documents which may conflict with this
  Agreement.

<strong>22.</strong> The Firm and Vendor which expression shall whenever the context so requires or mean and include each of their successors in
 interest and assign

IN WITNESS WHEREOF, the Parties hereto, intending to be legally bound hereby, have digitally accepted the terms on the day indicated mentioned
 here in above.
         
</p></pre>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>