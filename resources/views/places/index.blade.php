<!-- timeline item -->
<?php
foreach ($tips as $tip) {
    $answersHtml = '';
    foreach ($tip->answers as $answer) {
        $answersHtml .= '<div class="ans">
                            <div class="col-md-12">
                                <!-- answer -->
                                ' . $answer->text . '
                                <!-- user full name -->
                                <a class="pull-left" href="/user/' . $answer->username . '">' . $answer->name . ' </a>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group pull-right " style="margin-top: 20px;">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-thumbs-up"></i></button>
                                    <button class="btn btn-default btn-sm" disabled="">123</button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-thumbs-down"></i></button>
                                </div>
                                <a class="btn btn-danger btn-xs pull-left"style="margin-top: 20px;">گزارش تخلف</a>
                            </div>
                        </div>' ;
    }
    echo '<li>
    <i class="fa fa-envelope bg-blue"></i>
    <div class="timeline-item">
        <!-- datetime -->
        <span class="time pull-left"><i class="fa fa-clock-o"></i> 12:05</span>
        <h3 class="timeline-header">
            <!-- question title -->
            ' . $tip->title . '
            <!-- user full name -->
            <a href="#" class="pull-left">' . $tip->name . '</a>
        </h3>
        <div class="timeline-body">
            <!-- question content -->
           ' . $tip->text . '
            <br/>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-danger btn-xs pull-left" style="margin-top: 10px;">گزارش تخلف</a>
                    <button type="button" class="btn btn-info center-block" data-toggle="collapse" data-target="#answer1">
                        جواب ها
                        <i class="fa  fa-arrow-circle-down "></i>
                    </button>
                    <div class="btn-group pull-right " style="margin-top: -30px;">
                        <button class="btn btn-default btn-sm"><i class="fa fa-thumbs-up"></i></button>
                        <button class="btn btn-default btn-sm" disabled="">123</button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-thumbs-down"></i></button>
                    </div>
                </div>

            </div>
            <!-- answers -->
            '. $answersHtml . '
            <!-- /answers -->
        </div>
        <div class="timeline-footer">
        </div>
    </div>
</li>';
}
?>

