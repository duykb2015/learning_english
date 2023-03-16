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
                                    <h4>Thêm câu hỏi Excel </h4>
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
                                                        <form action="#" method="#">
                                                            <input type="hidden" name="id" value="">
                                                            <div class="general-info">
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <label for="status">Loại câu hỏi</label>
                                                                        <div class="input-group">
                                                                            <select name="group_question" class="form-control" require>
                                                                                <option value="" disabled selected>
                                                                                    --Chọn loại câu hỏi--
                                                                                </option>
                                                                                <option value="0">Câu hỏi nghe</option>
                                                                                <option value="1">Câu hỏi đọc</option>
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
                                                                                <option value="0">Hiển thị</option>
                                                                                <option value="1">Ẩn</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="password">Upload tệp Excel</label>
                                                                        <input type="file" name="files_excel" id="filer_input_exceln" onchange="return fileValidation()" accept=".xlsx, .xls" multiple="multiple" required>
                                                                    </div>
                                                                    <div class="col-md-12 mb-3" id="question">
                                                                        <label for="password">Upload tệp hình ảnh</label>
                                                                        <input type="file" name="question_image" id="filer_input_imagen" onchange="return fileValidation()" accept=".jpg, .png, .jpeg, .gif, .psd" required>
                                                                    </div>
                                                                    <div class="col-md-12 mb-3" id="question1">
                                                                        <label for="password">Upload tệp âm thanh</label>
                                                                        <input type="file" name="question_audio" id="filer_input_audion" onchange="return fileValidation()" accept=".mp3, .aac, .wav, .flac, .wma, .ogg, .aiff ,.alac" multiple="multiple" required>
                                                                    </div>

                                                                </div>
                                                                <!-- end of row -->
                                                                <div class="row">
                                                                    <div class="col-md-12 text-right">
                                                                        <button type="submit" class="btn btn-primary btn-round waves-effect waves-light m-r-20">Lưu</button>
                                                                        <a href="<?= base_url('dashboard/question/upload-excel') ?>" id="edit-cancel" class="btn btn-default waves-effect">Huỷ</a>
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
<?= $this->section('js') ?>
<!-- ajax hidden upload file -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="group_question"]').on('change', function() {
            var eins = $(this).val();
            console.log(eins);
            if (eins == "1") {
                $('#filer_input_image').attr('disabled', 'disabled');
                $('#filer_input_audio').attr('disabled', 'disabled');
                $('#question').attr('hidden', '');
                $('#question1').attr('hidden', '');
            } else {
                $('#filer_input_image').removeAttr('disabled');
                $('#filer_input_audio').removeAttr('disabled');
                $('#question').removeAttr('hidden', '');
                $('#question1').removeAttr('hidden', '');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

                'use-strict';

                //Example single
                $('#filer_input_single').filer({
                    extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
                    changeInput: true,
                    showThumbs: true,
                    addMore: false
                });

                //Example 2
                $('#filer_input_exceln').filer({
                    limit: null,
                    maxSize: null,
                    // extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
                    extensions: ['xlsx', 'xls', 'csv'],
                    changeInput: true,
                    showThumbs: true,
                    addMore: true,

                    captions: {
                        button: "Chọn tệp Excel",
                        feedback: "Chọn files để Upload",
                        feedback2: "files đã được chọn",
                        drop: "Drop file here to Upload",
                        removeConfirmation: "Bạn có muốn xóa file khỏi upload ?",
                        errors: {
                            filesLimit: "Chỉ cho phép {{fi-limit}} files được upload lên hệ thống !.",
                            filesType: "Vui lòng chọn đúng định dạng file excel vd: *.xlsx,*.xls !",
                            filesSize: "{{fi-name}} kích thước quá lớn! Vui lòng upload file dưới {{fi-maxSize}} MB.",
                            filesSizeAll: "Tất cả các file tổng dung lượng quá lớn! Vui lòng upload dưới {{fi-maxSize}} MB."
                        }
                    }
                });
                $('#filer_input_audion').filer({
                    limit: null,
                    maxSize: null,
                    // extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
                    extensions: ['mp3', 'aac', 'wav', 'flac', 'wma', 'ogg', 'aiff', 'alac'],
                    changeInput: true,
                    showThumbs: true,
                    addMore: true,

                    captions: {
                        button: "Chọn tệp âm thanh",
                        feedback: "Chọn files để Upload",
                        feedback2: "files đã được chọn",
                        drop: "Drop file here to Upload",
                        removeConfirmation: "Bạn có muốn xóa file khỏi upload ?",
                        errors: {
                            filesLimit: "Chỉ cho phép {{fi-limit}} files được upload lên hệ thống !.",
                            filesType: "Vui lòng chọn đúng định dạng file âm thanh vd: *.mp3,*.wav,... !",
                            filesSize: "{{fi-name}} kích thước quá lớn! Vui lòng upload file dưới {{fi-maxSize}} MB.",
                            filesSizeAll: "Tất cả các file tổng dung lượng quá lớn! Vui lòng upload dưới {{fi-maxSize}} MB."
                        }
                    }
                });
                $('#filer_input_imagen').filer({
                    limit: null,
                    maxSize: null,
                    extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
                    changeInput: true,
                    showThumbs: true,
                    addMore: true,

                    captions: {
                        button: "Chọn tệp hình ảnh",
                        feedback: "Chọn files để Upload",
                        feedback2: "files đã được chọn",
                        drop: "Drop file here to Upload",
                        removeConfirmation: "Bạn có muốn xóa file khỏi upload ?",
                        errors: {
                            filesLimit: "Chỉ cho phép {{fi-limit}} files được upload lên hệ thống !.",
                            filesType: "Vui lòng chọn đúng định dạng file hình ảnh vd: *.jpg,*.png,.. !",
                            filesSize: "{{fi-name}} kích thước quá lớn! Vui lòng upload file dưới {{fi-maxSize}} MB.",
                            filesSizeAll: "Tất cả các file tổng dung lượng quá lớn! Vui lòng upload dưới {{fi-maxSize}} MB."
                        }
                    }
                });
            });
</script>
<?= $this->endSection() ?>