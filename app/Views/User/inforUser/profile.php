
<?= $this->extend('User/layout') ?>
<?= $this->section('content') ?>
<input style="display:none;" id="baseUrl" value=""/>
</head>
<body>

	<div class="container">
		<h3 class="page-header">Thông tin cá nhân</h3>
		<ul class="nav nav-tabs" id="tabs">
			<li class="active"><a href="">Cập nhật thông tin</a></li>
			<li><a href="">Đổi mật khẩu</a></li>
		</ul>

		<div>
			<div class="tab-content">
				<div class="tab-pane active" id="information">
					<form class="form-profile" action="/webtoeic/profile/update" method="post">
						<div class="form-group">
							<label style="font-weight: bold" for="staticEmail"
								class="col-sm-2 col-form-label">Email đăng ký</label>
							<div class="col-sm-10">
								<input type="text" readonly class="form-control-plaintext"
									value="" name="email">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10">
								<input type="hidden" class="form-control-plaintext nguoiDungId"
									value="" name="id">
							</div>
						</div>
						<div class="form-group">
							<label for="staticEmail" style="font-weight: bold"
								class="col-sm-2 col-form-label">Họ Tên</label>
							<div class="col-sm-10">
								<input type="text" class="form-control-plaintext" value=""
									name="hoTen" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="staticEmail" style="font-weight: bold"
								class="col-sm-2 col-form-label">Số điện thoại</label>
							<div class="col-sm-10">
								<input type="text" class="form-control-plaintext"
									value="" name="soDienThoai" required="required">
							</div>
						</div>

						<div class="form-group">
							<label for="staticEmail" style="font-weight: bold"
								class="col-sm-2 col-form-label">Địa chỉ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control-plaintext"
									value="" name="diaChi" required="required">
							</div>
						</div>
						<input class="btn btn-primary" id="btnSubmit" type="submit"
							value="Xác nhận" />
					</form>
				</div>
				<div class="tab-pane" id="changePass">
					<form class="formDoiMatKhau">

						<div>
							<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}" />
						</div>

						<div class="form-group">
							<label for="name">Mật khẩu cũ</label> <input type="password"
								class="form-control" name="oldPassword" required="required" />
						</div>
						<div class="form-group">
							<label for="name">Mật khẩu mới</label> <input type="password"
								class="form-control" name="newPassword" required="required" />
						</div>
						<div class="form-group">
							<label for="name">Nhắc lại mật khẩu mới</label> <input type="password"
								class="form-control" name="confirmNewPassword" required="required" />
						</div>
						<input class="btn btn-primary" type="button" id="btnXacNhanDoiMK"
							value="Xác nhận" />
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
