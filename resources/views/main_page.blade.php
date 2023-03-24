<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('page_title')</title>
    <!--<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">-->
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="assets/vendor/select2/css/select2.min.css" rel="stylesheet">
    <style>
        #main_table th {
            vertical-align: text-top;
            padding: 5px;
            border-top: 1px solid #dddddd;
            border-bottom: 1px solid #dddddd;
            border-right: 1px solid #dddddd;
        }
        #main_table td {
            vertical-align: text-top;
            padding: 5px;
            border-bottom: 1px solid #dddddd;
            border-right: 1px solid #dddddd;
        }
        #main_table td:first-child,#main_table th:first-child {
            border-left: 1px solid #dddddd;
        }
    </style>
</head>
<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="content-body" style="margin-left:0px;padding-top:1rem;">
			@section('main_content')
            @show
        </div>
    </div>
	<div class="modal fade" id="basicModal" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" id="basicModal_content_div">
			</div>
		</div>
	</div>
    <script src="assets/vendor/global/global.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="assets/vendor/select2/js/select2.full.min.js"></script>
	<script>
    function close_model(){$("#basicModal_content_div").html("");$("#basicModal").modal("hide");}
	(function($) {
		var table = $('#main_table').DataTable({
			"ordering": false
		});
	})(jQuery);
	</script>
    @section('footer_content')
    @show
</body>
</html>
