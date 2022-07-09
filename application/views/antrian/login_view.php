<div class="login-box">
    <br />
    <center> <a style="color: black;"> LOGIN SISTEM ANTRIAN</a></center>


    <div id="tampilalert"></div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="border:2px solid #226bbf;">
        <p class="login-box-msg" style="font-size:16px;"></p>
        <form action="<?= base_url('login/auth_pasien'); ?>" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" id="user" name="user" required="required" autocomplete="off">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required="required" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <!-- /.col
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" id="remember" value="R1"> Remember Me
            </label>
          </div>-->
                    <!-- /.social-auth-links -->
                </div>
                <div class="col-xs-4">
                    <button type="submit" id="loding" class="btn btn-primary btn-block btn-flat">Login</button>
                    <div id="loadingcuy"></div>
                </div>