<!-- Social info starts -->
<div class="container-fluid bg-primary">
          <div class="row text-white text-center p-1">
            <div class="col-sm">
                <a href="#" class="text-white social-hover"><i class="fab fa-facebook"></i>Facebook</a>
            </div>
            <div class="col-sm">
                <a href="#" class="text-white social-hover"><i class="fab fa-twitter"></i>Twitter</a>
            </div>
            <div class="col-sm">
                <a href="#" class="text-white social-hover"><i class="fab fa-whatsapp"></i>Whatsapp</a>
            </div>
            <div class="col-sm">
                <a href="#" class="text-white social-hover"><i class="fab fa-instagram"></i>Instagram</a>
            </div>
          </div>
          </div> 

         <!-- Social info ends -->

         <!-- end Section starts -->
         <div class="container-fluid p-4" style="background-color: #E9ECEF">
            <div class="container" style="background-color: #E9ECEF">
                <div class="row text-center">
                    <div class="col-sm">
                    <h5>About Us</h5>
                    <p>Our platform is one of the best platforms in the web. We are committed to give
                        you the best service.
                    </p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a class="text-dark" href="#">Web development</a><br/>
                    <a class="text-dark" href="#">Web designing</a><br/>
                    <a class="text-dark" href="#">Data Structure</a><br/>
                    <a class="text-dark" href="#">Python</a><br/>
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>SchoolHouse Ltd<br> Mirpur,Dhaka<br> Phone: 01727378683</p>
                </div>
            </div>
         </div>
        </div>
         <!-- end section ends -->

         <!-- footer starts -->
          <footer class="container-fluid bg-dark text-center p-2">
            <small class="text-white">Copyright &copy; 2023 || Designed by .... ||<a class="nav-link" href="admin/adminlogin.php"> Admin Login</a></small>
          </footer>
          <!-- footer ends -->

    <!-- Registration starts -->
    <!-- Modal -->
    <div class="modal fade" id="stuRegModal" tabindex="-1" aria-labelledby="stuRegModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="stuRegModalLabel">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Resgistration form -->
    <form id="stuRegForm">
        <div class="form-group">
            <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label><small id="statusMsg1"></small><input type="text"
            class="form-control" placeholder="Name" name="stuname" id="stuname">
        </div>
        <div class="form-group">
            <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label><small id="statusMsg2"></small><input type="email"
            class="form-control" placeholder="Email" name="stuemail" id="stuemail">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label><small id="statusMsg3"></small><input type="password"
            class="form-control" placeholder="Password" name="stupass" id="stupass">
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="stupassconfirm" class="pl-2 font-weight-bold">Confirm Password</label><small id="statusMsg4"></small><input type="password"
            class="form-control" placeholder="Confirm Password" name="stupassconfirm" id="stupassconfirm">
        </div>
    </form>
   <!-- end form -->
      </div>
      <div class="modal-footer">
        <div id="successMsg"></div>
      <button type="button" class="btn btn-primary" onclick="addStu()">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    <!-- Registration ends -->

       <!-- Student Login starts -->
    <!-- Modal -->
<div class="modal fade" id="stuLoginModal" tabindex="-1" aria-labelledby="stuLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="stuLoginModalLabel">Student Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form -->
      <form id="stuLoginForm">
        <div class="form-group">
            <i class="fas fa-envelope"></i><label for="stulogemail" class="pl-2 font-weight-bold">Email</label><div id="statusMsgEmail"></div><input type="email"
            class="form-control" placeholder="Email" name="stulogemail" id="stulogemail">
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i><label for="stulogpass" class="pl-2 font-weight-bold">Password</label><div id="statusMsgPass"></div><input type="password"
            class="form-control" placeholder="Password" name="stulogpass" id="stulogpass">
        </div>
</form>
<!-- end form -->
      </div>
      <div class="modal-footer">
        <div id="loginMsg"></div>
      <button type="button" class="btn btn-primary" id="stuLogBtn" onclick="checkStuLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    <!-- Student Login ends -->


    <!-- Jquery, JS and Font Awesome JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>

    <!-- ajax js -->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>
    <script type="text/javascript" src="js/adminajaxrequest.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true,
            autoPlay: 3000,
            stopOnHover: true,
            transitionStyle : "fade"
        });
    });
</script>
    </body>
</html>



<!-- PHP registration -->