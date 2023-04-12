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
                <div class="tab-pane active" id="information">
                    <form class="form-profile" action="" method="post">
                        <div style="display: flex;">
                            <label><b>FirstName :</b></label>
                            <input type="text" style="width: 500px;margin-left: 20px;" name="firstname" placeholder="FirstName...." size="15" required />
                        </div>

                        <div style="display: flex;">
                            <label> <b>Lastname :</b> </label>
                            <input type="text" style="width: 500px; margin-left: 24px;" name="lastname" placeholder="LastName...." size="15" required />
                        </div>
                        <div style="display: flex;">
                            <label> <b>UserName :</b></label>
                            <input type="text" style="width: 500px;margin-left: 20px;" name="username" placeholder="UserName...." size="15" required />
                        </div>
                        <div  style="display: flex;">
                            <label><b>Password :</b> </label>
                            <input type="password" style="width: 500px;margin-left: 24px;" name="password" placeholder="Password...." size="15" required />
                        </div>
                       <div style="display: flex;">
                       <label><b>Email :</b></label>
                        <input type="text" style="width: 500px;margin-left: 50px;" name="email" placeholder="Email...." size="15" required />
                       </div>
                        <br>
                        <button type="submit" class="registerbtn">Register</button>
                    </form>
                </div>
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
