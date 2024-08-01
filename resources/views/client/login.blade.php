@extends('client.layouts.master');
@section('main-content')

<?php
    ob_start();
    session_start();

    ?>
 <!--================Login Box Area =================-->
 <section class="login_box_area section-margin">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="login_box_img">
                     <div class="hover">
                         <h4>New to our website?</h4>
                         <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                         <a class="button button-account" href="index.php?page=register">Create an Account</a>
                     </div>
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="login_form_inner">
                     <?php
                        //    if($_POST["login"]){
                        //         $
                        //    }
                        ?>
                     <h3>Log in to enter</h3>
                     <form class="row login_form" action="#/" id="contactForm">
                         <div class="col-md-12 form-group">
                             <input type="text" class="form-control" id="name" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                         </div>
                         <div class="col-md-12 form-group">
                             <input type="text" class="form-control" id="name" name="name" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                         </div>
                         <div class="col-md-12 form-group">
                             <div class="creat_account">
                                 <input type="checkbox" id="f-option2" name="selector">
                                 <label for="f-option2">Keep me logged in</label>
                             </div>
                         </div>
                         <div class="col-md-12 form-group">
                             <button type="submit" value="submit" name="login" class="button button-login w-100">Log In</button>
                             <a href="#">Forgot Password?</a>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!--================End Login Box Area =================-->
@endsection