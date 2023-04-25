<div class="span9">
	<div class="navbar pull-right">
		<div class="navbar-inner">
			<a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
			<div class="nav-collapse collapse navbar-responsive-collapse">
				<ul class="nav">
					<li><a href="<?= base_url('') ?>">Trang chủ</a></li>
					<li><a href="<?= base_url('blog') ?>">Blog</a></li>

					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Luyện Tập <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url('Practice/PracticeListen') ?>">Luyện bài nghe</a></li>
							<li><a href="<?= base_url('Practice/PracticeRead') ?>">Luyện bài đọc</a></li>
							<li><a href="<?= base_url('Practice/PracticeGrammar') ?>">Ngữ pháp</a></li>
							<li><a href="<?= base_url('Practice/PracticeVocabulary') ?>">Từ vựng</a></li>
							<li><a href="../listExam/listExam.php">Thi thử</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Làm Bài Thi<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?= base_url('listExam/listlisten') ?>">Bài Thi Nghe</a></li>
							<li><a href="<?= base_url('listExam/listread') ?>">Bài Thi Đọc</a></li>
							<li><a href="<?= base_url('listExam/listtoeic') ?>">Bài Thi Toeic</a></li>
							<li><a href="<?= base_url('listExam/examrandom') ?>">Bài Thi Ngẫu Nhiên</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<?php $user_id = session()->get('last_name') ?>
						<?php if (isset($user_id) && !empty($user_id)) : ?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('User/Infor') ?>">Tài khoản</a></li>
								<li><a href="<?= base_url('User/Result') ?>">Kết Quả Thi</a></li>
								<li><a href="User/EditPassWord/<?php echo session()->get('id'); ?>">Đổi mật khẩu</a></li>
								<li><a href="<?= base_url('User/Logout') ?>">Thoát</a></li>
							</ul>
						<?php else : ?>
							<a href="<?= base_url() ?>/User/Login">Đăng nhập</a>
						<?php endif ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>