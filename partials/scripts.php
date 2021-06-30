<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.bundle.min.js"></script>
<script src="../public/js/detect.js"></script>
<script src="../public/js/waves.js"></script>
<script src="../public/js/jquery.nicescroll.js"></script>
<script src="../public/plugins/switchery/switchery.min.js"></script>

<!-- App js -->
<script src="../public/js/jquery.core.js"></script>
<script src="../public/js/jquery.app.js"></script>
<!-- Only One Checkbox In Auth -->
<script>
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('Login_Rank')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>