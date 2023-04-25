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
            <div class="page-header"></div>
                <h4 style="font-weight: bold;">TIN TỨC</h4>
            </div>
        </div>
        <div class="span3">
            <div class="navbar  pull-right">
                <div>
                    <input type="text" class="form-control" id="searchGrammar" placeholder="Tìm kiếm tin tức ..." style="width: 300px; margin-top:6px;margin-right:-40px;" name="search" onkeyup="Search()">
                </div>
            </div>
        </div>
    </div>
    <!-- /. PAGE TITLE-->
    <div id="resultsearchGrammar">
        <div class="row">

            <div class="span9">

                <div class="span9" style="display:flex ;">
                    <?php for ($x = 0; $x <= 2; $x++) {?>
                        <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="<?= base_url() ?>resources/file/images/baiNgheId=9.png" alt="" /></div>
                                <div>
                                    <a href="" class="d-block fh5co_small_post_heading"><span class="">123</span></a>
                                    <div class="c_g"><i class="fa fa-clock-o">27012001</i> </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <br>
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


        <div class="paging">

            <a href="">Back</a>


            <a class="current">1</a>



            <a href="">2</a>




            <a class="current">3</a>


            <a href="">4</a>



            <a href="" class="pageNext">Next</a>

        </div>


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
