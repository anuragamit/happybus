

<div class="page-content">
          <div class="header">
            <h2>Schedule  <strong>Ride</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="#">Schedule Ride</a>
                </li>
                <li><a href="forms.html">Schedule Ride</a>
                </li>
                <li class="active">Schedule Ride</li>
              </ol>
            </div>
          </div>
          <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </div>
          <div class="row">
            <div class="col-lg-12 portlets ui-sortable">
              <div class="panel">
                <div class="panel-header panel-controls ui-sortable-handle">
                  <h3><i class="fa fa-bus" ></i> Schedule  <strong>Ride</strong></h3>
                <div class="control-btn"><a href="#" class="panel-reload hidden"><i class="icon-reload"></i></a><a class="hidden" id="dropdownMenu1" data-toggle="dropdown"><i class="icon-settings"></i></a><ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"><li><a href="#">Action</a></li><li><a href="#">Another action</a></li><li><a href="#">Something else here</a></li></ul><a href="#" class="panel-popout hidden tt" title="Pop Out/In"><i class="icons-office-58"></i></a><a href="#" class="panel-maximize hidden"><i class="icon-size-fullscreen"></i></a><a href="#" class="panel-toggle"><i class="fa fa-angle-down"></i></a><a href="#" class="panel-close"><i class="icon-trash"></i></a></div></div>
                <div class="panel-content">
                    <form action="<?php echo base_url(); ?>parents/schedulemap" method="POST">

                <div class="row">
  <div class="col-sm-6"> <div class="form-group">
                        <label class="form-label">One Way Trip</label>
                        <input type="radio" name="schedule_ride" class="form-control" placeholder="Enter Name" required="required">
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                    
                        <label class="form-label">Round Way</label>
                        <input type="radio" name="schedule_ride" class="form-control" placeholder="Enter Mobile">
                        <span class="text-danger"><?php echo form_error('mob'); ?></span>
                     
                     
                        <label class="form-label">Schedule A Trip</label>
                        <input type="radio"  name="schedule_ride" class="form-control" placeholder="Enter Email">
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                      </div>
                    
                    </div>
 

                      <div class="col-sm-6"> <div class="form-group">
                     
  <select class="select2" multiple="" data-placeholder="Select a Student" style="width:330px;"  data-select2-id="7" tabindex="-1" aria-hidden="true" required>
  <?php 
   foreach($scheduleride as $key=> $val) {
?>
<option data-select2-id="29"><?php echo $val['student_name']; ?></option>
<?php
}

?>
</select>
                       
 
</div>
<button type="submit" value="submit" class="btn btn-primary m-t-20">Go!<div class="ripple-wrapper"></div></button>

<form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </div>



<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/multiselect/jquery.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/multiselect/select2.full.min.js"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

        











        