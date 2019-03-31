<?php
session_start();

if(isset($_SESSION['email'])){
	header("Location:index.php"); 
}
require_once('partials/header.php')?>


<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>View All the Recent Dataset of Universities With Charts</p>
                        <input  type="submit" data-toggle="modal" data-target="#myModal" name="" value="Login"/><br/>    
                    </div>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog ">
                        <div class="modal-content">

                        <div class="container login-container">
                       
                            <div class=" login-form-1">
                                <h3>Log In As Admin</h3>
                            <form id="login" action="" method="post">

                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Your Email *" required/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Your Password *" required/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Login" />
                            </div>
                            </form>

                        </div>
</div>


                        </div>
                        </div>
                        </div>
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content">
                            <div class="tab-pane fade show active" >
                                <h3 class="register-heading">Apply for an Admin</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <form id="register" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="first_name" placeholder="First Name *"  />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name *"  />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control pass" name="password" placeholder="Password *" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password"  class="form-control pas-con"  placeholder="Confirm Password *" />
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Your Email *"  />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10"  name="phone" class="form-control" placeholder="Your Phone *"  />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="s_ans" class="form-control" placeholder="Enter Your Answer *"  />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>

            </div>
            </div>

            </body>
</html>