<?= $this->extend('User/layout') ?>
<?= $this->section('content') ?>
<style type="text/css">
    .hidden {
        display: none;
    }

    .error-message {
        color: red;
    }

    .anchor {
        display: block;
        height: 115px;
        /*same height as header*/
        margin-top: -115px;
        /*same height as header*/
        visibility: hidden;
    }

    .imageGrammar {
        float: left;
        height: 150px;
        width: 250px;
        margin-bottom: 25px;
    }

</style>


<input style="display:none;" id="baseUrl" value="" />
<div class="container">
    <!--PAGE TITLE-->
    <div class="row">
        <div class="span9" style="text-align: center">
            <div class="page-header">
                <h4 style="font-weight: bold;">TIN TỨC</h4>
            </div>
        </div>
        <div class="span3">

        </div>
    </div>
    <!-- /. PAGE TITLE-->
    <div id="resultsearchGrammar">
        <div class="row">

            <div class="span9">

                <div class="blog-single gray-bg">
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col-lg-8 m-15px-tb">
                                <article class="article">
                                    <div class="article-img">
                                        <img src="https://www.bootdey.com/image/800x350/87CEFA/000000" title="" alt="">
                                    </div>
                                    <div class="article-title">
                                        <h4><a href="#">Danh Mục</a></h4>
                                        <h2>description</h2>
                                        <div class="media">

                                            <div class="media-body">
                                                <label>Admin</label>
                                                <span>Ngày Đăng</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-content">
                                        <p><b>Nội Dung</b> TOEIC 4 kỹ năng có gì khác so với TOEIC 2 kỹ năng? Cấu trúc và lệ phí thi TOEIC là 4 kỹ năng là bao nhiêu?
                                            TOEIC 4 kỹ năng sẽ thử thách người thi về cả 4 phần Nghe, Nói, Đọc, Viết với nội dung xoay quanh môi trường sinh sống và làm việc chuyên nghiệp quốc tế.

                                            Bài thi TOEIC 4 kỹ năng bao gồm 2 bài thi: Mặc định và Tùy chọn. Bài thi Mặc định là bài thi Listening và Reading, bài thi Tùy chọn là bài thi Speaking và Writing.

                                            Lệ phí thi TOEIC 4 kỹ năng: Đối với bài thi Nghe và Đọc là 900.000đ (lệ phí ở IIG), đối với bài thi Nói và Viết khoảng 1.860.000đ.

                                            Cùng Athena khám phá xem mỗi bài thi bao gồm những nội dung đặc biệt nhé!


                                            Bài thi Listening và Reading
                                            Các bạn chắc hẳn đã cảm thấy rất quen thuộc với bài thi này vì nó đang được sử dụng rất phổ biến. Bài thi Nghe và Đọc có số điểm tối đa cho mỗi phần thi là 495 điểm. Tổng điểm cả 2 phần thi là 990 điểm. Mỗi phần thi sẽ có 100 câu hỏi và được chia làm 7 part: Bài thi Nghe từ part 1 đến part 4, Bài thi Đọc từ part 5 đến part 7.

                                            Vì bài thi Nghe và Đọc đã quá quen thuộc với các bạn rồi nên Athena sẽ chỉ lướt qua những chi tiết quan trọng nhất thôi, Athena sẽ tập trung chủ yếu vào giải đáp các băn khoăn của bạn về bài thi Speaking và Writing nhé!


                                            Bài thi Speaking và Writing
                                            Bài thi TOEIC 4 kỹ năng sẽ thử thách bạn về khả năng giao tiếp tiếng Anh trôi chảy cũng như là khả năng vận dụng tiếng Anh trong việc soạn thảo văn bản, trả lời thư điện tử,.. trong môi trường làm việc chuyên nghiệp quốc tế.

                                            Bài thi TOEIC Nói và Viết có số điểm tối đa mỗi phần thi là 200 điểm, tổng số điểm 2 phần thi sẽ là 400 điểm. Có một điểm đặc biệt là, bài thi Nói và Viết sẽ được làm trên máy tính và bài thi sẽ được lưu lại trong dữ liệu của Hội đồng thi để đảm bảo yếu tố khách quan.

                                            Athena sẽ đưa ra cấu trúc bài thi Nói để các bạn tham khảo:</p>
                                    </div>

                                </article>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="span3">
                <div class="side-bar">

                    <h3>DANH MỤC</h3>
                    <ul class="nav nav-list">
                        <li><a href="#">LUYỆN BÀI NGHE</a></li>
                        <li><a href="#">LUYỆN BÀI ĐỌC</a></li>
                        <li><a href="#">THI THỬ</a></li>
                        <li><a href="#r">HỌC NGỮ PHÁP</a></li>
                        <li><a href="#">HỌC TỪ VỰNG</a></li>
                    </ul>

                </div>
            </div>

        </div>




        <!--Pagination-->





    </div>

    <!--/.End Pagination-->
</div>
<br>
<br>
<br>
<br>
<br>
<br>

<?= $this->endSection() ?>
