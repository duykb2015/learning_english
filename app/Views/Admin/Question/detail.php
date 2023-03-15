<?= $this->extend('Admin/layout') ?>
<?= $this->section('content') ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-12">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Thêm câu hỏi </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">

                    <!--profile cover end-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- tab content start -->
                            <div class="tab-content">
                                <!-- tab panel personal start -->
                                <div class="tab-pane active" id="personal" role="tabpanel">
                                    <!-- personal card start -->
                                    <div class="card">
                                        <div class="card-header">

                                            <!-- <div class="alert alert-danger">
                                                <div class="col-10">
                                                    Error
                                                </div>
                                                <div class="col-1 text-right">
                                                    <span aria-hidden="true" id="remove-alert">&times;</span>
                                                </div>
                                            </div> -->

                                            <!-- <div class="alert alert-danger mb-1">
                                                <div class="row">
                                                    <div class="col-11">
                                                        Error
                                                    </div>
                                                    <div class="col-1 text-right">
                                                        <span aria-hidden="true" id="remove-alert">&times;</span>
                                                    </div>
                                                </div>
                                            </div> -->

                                        </div>

                                        <div class="card-block">
                                            <div class="edit-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form class="needs-validation" action="<?= base_url('dashboard/admin/save') ?>" method="post">
                                                            <input type="hidden" name="id" value="">
                                                            <div class="general-info">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="question">Câu hỏi</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" value="" name="question" placeholder="Câu hỏi ..." required autofocus>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="group_question">Loại câu hỏi</label>
                                                                        <div class="input-group">
                                                                            <select name="group_question" class="form-control" required>
                                                                                <option value="" disabled selected>
                                                                                    --Chọn loại câu hỏi--
                                                                                </option>
                                                                                <option value="0">Câu hỏi nghe</option>
                                                                                <option value="1">Câu hỏi đọc</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="result">Câu trả lời</label>
                                                                        <div class="input-group">
                                                                            <textarea class="form-control" name="result" rows="6" placeholder="Vd: A.Yes, B.No ..." required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="username">Đáp án đúng</label>
                                                                        <div class="input-group">
                                                                            <select name="result_true" class="form-control" id="validationCustom04" required>
                                                                                <option selected disabled value="">
                                                                                    --Chọn đáp án đúng--
                                                                                </option>
                                                                                <option value="A">A</option>
                                                                                <option value="B">B</option>
                                                                                <option value="C">C</option>
                                                                                <option value="D">D</option>
                                                                            </select>
                                                                    
                                                                        </div>
                                                                        <label for="part_question">Phần câu hỏi</label>
                                                                        <div class="input-group">
                                                                            <select name="part" class="form-control" required>
                                                                                <option value="" disabled selected>
                                                                                    --Chọn phần câu hỏi--
                                                                                </option>
                                                                                <option value="0">1</option>
                                                                                <option value="1">2</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    
                                                                    <div class="col-md-6">
                                                                        <label for="username">Nhóm câu hỏi</label>
                                                                        <div class="input-group">
                                                                            <select name="group" class="form-control" required>
                                                                                <option value="" disabled selected>
                                                                                    --Chọn nhóm câu hỏi--
                                                                                </option>
                                                                                <option value="0">Không</option>
                                                                                <option value="1">Đoạn</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                               
                                                                    <div class="col-md-6">
                                                                        <label for="status">Trạng thái</label>
                                                                        <div class="input-group">
                                                                            <select name="status" class="form-control" required>
                                                                                <option value="" disabled selected>
                                                                                    --Chọn trạng thái--
                                                                                </option>
                                                                                <option value="1">Hiển thị</option>
                                                                                <option value="0">Ẩn</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12 mb-3" id="question">
                                                                        <label for="upload_image">Upload tệp hình ảnh</label>
                                                                        <input type="file" name="question_image" id="filer_input_image" onchange="return fileValidation()" accept=".jpg, .png, .jpeg, .gif, .psd" required>
                                                                    </div>
                                                                    <div class="col-md-12 mb-3" id="question1">
                                                                        <label for="upload_audio">Upload tệp âm thanh</label>
                                                                        <input type="file" name="question_audio" id="filer_input_audio" onchange="return fileValidation()" accept=".mp3, .aac, .wav, .flac, .wma, .ogg, .aiff ,.alac" multiple="multiple" required>
                                                                    </div>
                                                                </div>

                                                                <!-- end of row -->
                                                                <div class="row">
                                                                    <div class="col-md-12 text-right">
                                                                        <button type="submit" class="btn btn-primary btn-round waves-effect waves-light m-r-20">Lưu</button>
                                                                        <a href="<?= base_url('dashboard/question/detail') ?>" id="edit-cancel" class="btn btn-default waves-effect">Huỷ</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end of edit info -->
                                                        </form>
                                                    </div>
                                                    <!-- end of col-lg-12 -->
                                                </div>
                                                <!-- end of row -->
                                            </div>
                                        </div>
                                        <!-- end of card-block -->
                                    </div>
                                    <!-- personal card end-->
                                </div>

                            </div>
                            <!-- tab content end -->
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main body end -->
    </div>
</div>
<?= $this->endSection() ?>