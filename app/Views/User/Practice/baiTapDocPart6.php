<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Luyện bài tập đọc - Part 6</title>

    <link href="../../resources/css/bootstrap.css" rel="stylesheet">
    <link href="../../resources/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../../resources/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../resources/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../resources/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../../resources/css/style.css" />
    <link href="../../resources/font/font.css" rel="stylesheet">

    <link href="../../resources/css/bootstrap.css" rel="stylesheet">
    <link href="../../resources/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../../resources/css/style.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- <script src="../resources/js/bootstrap.min.js>"></script> -->
    <script src="../../resources/js/jquery-1.js"></script>
    <script src="../../resources/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="../../resources/js/client/home.js"></script>
    <style type="text/css">
        .hidden {
            display: none;
        }
        
        .error-message {
            color: red;
        }
        
        .radioLabel {
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
<!--HEADER ROW-->
<div id="header-row">
		<div class="container">
			<div class="row">
				<!--LOGO-->
				<div class="span3">
					<a class="brand" href="../Home/home.php"><img src="../resources/file/images/logotest.png" /></a>
				</div>
				<!-- /LOGO -->

				<!-- MAIN NAVIGATION -->
				<div class="span9">
					<div class="navbar pull-right">
						<div class="navbar-inner">
							<a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
							<div class="nav-collapse collapse navbar-responsive-collapse">
                            <ul class="nav">
									<li><a href="../../Home/home.php">Trang chủ</a></li>
									<li><a href="#">Blog</a></li>	
									
									<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Luyện Tập <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="../../Practice//danhSachBaiNghe.php">Luyện bài nghe</a></li>
											<li><a href="../../Practice/danhSachBaiDoc.php">Luyện bài đọc</a></li>
											<li><a href="../../Practice/detailGrammar.php">Ngữ pháp</a></li>
											<li><a href="../../Practice/practiceVocabulary.php">Từ vựng</a></li>
											<li><a href="../../listExam/listExam.php">Thi thử</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Làm Bài Thi<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="../../listExam/listTestListen.php">Bài Thi Nghe</a></li>
											<li><a href="../../listExam/listTestRead.php">Bài Thi Đọc</a></li>
											<li><a href="../../listExam/listExam.php">Bài Thi Toeic</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Tên User<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="../../infoUser/profile.php">Tài khoản</a></li>
											<li><a href="../../Results/resultTestUser.php">Kết Quả Thi</a></li>
											<li><a href="#">Thoát</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- MAIN NAVIGATION -->
			</div>
		</div>
	</div>

    <div class="container">
        <!--PAGE TITLE-->
        <div class="span9" style="text-align: center">
            <h2 style="font-weight: bold">LUYỆN ĐỌC PART 6</h2>
            <div class="page-header"></div>
        </div>

        <!-- /. PAGE TITLE-->
        <div class="row">
            <div class="span9" style="text-align: center">
                <!--Blog Post-->
                <div class="blog-post">
                    <h3>Tên Bài ĐọcĐọc</h3>
                    <input type="hidden" value="${baiTapDoc.id }" id="baiTapDocId">
                    <div class="postmetadata">
                        <a name="middle">
                            <ul>
                                <li>
                                  
                                        Độ khó - Dễ
                                   
                                        Độ khó - Trung bình
                                    
                                        Độ khó - Khó
                                  
                                </li>
                            </ul>
                        </a>
                    </div>
                    <img src="" style="width: 300px; height: 150px;">
                    <p>Read the texts that follow. A word or phrase is missing in some of the sentences. Four answer choices are given below each of the sentences. Select the best answer to complete the text.
                    </p>
                </div>

            </div>


            <div class="span9" style="text-align: left">
                <div id="cauHoi"></div>

                <div class="pagination" style="text-align: center">
                    <ul class="ul-pagination"></ul>
                </div>

                <hr align="center">

                <div class="span9" style="text-align: center">
                    <button class="btn btn-success" id="btnNopBai">Nộp bài</button>
                    <a class="btn btn-success hidden" id="btnBaiThiKhac" href="/webtoeic/bai-doc">Làm bài thi khác</a>
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

    <?php include "../../client/template/footer.php" ?>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="../../resources/js/client/baiDoc/lamBaiDocPart6.js"></script>

</body>

</html>