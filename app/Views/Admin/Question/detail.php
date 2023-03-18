<?= $this->section('css') ?>

<link rel="stylesheet" href="<?= base_url() ?>\templates\libraries\bower_components\select2\css\select2.min.css">



<?= $this->endSection() ?>

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
                                                        <form class="needs-validation" action="<?= base_url('dashboard/question/save') ?>" method="post">
                                                            <input type="hidden" name="id" value="">
                                                            <div class="general-info">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="question">Câu hỏi</label>
                                                                        <div class="input-group">
                                                                            <textarea type="text" class="form-control" value="" name="question" placeholder="Câu hỏi ..." rows="1" required autofocus></textarea>
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
                                                                        <label for="result">Câu trả lời A</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control" name="resultA" placeholder="Vd: A.Yes..." required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="result">Câu trả lời B</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control" name="resultB" placeholder="Vd: B.Yes..." required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="result">Câu trả lời C</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control" name="resultC" placeholder="Vd: C.Yes..." required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="result">Câu trả lời D</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control" name="resultD" placeholder="Vd: D.Yes...">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="username">Đáp án đúng</label>
                                                                    <div class="input-group">
                                                                        <select name="result_true" class="form-control" id="validationCustom04" required>
                                                                            <option selected disabled value="">
                                                                                --Chọn đáp án đúng--
                                                                            </option>
                                                                            <option value="1">A</option>
                                                                            <option value="2">B</option>
                                                                            <option value="3">C</option>
                                                                            <option value="4">D</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="part_question">Part</label>

                                                                    <div style="height: 1px;" class="input-group">
                                                                        <select class="form-control js-example-basic-single" name="part" required>
                                                                            <option value="" selected disabled>--Chọn Part--</option>
                                                                            <option value="1">Alabama</option>
                                                                            <option value="2">Wyoming</option>
                                                                            <option value="3">Peter</option>
                                                                            <option value="4">Hanry Die</option>
                                                                            <option value="5">John Doe</option>

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
                                                                    <input type="file" name="question_image" id="filer_input_image" onchange="return fileValidation()" accept=".jpg, .png, .jpeg, .gif, .psd" multiple="multiple" required>
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
<?= $this->section('js') ?>

<!-- Select 2 js -->
<script type="text/javascript" src="<?= base_url() ?>\templates\libraries\bower_components\select2\js\select2.full.min.js"></script>
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
    function matchStart(params, data) {
        // If there are no search terms, return all of the data

        // if ($.trim(params.term) === '') {
        //     return data;
        // }
        // // Skip if there is no 'children' property
        // if (typeof data.children === '') {
        //     return null;
        // }
        // // `data.children` contains the actual options that we are matching against
        // var filteredChildren = [];
        // $.each(data.children, function(idx, child) {
        //     if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
        //         filteredChildren.push(child);
        //     }
        // });
        // // If we matched any of the timezone group's children, then set the matched children on the group
        // // and return the group object
        // if (filteredChildren.length) {
        //     var modifiedData = $.extend({}, data, true);
        //     modifiedData.children = filteredChildren;
        //     // You can return modified objects from here
        //     // This includes matching the `children` how you want in nested data sets
        //     return modifiedData;
        // }
        // // Return `null` if the term should not be displayed
        // return null;
    }
    $(".js-example-basic-single").select2({
        // matcher: matchStart

    });
</script>
<?= $this->endSection() ?>