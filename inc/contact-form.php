
<form class="form-area contact-form text-right" id="yogaflexForm" action="#" method="post" data-url="<?php echo admin_url( 'admin-ajax.php' );  ?>">
	<div class="row">
		<div class="col-lg-6 form-group">
			<input name="name" id="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
			class="common-input mb-20 form-control" required="required" type="text">

			<input name="email" id="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''"
			onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="required" type="email">

			<input name="subject" id="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'"
			class="common-input mb-20 form-control" required="required" type="text">
        </div>
        
		<div class="col-lg-6 form-group">
			<textarea class="common-textarea form-control" name="message" id="message" placeholder="Enter Messege" onfocus="this.placeholder = ''"
			onblur="this.placeholder = 'Enter Messege'" required="required"></textarea>
        </div>
        
		<div class="col-lg-12">
			<div class="alert-msg" style="text-align: left;"></div>
			<button type="submit" class="genric-btn primary" style="float: right;">Send Message</button>
		</div>
	</div>
</form>
