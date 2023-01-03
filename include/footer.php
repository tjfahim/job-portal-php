<footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg pt-4">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-10">
                             <div>
                                 <h4 class="text-white">About Us</h4>
                                 <div class="footer-pera">
                                     <p>Our New Job Portal Project.</p>
                                </div>
                             </div>
                         </div>

                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-20">
                            <div>
                                <h4  class="text-white">Contact Info</h4>
                                <ul>
                                    <li>
                                    <p>Address :Dhaka,Bangladesh</p>
                                    </li>
                                    <li><a href="#">Email : info@pubproject.com</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                  
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-20">
                            <div>
                                <h4  class="text-white">Social Links</h4>
                                <div class="footer-pera footer-pera2">
                                <div class="col-xl-2 col-lg-2">
                             <div class="footer-social f-right">
                                 <a href="facebook.com"><i class="fab fa-facebook-f"></i></a>
                                 <a href="twitter.com"><i class="fab fa-twitter"></i></a>
                                 <a href="google.com"><i class="fas fa-globe"></i></a>
                             </div>
                         </div>
                             </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
               <!--  -->
               <div class="row justify-content-between py-4">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <!-- logo -->
                        <div class="footer-logo mb-20">
                        <a href="index.php"><img src="asset/img/logo/logo2_footer.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                    <?php 
                                                $employee="SELECT * FROM employee";
                                                $employee=mysqli_query($con,$employee);
                                                $row=mysqli_num_rows($employee);
                                            ?>
                        <p>Total Employee</p>
                        <span><?php echo $row ?></span>
                    </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                        <?php 
                                                $employer="SELECT * FROM employer WHERE status='active'";
                                                $employer=mysqli_query($con,$employer);
                                                $row=mysqli_num_rows($employer);
                                            ?>
                            <p>Total Employer</p>
                            <span><?php echo $row ?></span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <!-- Footer Bottom Tittle -->
                        <div class="footer-tittle-bottom">
                        <?php 
                                                $total_job="SELECT * FROM jobs WHERE status='active'";
                                                $total_job=mysqli_query($con,$total_job);
                                                $row=mysqli_num_rows($total_job);
                                                       
                                            ?>
                            <p>Total Job</p>
                            <span><?php echo $row ?></span>
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-10 ">
                             <div class="footer-copy-right">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://pundrauniversity.edu.bd/" target="_blank">Pundra University</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                        
                     </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

	<!-- All JS Custom Plugins Link Here here -->
    <script src="./asset/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./asset/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./asset/js/popper.min.js"></script>
        <script src="./asset/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./asset/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./asset/js/owl.carousel.min.js"></script>
        <script src="./asset/js/slick.min.js"></script>
        <script src="./asset/js/price_rangs.js"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="./asset/js/wow.min.js"></script>
		<script src="./asset/js/animated.headline.js"></script>
        <script src="./asset/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./asset/js/jquery.scrollUp.min.js"></script>
        <script src="./asset/js/jquery.nice-select.min.js"></script>
		<script src="./asset/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./asset/js/contact.js"></script>
        <script src="./asset/js/jquery.form.js"></script>
        <script src="./asset/js/jquery.validate.min.js"></script>
        <script src="./asset/js/mail-script.js"></script>
        <script src="./asset/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./asset/js/plugins.js"></script>
        <script src="./asset/js/main.js"></script>
    
</body>
</html>