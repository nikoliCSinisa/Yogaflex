
<form class="form-area contact-form text-right" id="yogaflexForm" action="options.php" method="post">
	<div class="row">
		<div class="col-lg-6 form-group">
			<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
			class="common-input mb-20 form-control" required="" type="text">

			<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''"
			onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

			<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'"
			class="common-input mb-20 form-control" required="" type="text">
        </div>
        
		<div class="col-lg-6 form-group">
			<textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''"
			onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
        </div>
        
		<div class="col-lg-12">
			<div class="alert-msg" style="text-align: left;"></div>
			<button class="genric-btn primary" style="float: right;">Send Message</button>
		</div>
	</div>
</form>
