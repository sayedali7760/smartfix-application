<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JobtypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Types';
$this->params['main_menu'][] = 'General Settings';
$this->params['breadcrump'][] = [
    ['link' => 'site/index', 'title' => 'Home'],
    ['link' => 'jobtype/index', 'title' => 'General Settings'],
    ['title' => 'Job Types']
];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div id="main">
    <div class="row">
        <?php include(Yii::getAlias('@app/views/settings_menu/work_process_settings.php')); ?>
        <div class="col-md-10 animate fadeRight" style="margin-top: -12px;">
            <div class="card">
                <div class="card-content">
                    <div class="job-type-index">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">Work Enquiry</h3>
                                </div>
                                <div class="col-md-6" style="text-align: end;">
                                    <?= Html::a('Add Work Enquiry', null, ['onclick' => 'show_add_section()', 'class' => 'btn btn-small'])
                                    ?>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div id="add_section" class="animate fadeRight">
                            <div class="">
                                <div class="stepwizard">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step col-xs-3">
                                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                            <p><small>Customer Details</small></p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3">
                                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                            <p><small>Job Details</small></p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3">
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                            <p><small>Material & Numbering</small></p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3">
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                            <p><small>Packing & Delivery</small></p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3">
                                            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                                            <p><small>Other Informations</small></p>
                                        </div>
                                    </div>
                                </div>

                                <form role="form">
                                    <div class="panel panel-primary setup-content animate fadeRight" id="step-1">
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="padding-left: 16px;">Customer Details</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label">Customer</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Select Customer" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Mode</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Select Mode" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Contact Person</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Contact Person" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Cash/Credit</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Cash/Credit" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6">
                                                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary setup-content animate fadeRight" id="step-2">
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="padding-left: 16px;">Job Details</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label">Type of Job</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Select Type of Job" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Job Summary</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Job Summary" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Total Quantity</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Total Quantity" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Unit</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Unit" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Credit Period</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Credit Period" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="padding-left: 16px;">Work Details</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label">Particulars</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Particulars" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Details</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Details" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6">
                                                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary setup-content animate fadeRight" id="step-3">
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="padding-left: 16px;">Material & Numbering</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label">Paper Type</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Select Paper Type" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Description</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Description" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">NCR Paper Col</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter NCR Paper Col" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Remarks</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Remarks" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="padding-left: 16px;">Numbering Details</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label">Alphabets Used</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Alphabets Used" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Sl. No. Starts From</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Sl. No. Starts From" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Book Number</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Book Number" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Number Of Pages</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Number Of Pages" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Remarks</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter remarks" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6">
                                                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary setup-content  animate fadeRight" id="step-4">
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="padding-left: 16px;">Packing & Delivery</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label">Total Quantity</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Total Quantity" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">No. of Bundles</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter No. of Bundles" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Quantity in a Pack</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Quantity in a Pack" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Material of Packing</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Material of Packing" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Supply Address</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Supply Address" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Remarks</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter remarks" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6">
                                                    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-primary setup-content  animate fadeRight" id="step-5">
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="padding-left: 16px;">Other Information</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label">Total Quantity</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Total Quantity" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Fin Size CM</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Fin Size CM" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Open Size CM</label>
                                                    <input maxlength="100" type="text" class="form-control" placeholder="Enter Quantity in a Pack" />
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6">
                                                    <button class="btn btn-primary nextBtn pull-right" type="button">Finish</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-success').addClass('btn-default');
                $item.addClass('btn-success');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function() {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            // $(".form-group").removeClass("has-error");
            // for (var i = 0; i < curInputs.length; i++) {
            //     if (!curInputs[i].validity.valid) {
            //         isValid = false;
            //         $(curInputs[i]).closest(".form-group").addClass("has-error");
            //     }
            // }

            if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-success').trigger('click');
    });

    function show_add_section() {
        $("#add_section").toggle(500);
        $('#add_section').show();
    }
</script>