<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bài test Toeic</title>

    <script src="<?= base_url() ?>resources/js/jquery-1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="<?= base_url() ?>resources/js/client/baiTestListening.js"></script>
    <script src="<?= base_url() ?>resources/js/client/baiTestReading.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
</head>


<style>
    .paragraph {
        white-space: pre-wrap;
        word-break: break-word;
        text-align: justify;
        background: #f3f7fa;
        color: #222;
        font-size: 14px;
        font-style: 'Roboto';
    }

    #main {
        padding-top: 120px;
        overflow: hidden;
    }

    @media (min-width : 767px) {
        #navigation {
            margin-top: 50px;
            position: fixed;
        }
    }

    .fix-scrolling {
        max-height: 600px;
        overflow-y: scroll;

    }

    .numberCircle {
        display: inline-block;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        font-size: 15px;
        line-height: 25px;
        text-align: center;
        border: 2px solid #666;
        margin: 5px 5px 5px 15px;
    }

    #time {
        font-size: 25px;
        margin-left: 100px;
        color: green
    }

    #backhome {
        margin-left: 25px;
        text-decoration: none;
    }

    #btnSubmit {
        margin-bottom: 15px;
        margin-left: 15px;
    }

    #btnResult {
        margin-bottom: 15px;
        margin-left: 25px;
    }

    #btndoAgain {
        display: none;
        margin-bottom: 15px;
        margin-left: 40px;
    }

    .web-font {
        font-size: 15px;
        font-family: 'Arial';
    }

    .audio-container {
        position: relative;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    .audio-player {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }

    .numberCircle.active {
        background-color: #ffcccb;
        /* Màu nền tô đậm khi câu hỏi được chọn */
    }
</style>

<script type="text/javascript">

</script>

<body>
    <!--Header
==========================-->
    <div class="testReading" id="testReading">
        <div class="navbar navbar-default navbar-fixed-top">
            <br>
            <div style="display: block;">
                <p>
                    <a href="<?= base_url('user') ?>" id="backhome" style="display: inline;">
                        Home</a> <span>Bài test Random</span>
                </p>
            </div>

            <!--
<div>
		<c:forEach begin="1" end="50" varStatus="loop">
			<div class="numberCircle" id="answer${loop.index}">${loop.index}</div>
		</c:forEach>
</div>

-->


        </div>


        <!--/End Header-->

        <div id="content" class="container-fluid fill">
            <form action="" method="post" id="submitForm" name="submitForm">
                <div class="row">
                    <div id="navigation" class="col-md-4 ">

                        <div class="fix-scrolling">
                            <br>
                            <div>
                                <span id="time">120:00</span>
                            </div>
                            <hr width="60%">
                            <?php $count = 0; ?>


                            <?php foreach ($question1 as $value) : ?>
                                <?php $count++; ?>
                                <div class="numberCircle" id="answer<?= $value['id'] ?>">
                                    <?= $count ?>
                                </div>
                            <?php endforeach ?>
                            <?php foreach ($question2 as $value) : ?>
                                <?php $count++; ?>
                                <div class="numberCircle" id="answer<?= $value['id'] ?>">
                                    <?= $count ?>
                                </div>
                            <?php endforeach ?>
                            <?php foreach ($question3 as $value) : ?>
                                <?php $count++; ?>
                                <div class="numberCircle" id="answer<?= $value['id'] ?>">
                                    <?= $count ?>
                                </div>
                            <?php endforeach ?>
                            <?php foreach ($question4 as $value) : ?>
                                <?php $count++; ?>
                                <div class="numberCircle" id="answer<?= $value['id'] ?>">
                                    <?= $count ?>
                                </div>
                            <?php endforeach ?>
                            <?php foreach ($question5 as $value) : ?>
                                <?php $count++; ?>
                                <div class="numberCircle" id="answer<?= $value['id'] ?>">
                                    <?= $count ?>
                                </div>
                            <?php endforeach ?>
                            <?php foreach ($question6 as $value) : ?>
                                <?php $count++; ?>
                                <div class="numberCircle" id="answer<?= $value['id'] ?>">
                                    <?= $count ?>
                                </div>
                            <?php endforeach ?>
                            <?php foreach ($question7 as $value) : ?>
                                <?php $count++; ?>
                                <div class="numberCircle" id="answer<?= $value['id'] ?>">
                                    <?= $count ?>
                                </div>
                            <?php endforeach ?>


                            <br> <br>
                            <!-- 	<input type="button" id="btndoAgain" class="btn btn-warning" value="Làm lại"> -->
                            <input type="button" class="btn btn-primary" id="btnResult" value="Chấm điểm" /> <input type="button" class="btn btn-danger" id="btnSubmit" value="Làm bài đọc" /> <br>
                            <hr width="60%">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Placeholder - keep empty -->
                    </div>

                    <!--Nội dung bài test -->
                    <div id="main" class="col-md-8 web-font">



                        <div class="part">
                            <!--- part 1--->
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <h2><b style="font-weight: bold;">Part <?= $part1[0]['part_number'] ?></b></h2>
                                    <p><b>Direction:</b> <?= $part1[0]['direction'] ?></p>
                                </div>
                                <div class="audio-container">
                                    <audio class="audio-player" controls>
                                        <source src="<?= base_url() ?>uploads/audios/<?= $audios1[0]['audio_name'] ?>" type="audio/wav">
                                    </audio>
                                </div>
                            </div>
                            <?php $count = 0; ?>
                            <?php foreach ($question1 as $value) : ?>

                                <?php $count++; ?>
                                <p><b>Question <?= $count ?>:</b> Mark your answer on your answer sheet.
                                    <!-- start img  -->
                                <div class="question_image">
                                    <?php foreach ($question_image as $image) : ?>
                                        <?php if ($image['question_id'] == $value['id']) { ?>
                                            <img width="500px" height="300px" src="<?= base_url() ?>uploads/images/<?= $image['image_name'] ?>" alt="Mô tả ảnh">
                                        <?php } ?>
                                    <?php endforeach ?>
                                </div>
                                <!-- end img  -->
                                <!-- start answer  -->
                                <div class="question_answer">
                                    <?php foreach ($question_answer as $answer) : ?>
                                        <?php if (($answer['question_id']) == ($value['id'])) { ?>
                                            <label class="radio-inline">
                                                <br><input type="radio" name="answer" value="<?= $answer['id'] ?>" id="question.<?= $value['id'] ?>" onclick="markColor(this.id)"><?= $answer['text'] ?><br><br>
                                            </label>
                                        <?php } ?>
                                    <?php endforeach ?>
                                </div>
                                <!-- end answer  -->

                            <?php endforeach ?>
                            <!--- part 2--->

                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <h2><b style="font-weight: bold;">Part <?= $part2[0]['part_number'] ?></b></h2>
                                    <p><b>Direction:</b> <?= $part2[0]['direction'] ?></p>
                                </div>
                                <div class="audio-container">
                                    <audio class="audio-player" controls>
                                        <source src="<?= base_url() ?>uploads/audios/<?= $audios2[0]['audio_name'] ?>" type="audio/wav">
                                    </audio>
                                </div>
                            </div>
                            <?php $count = 6; ?>
                            <?php foreach ($question2 as $value) : ?>

                                <?php $count++; ?>
                                <p><b>Question <?= $count ?>:</b> Mark your answer on your answer sheet.
                                <p>
                                    <?php foreach ($question_answer as $answer) : ?>
                                        <?php if (($answer['question_id']) == ($value['id'])) { ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="answer" value="answer" id="question.<?= $value['id'] ?>" onclick="markColor(this.id)" /> <?= $answer['text']; ?> <br>
                                            </label>
                                        <?php } ?>
                                    <?php endforeach ?>

                                <?php endforeach ?>

                                <!--- part 3--->
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <h2><b style="font-weight: bold;">Part <?= $part3[0]['part_number'] ?></b></h2>
                                        <p><b>Direction:</b> <?= $part3[0]['direction'] ?></p>
                                    </div>
                                    <div class="audio-container">
                                        <audio class="audio-player" controls>
                                            <source src="<?= base_url() ?>uploads/audios/<?= $audios3[0]['audio_name'] ?>" type="audio/wav">
                                        </audio>
                                    </div>
                                </div>
                                <?php $count = 31; ?>
                                <?php foreach ($question3 as $value) : ?>

                                    <?php $count++; ?>
                                    <p><b>Question <?= $count ?>:</b> <?= $value['question'] ?>:</b>
                                    <p>
                                        <?php foreach ($question_answer as $answer) : ?>
                                            <?php if (($answer['question_id']) == ($value['id'])) { ?>
                                                <input type="radio" name="answer" value="answer" id="question.<?= $value['id'] ?>" onclick="markColor(this.id)" /> <?= $answer['text']; ?> <br>
                                            <?php } ?>
                                        <?php endforeach ?>

                                    <?php endforeach ?>

                                    <!--- part 4--->
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <h2><b style="font-weight: bold;">Part <?= $part4[0]['part_number'] ?></b></h2>
                                            <p><b>Direction:</b> <?= $part4[0]['direction'] ?></p>
                                        </div>
                                        <div class="audio-container">
                                            <audio class="audio-player" controls>
                                                <source src="<?= base_url() ?>uploads/audios/<?= $audios4[0]['audio_name'] ?>" type="audio/wav">
                                            </audio>
                                        </div>
                                    </div>
                                    <?php $count = 70; ?>
                                    <?php foreach ($question4 as $value) : ?>

                                        <?php $count++; ?>
                                        <p><b>Question <?= $count ?>:</b> <?= $value['question'] ?></b>
                                        <p>
                                            <?php foreach ($question_answer as $answer) : ?>
                                                <?php if (($answer['question_id']) == ($value['id'])) { ?>
                                                    <input type="radio" name="answer" value="answer" id="question.<?= $value['id'] ?>" onclick="markColor(this.id)" /> <?= $answer['text']; ?> <br>
                                                <?php } ?>
                                            <?php endforeach ?>

                                        <?php endforeach ?>

                                        <!--- part 5--->
                                        <div class="panel panel-primary">
                                            <div class="panel-body">
                                                <h2><b style="font-weight: bold;">Part <?= $part5[0]['part_number'] ?></b></h2>
                                                <p><b>Direction:</b> <?= $part5[0]['direction'] ?></p>
                                            </div>
                                        </div>
                                        <?php $count = 100; ?>
                                        <?php foreach ($question5 as $value) : ?>

                                            <?php $count++; ?>
                                            <p><b>Question <?= $count ?>:</b> <?= $value['question'] ?></b>
                                            <p>
                                                <?php foreach ($question_answer as $answer) : ?>
                                                    <?php if (($answer['question_id']) == ($value['id'])) { ?>
                                                        <input type="radio" name="answer" value="answer" id="question.<?= $value['id'] ?>" onclick="markColor(this.id)" /> <?= $answer['text']; ?> <br>
                                                    <?php } ?>
                                                <?php endforeach ?>

                                            <?php endforeach ?>

                                            <!--- part 6--->
                                            <div class="panel panel-primary">
                                                <div class="panel-body">
                                                    <h2><b style="font-weight: bold;">Part <?= $part6[0]['part_number'] ?></b></h2>
                                                    <p><b>Direction:</b> <?= $part6[0]['direction'] ?></p>
                                                </div>
                                            </div>

                                            <?php $count = 130; ?>
                                            <?php foreach ($group6 as  $group) : ?>
                                                <div class="panel panel-primary">
                                                    <div class="panel-body">
                                                        <p><b>Direction: </b><?= $group['title'] ?></p>
                                                        <?php
                                                        $text = $group['paragraph'];
                                                        // Thay thế các số 1,2,3,4 bằng số thứ tự câu hỏi
                                                        $text = str_replace("----1---", "----" . $count + 1. . "---", $text);
                                                        $text = str_replace("----2---", "----" . $count + 2. . "---", $text);
                                                        $text = str_replace("----3---", "----" . $count + 3. . "---", $text);
                                                        $text = str_replace("----4---", "----" . $count + 4. . "---", $text);
                                                        ?>

                                                        <p><?= $text ?></p>
                                                    </div>
                                                </div>
                                                <?php foreach ($question6 as $value) : ?>

                                                    <?php if (($value['question_group_id']) == ($group['id'])) { ?>
                                                        <?php $count++; ?>
                                                        <p><b>Question <?= $count ?>:</b> <?= $value['question'] ?></p>

                                                        <p>
                                                            <?php foreach ($question_answer as $answer) : ?>
                                                                <?php if (($answer['question_id']) == ($value['id'])) { ?>
                                                                    <input type="radio" name="answer" value="answer" id="question.<?= $count ?>" onclick="markColor(this.id)" /> <?= $answer['text']; ?> <br>
                                                                <?php } ?>
                                                            <?php endforeach ?>
                                                        <?php } ?>
                                                    <?php endforeach ?>
                                                <?php endforeach ?>


                                                <!--- part 7--->
                                                        <div class="panel panel-primary">
                                                            <div class="panel-body">
                                                                <h2><b style="font-weight: bold;">Part <?= $part7[0]['part_number'] ?></b></h2>
                                                                <p><b>Direction:</b> <?= $part6[0]['direction'] ?></p>
                                                            </div>
                                                        </div>
                                                        <?php $count = 146; ?>
                                                        <?php foreach ($group7 as  $group) : ?>
                                                            <div class="panel panel-primary">
                                                                <div class="panel-body">
                                                                    <p><b>Direction: </b><?= $group['title'] ?></p>
                                                                    <?php
                                                                    $text = $group['paragraph'];
                                                                    // Thay thế các số 1,2,3,4 bằng số thứ tự câu hỏi
                                                                    $text = str_replace(". &mdash; [1] &mdash;.", " . &mdash; [" . $count + 1. . "] &mdash;.", $text);
                                                                    $text = str_replace(". &mdash; [2] &mdash;.", " . &mdash; [" . $count + 2. . "] &mdash;.", $text);
                                                                    $text = str_replace(". &mdash; [3] &mdash;.", " . &mdash; [" . $count + 3. . "] &mdash;.", $text);
                                                                    $text = str_replace(". &mdash; [4] &mdash;.", " . &mdash; [" . $count + 4. . "] &mdash;.", $text);
                                                                    ?>

                                                                    <p><?= $text ?></p>
                                                                </div>
                                                            </div>
                                                            <?php foreach ($question7 as $value) : ?>

                                                                <?php if (($value['question_group_id']) == ($group['id'])) { ?>
                                                                    <?php $count++; ?>
                                                                    <p><b>Question <?= $count ?>:</b> <?= $value['question'] ?></p>
                                                                    <p>
                                                                        <?php foreach ($question_answer as $answer) : ?>
                                                                            <?php if (($answer['question_id']) == ($value['id'])) { ?>
                                                                                <input type="radio" name="answer" value="answer" id="question.<?= $count ?>" onclick="markColor(this.id)" /> <?= $answer['text']; ?> <br>
                                                                            <?php } ?>
                                                                        <?php endforeach ?>
                                                                    <?php } ?>
                                                                <?php endforeach ?>
                                                            <?php endforeach ?>
                                                            <hr>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <!--Footer
==========================-->

    <!--/.Footer-->
    <script>
        function highlightNumberCircle(questionId) {
            // Xóa tất cả các đối tượng có class "active"
            let numberCircles = document.getElementsByClassName("numberCircle");
            for (let i = 0; i < numberCircles.length; i++) {
                numberCircles[i].classList.remove("active");
            }

            // Thêm class "active" vào đối tượng có id tương ứng với câu hỏi được chọn
            let selectedNumberCircle = document.getElementById("answer" + questionId);
            if (selectedNumberCircle) {
                selectedNumberCircle.classList.add("active");
            }
        }

        function markColor(id) {
            //tách lấy id của câu hỏi
            var fields = id.split('.');
            var answerId = fields[1];
            document.getElementById("answer" + answerId).style.backgroundColor = "rgb(167,162,162)";

        }
    </script>
</body>

</html>
