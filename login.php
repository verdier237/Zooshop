<?php require('top.php');
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Accueil</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Login/Register</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-form-wrap mt--60">
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Login</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form id="login-form" action="#" method="post">
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="login_name" id="login_name" placeholder="Your Email*" style="width:100%">
                                </div><span class="field_error" id="email1_error" style='color:red'></span>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" id="login_password" placeholder="Your Password*" style="width:100%">
                                </div><span class="field_error" id="password1_error" style='color:red'></span>
                            </div>

                            <div class="contact-btn">
                                <button type="button" onclick="user_login()" class="fv-btn">Login</button>
                            </div>
                        </form>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-6">
                <div class="contact-form-wrap mt--60">
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Register</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form id="register-form" action="#" method="post">
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="name" id="name" placeholder="Nom complet" style="width:100%">

                                </div> <span class="field_error" id="name_error" style='color:red'></span>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="email" id="email" placeholder="Adresse email" style="width:100%">

                                </div> <span class="field_error" id="email_error" style='color:red'></span>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="mobile" id="mobile" placeholder="Téléphone" style="width:100%">

                                </div> <span class="field_error" id="mobile_error" style='color:red'></span>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" name="password" id="password" placeholder="Mot de passe" style="width:100%">

                                </div>
                            </div>
                            <span class="field_error" id="password_error" style='color:red'></span>
                            <div class="contact-btn">
                                <button type="button" onclick="user_register()" class="fv-btn">Register</button>
                            </div>
                        </form>
                        <div class="form-output register_msg">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
</section>
<script>
    function user_register() {
        jQuery('.field_error').html('');
        var name = jQuery("#name").val();
        var email = jQuery("#email").val();
        var mobile = jQuery("#mobile").val();
        var password = jQuery("#password").val();
        var is_error = '';
        if (name == "") {
            jQuery("#name_error").html("Vous devez saisir votre nom");
            is_error = 'yes';
        }
        if (email == "") {
            jQuery("#email_error").html("Vous devez saisir votre adresse email");
            is_error = 'yes';
        }
        if (mobile == "") {
            jQuery("#mobile_error").html("Vous devez saisir votre téléphone mobile");
            is_error = 'yes';
        }
        if (password == "") {
            jQuery("#password_error").html("Vous devez saisir le mot de passe");
            is_error = 'yes';
        }
        if (is_error == '') {
            jQuery.ajax({
                url: 'user_register.php',
                type: 'post',
                data: 'name=' + name + "&email=" + email + "&mobile=" + mobile + "&password=" + password,
                success: function(result) {
                    if (result == "present") {
                        jQuery("#email_error").html("Email : " + email + " existe déja dans la base");
                    }
                    if (result == "insert") {
                        jQuery(".register_msg p").html("Enregistrement fait")
                    }
                }
            })
        }

    }

    function user_login() {
        jQuery('.field_error').html('');
        var email = jQuery("#login_name").val();
        var password = jQuery("#login_password").val();
        var is_error = '';
        if (email == "") {
            jQuery("#email1_error").html("Vous devez saisir votre adresse email");
            is_error = 'yes';
        }

        if (password == "") {
            jQuery("#password1_error").html("Vous devez saisir le mot de passe");
            is_error = 'yes';
        }
        if (is_error == '') {
            jQuery.ajax({
                url: 'user_login.php',
                type: 'post',
                data: "&email=" + email + "&password=" + password,
                success: function(result) {
                    if (result == "erreur") {
                        jQuery("#password1_error").html(" Email ou password incorrect");
                    }
                    if (result == "valid") {
                        window.location.href = 'index.php';
                    }

                }
            })
        }

    }
</script>
<?php require('footer.php'); ?>