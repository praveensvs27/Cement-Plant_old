<style>
	.text-label{ color:black; }
	.text-label span{ color:red; }
</style>
<?php
if(isset($_GET['Cement_Company_Id'])){extract($_GET);}
else{$Cement_Company_Id="";$Cement_Company="";$Cement_Group_Id="";$Status="";}
?>
<form autocomplete="off" action="javascript:submit_btn(<?php echo ($Cement_Company_Id=="")?"0":$Cement_Company_Id; ?>,Cement_Company.value,Cement_Group_Id.value,Status.value);">
<div class="modal-header">
	<h5 class="modal-title"><?php echo ($Cement_Company_Id=="")?"Add New":"Update"; ?> Company</h5>
	<button type="button" class="close" onclick="close_model();"><span>&times;</span></button>
</div>
<div class="modal-body">
    <div id="msg_box" style="color:red;width:100%;"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Company Name <span>*</span></label>
					<input type="text" id="Cement_Company" class="form-control" placeholder="Company" value="<?php echo $Cement_Company; ?>" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Group Name <span>*</span></label>
					<select id="Cement_Group_Id" class="form-control" required><option value="">Select</option></select>
				</div>
			</div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-label">Status <span>*</span></label>
                    <select id="Status" class="form-control" required>
                    <?php if($Status==""){ ?>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    <?php }else{ ?>
                        <option value="1"<?php echo ($Status==1?" selected":""); ?>>Active</option>
                        <option value="0"<?php echo ($Status!=1?" selected":""); ?>>Inactive</option>
                    <?php } ?>
                    </select>
                </div>
            </div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="submit" class="btn btn-success"><?php echo ($Cement_Company_Id=="")?"SUBMIT":"UPDATE"; ?></button>
	<button type="button" class="btn btn-success" onclick="close_model();">CLOSE</button>
</div>
<script>
    function set_Cement_Group_Id()
    {
        var Cement_Group_Id="<?php echo $Cement_Group_Id; ?>";var valu={column:"cement_group_id,cement_group",table:"cement_group"};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var tb_cont="<option value=''>Select</option>";
                for (let i = 0; i < data.length; i++) {var data1=data[i];tb_cont+="<option value='"+data1["cement_group_id"]+"'"+((Cement_Group_Id==data1["cement_group_id"])?" selected":"")+">"+data1["cement_group"]+"</option>";}
                $("#Cement_Group_Id").html(tb_cont);
            }
        });
    }
    (function($) {
        set_Cement_Group_Id();$("#Cement_Group_Id").select2();
    })(jQuery);
</script>
</form>
