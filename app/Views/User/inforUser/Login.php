<?= $this->extend('User/layout') ?>
<?= $this->section('content') ?>
<input style="display:none;" id="baseUrl" value="" />
</head>

<body>

    <div class="container">
        <h3 class="page-header"></h3>
        <br>
        <ul class="nav nav-tabs" id="tabs">
            <li class="active"><a href="<?= base_url('User/Register') ?>">Đăng Ký</a></li>
            <li><a href="<?= base_url('User/Login') ?>">Đăng Nhập</a></li>
        </ul>

        <div>
            <div class="tab-content">


                <form class="form-login" action="" method="post">



                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input style="width: 500px;"   type="text" placeholder="Enter Username" name="uname" required>

                        <label for="psw"><b>Password</b></label>
                        <input style="width: 500px;"  type="password" placeholder="Enter Password" name="psw" required>
                        <br>
                        <button type="submit">Login</button>

                    </div>

                    <div class="container" style="background-color:#f1f1f1">

                        <span class="psw">Forgot <a href="#">password ?</a></span>
                    </div>

                </form>

            </div>
        </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>


    <script src="<?= base_url() ?>resources/js/client/profileClient.js"></script>
</body>

</html>
<?= $this->endSection() ?>
