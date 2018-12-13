<!---->
<!--<div class="row">-->
<!--    <div class="col-md-4">-->
<!--        --><?php //if($_POST) include 'aksi.php';?>
<!--        <form class="form-signin" action="?m=login" method="post">-->
<!--            <div class="form-group">-->
<!--                <label>Username</label>-->
<!--                <input type="text" class="form-control" placeholder="Username" name="user" autofocus />-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label>Password</label>-->
<!--                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" />-->
<!--            </div>-->
<!--            <button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->

<div class="limiter" style="margin-top: -70px;">
    <div class="container-login100">
        <div class="wrap-login100">
            <?php if($_POST) include 'aksi.php';?>
            <form class="login100-form validate-form" action="?m=login" method="post">
					<span class="login100-form-title p-b-20">
						Silahkan Login
					</span>

                <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
                    <input class="input100" type="text" name="user" autofocus>
                    <span class="focus-input100" data-placeholder="user"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                    <input class="input100" type="password" id="inputPassword" name="pass">
                    <span class="focus-input100" data-placeholder="pass"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
