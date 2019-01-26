<!--begin::Base Scripts -->
<script src="<?php echo base_url() . 'plantilla/js/vendors.bundle.js'; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'plantilla/js/scripts.bundle.js'; ?>" type="text/javascript"></script>
<!--end::Base Scripts -->
  <!--begin::Page Snippets -->
<script src="<?php echo base_url() . 'plantilla/js/login.js'; ?>" type="text/javascript"></script>
<!--end::Page Snippets -->
<script>
    jQuery(document).ready(function () {
        if (!("V_login" in document.createElement("input")))
        {
            $("#username").focus();
        }

    });
</script>
</body>
<!-- end::Body -->
</html>
