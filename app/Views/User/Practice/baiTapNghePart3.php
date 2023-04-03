<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Luyện bài tập nghe - Part 3</title>

	<link href="../resources/css/bootstrap.css" rel="stylesheet">
	<link href="../resources/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../resources/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="../resources/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../resources/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="../resources/css/style.css" />
	<link href="../resources/font/font.css" rel="stylesheet">

	<link href="../resources/css/bootstrap.css" rel="stylesheet">
	<link href="../resources/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../resources/css/style.css" rel="stylesheet">

	<script src="http://code.jquery.com/jquery.js"></script>
	<!-- <script src="../resources/js/bootstrap.min.js>"></script> -->
	<script src="../resources/js/jquery-1.js"></script>
	<script src="../resources/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="../resources/js/client/home.js"></script>
	<style type="text/css">
		.hidden {
			display: none;
		}

		.error-message {
			color: red;
		}

		.radio3 {
			float: left;
		}

		.anchor {
			display: block;
			height: 115px;
			/*same height as header*/
			margin-top: -115px;
			/*same height as header*/
			visibility: hidden;
		}
	</style>
</head>

<body>
<?php include '../Include/header.php' ?>
	<div class="container">
		<!--PAGE TITLE-->
		<div class="span9" style="text-align: center">
			<h2 style="font-weight: bold">LUYỆN NGHE PART 3</h2>
			<div class="page-header"></div>
		</div>

		<!-- /. PAGE TITLE-->
		<div class="row">
			<div class="span9" style="text-align: center">
				<!--Blog Post-->
				<div class="blog-post">
					<h3>Bai Tap Luyen Nghe Part 3</h3>
					<input type="hidden" value="${baiTapNghe.id }" id="baiTapNgheId">
					<div class="postmetadata">
						<a name="middle">
							<ul>

								Độ khó - Dễ

								Độ khó - Trung bình

								Độ khó - Khó

							</ul>
						</a>
					</div>
					<img src="" style="width: 300px; height: 150px;">
					<p>Listen audio and answer the questions</p>
					<audio controls src=""></audio>
				</div>

				<div id="cauHoi"></div>

				<div class="pagination">
					<ul class="ul-pagination"></ul>
				</div>

				<hr align="center">

				<div>
					<button class="btn btn-success" id="btnNopBai">Nộp bài</button>
					<a class="btn btn-success hidden" id="btnBaiThiKhac" href="/webtoeic/listening">Làm bài thi khác</a>
				</div>

				<!--/.Pagination-->
			</div>
			<div class="span3">
				<div class="side-bar">

					<h3>Danh mục</h3>
					<ul class="nav nav-list">
						<li><a href="/webtoeic/listening">LUYỆN BÀI NGHE</a></li>
						<li><a href="/webtoeic/reading">LUYỆN BÀI ĐỌC</a></li>
						<li><a href="/webtoeic/listExam">THI THỬ</a></li>
						<li><a href="/webtoeic/listGrammar">HỌC NGỮ PHÁP</a></li>
						<li><a href="/webtoeic/listVocab">HỌC TỪ VỰNG</a></li>
					</ul>

				</div>
			</div>
		</div>
	</div>
	<div class="row col-md-6">
		<div class="modal fade" id="nopBaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">KẾT QUẢ</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h4 id="ketQuaText"></h4>
					</div>
					<div class="modal-footer">
						<input class="btn btn-danger" id="btnLamLai" type="button" value="Làm lại" />
						<input class="btn btn-primary" id="btnXemGiaiThich" type="button" value="Xem Giải thích" />

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include "../Include/footer.php" ?>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="../resources/js/client/baiNghe/lamBaiNghePart3.js"></script>

</body>

</html>