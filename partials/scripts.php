<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.bundle.min.js"></script>
<script src="../public/js/detect.js"></script>
<script src="../public/js/waves.js"></script>
<script src="../public/js/jquery.nicescroll.js"></script>
<script src="../public/plugins/switchery/switchery.min.js"></script>

<!-- App js -->
<script src="../public/js/jquery.core.js"></script>
<script src="../public/js/jquery.app.js"></script>
<!-- Summernote Editor CDN -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- Data Tables CDN -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script>
    /* Init Data Tables */
    $(document).ready(function() {
        $('.table').DataTable();
    });
    /* Load Summernotes */
    $(document).ready(function() {
        $('.Summernote').summernote({
            height: 300,
            focus: true,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['height', ['height']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });
    });

    /* Export Functionalities On Data Tables */
    $(document).ready(function() {
        $('#export-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    /* Limit Only One Check Box */
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('Login_Rank')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
    /* 
    Ajaxes
     */
    function GetFacultyDetails(val) {
        /* Faculty Details */
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'FacultyName=' + val,
            success: function(data) {
                //alert(data);
                $('#FacultyID').val(data);
            }
        });
    }

    function GetDepartmentDetails(val) {
        /* Department Details */
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'DepartmentName=' + val,
            success: function(data) {
                //alert(data);
                $('#DepartmentID').val(data);
            }
        });
    }

    function GetCourseName(val) {
        /* Course Details */
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'CourseName=' + val,
            success: function(data) {
                //alert(data);
                $('#CourseID').val(data);
            }
        });
    }

    function GetUnitDetails(val) {
        /* Unit Details */
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'UnitName=' + val,
            success: function(data) {
                //alert(data);
                $('#UnitId').val(data);
            }
        });
    }

    function GetYearDetails(val) {
        /* Year Details */
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'YearName=' + val,
            success: function(data) {
                //alert(data);
                $('#YearID').val(data);
            }
        });
    }

    function GetSemesterDetails(val) {
        /* Semester Details */
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'SemesterName=' + val,
            success: function(data) {
                //alert(data);
                $('#SemesterID').val(data);
            }
        });
    }

    function GetLectureDetails(val) {
        /* Lec Details */
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'LectuerName=' + val,
            success: function(data) {
                //alert(data);
                $('#LecturerId').val(data);
            }
        });
    }

    function GetTimeDetails(val) {
        /* Time Name Details */
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'TimeName=' + val,
            success: function(data) {
                //alert(data);
                $('#TimeId').val(data);
            }
        });
    }

    function GetRoomDetails(val) {
        /* Room Details */
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'RoomName=' + val,
            success: function(data) {
                //alert(data);
                $('#RoomID').val(data);
            }
        });
    }
</script>
<!-- iZi Toast Js -->
<script src="../public/plugins/iziToast/iziToast.min.js" type="text/javascript"></script>
<?php if (isset($success)) { ?>
    <!--This code for injecting success alert-->
    <script>
        iziToast.success({
            title: 'Success',
            position: 'topRight',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            transitionInMobile: 'fadeInUp',
            transitionOutMobile: 'fadeOutDown',
            message: '<?php echo $success; ?>',
        });
    </script>

<?php } ?>

<?php if (isset($err)) { ?>
    <!--This code for injecting error alert-->
    <script>
        iziToast.error({
            title: 'Error',
            timeout: 10000,
            resetOnHover: true,
            position: 'topRight',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            transitionInMobile: 'fadeInUp',
            transitionOutMobile: 'fadeOutDown',
            message: '<?php echo $err; ?>',
        });
    </script>

<?php } ?>

<?php if (isset($info)) { ?>
    <!--This code for injecting info alert-->
    <script>
        iziToast.warning({
            title: 'Warning',
            position: 'topLeft',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            transitionIn: 'fadeInUp',
            transitionInMobile: 'fadeInUp',
            transitionOutMobile: 'fadeOutDown',
            message: '<?php echo $info; ?>',
        });
    </script>

<?php }
?>