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
                                    <h4>Thêm nhóm câu hỏi</h4>
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
                                                        <form action="<?= base_url('dashboard/question-group/save') ?>" method="post">
                                                            <input type="hidden" name="part_number_id" value="">
                                                            <div class="general-info">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="title">Tiêu đề</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" value="" name="title" placeholder="Tiêu đề ..." required autofocus>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="level">Trạng thái</label>
                                                                        <div class="input-group">
                                                                            <select name="status" class="form-control" required>
                                                                                <option value="0">
                                                                                    Hiển thị
                                                                                </option>
                                                                                <option value="1">
                                                                                    Ẩn
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="partnumber">Part</label>
                                                                        <div style="height: 1px;" class="input-group">
                                                                            <select name="part_number" class="form-control js-example-basic-single">
                                                                                <?php if (isset($examPart) || !empty($examPart)) : ?>
                                                                                    <?php foreach ($examPart as $item) : ?>
                                                                                        <option value="<?= $item['id'] ?>">Part <?= $item['part_number'] ?></option>
                                                                                    <?php endforeach ?>
                                                                                <?php endif ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12  mb-3">
                                                                        <label for="paragraph">Đoạn văn</label>
                                                                        <textarea class="form-control" id="editor1" name="paragraph" required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 mb-3" id="question1">
                                                                    <label for="upload_audio">Upload tệp âm thanh cho nhóm câu hỏi</label>
                                                                    <input type="file" name="question_group_audio" id="filer_input_audio" onchange="return fileValidation()" accept=".mp3, .aac, .wav, .flac, .wma, .ogg, .aiff ,.alac" multiple="multiple">
                                                                </div>
                                                            </div>
                                                            <div class="border border-secondary rounded mb-3 repeater">
                                                                <div class="m-3">
                                                                    <div class="row" style="padding-top: 5px;">
                                                                        <div class="col-md-12">
                                                                            <label for="question">Câu hỏi</label>
                                                                            <div class="input-group">
                                                                                <textarea type="text" class="form-control" value="" name="questions[]" placeholder="Câu hỏi ..." rows="3" required autofocus></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                                    </div>
                                                                    <?php $i = 0 ?>
                                                                    <div class="form-list">
                                                                        <label for="questions">Câu trả lời</label>
                                                                        <div class="form-row" style="padding-top: 5px;" id="someId1">
                                                                            <div class="input-group">
                                                                                <input style="height: 41px;" type="text" name="options[<?= $i++ ?>][]" class="form-control" placeholder="Answer..." required>
                                                                                <button type="button" class="btn btn-success" onclick="addFormElements(this)">Thêm</button>
                                                                                <button type="button" class="btn btn-danger" onclick="removeFormElements(this)">Xóa</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="newque"></div>
                                                            <div class="row">
                                                                <div class="mb-3">
                                                                    <button id="QueAdder" type="button" class="btn btn-primary waves-effect waves-light m-r-20">Thêm câu hỏi</button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <!-- end of row -->
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <button type="submit" class="btn btn-primary btn-round waves-effect waves-light m-r-20">Lưu</button>
                                                            <a href="<?= base_url('dashboard/question-group/detail') ?>" id="edit-cancel" class="btn btn-default waves-effect">Huỷ</a>
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

<script type="text/javascript" src="<?= base_url() ?>\templates\libraries\bower_components\select2\js\select2.full.min.js"></script>

<script>
    CKEDITOR.replace('editor1');
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#QueAdder").click(function() {
            newQueAdd =
                $('#newque').
            append(`<div id="row">
                        <div class="border border-secondary rounded mb-3 repeater">
                            <div class="m-3">
                                <div class="row" style="padding-top: 5px;">
                                    <div class="col-md-12">
                                        <label for="question">Câu hỏi</label>
                                        <div class="row">
                                            <div class="form-group col-md-11">
                                                <textarea style="height: 40px;" type="text" class="form-control" value="" name="questions[]" placeholder="Câu hỏi ..." rows="1" required autofocus></textarea>
                                            </div>
                                            <div class="col-md-1 form-group">
                                                <button class="btn btn-danger " id="DeleteRow" type="button">
                                                <i class="bi bi-trash"></i> Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
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
                                </div>
                                <div class="form-list">
                                    <label for="questions">Câu trả lời</label>
                                    <div class="form-row" style="padding-top: 5px;" id="someId1">
                                        <div class="input-group">
                                            <input style="height: 41px;" type="text" name="options[<?= $i++ ?>][]" class="form-control" placeholder="Answer..." required>
                                            <button type="button" class="btn btn-success" onclick="addFormElements(this)">Thêm</button>
                                            <button type="button" class="btn btn-danger" onclick="removeFormElements(this)">Xóa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
        });

        $("body").on("click", "#DeleteRow", function() {
            const is_confirm = confirm(`Bạn muốn xóa câu hỏi ?`);
            if (!is_confirm) {
                return
            }
            $(this).parents("#row").remove();
        });
    });
</script>

<!-- js add answers -->
<script>
    function addFormElements(current) {

        $(current).parents('.form-list').append($(current).parents('.form-row').clone())
    }

    function removeFormElements(current) {
        const is_confirm = confirm(`Bạn muốn xóa câu trả lời ?`);
        if (!is_confirm) {
            return
        }

        if ($('.form-row').length === 1) {
            alert('Không thể xóa câu trả lời cuối cùng');
            return;
        }
        $(current).parents('.form-row').remove();
    }
</script>

<?= $this->endSection() ?>