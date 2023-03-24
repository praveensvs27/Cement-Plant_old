<style>
	.text-label{ color:black; }
	.text-label span{ color:red; }
</style>
<?php
if(isset($_GET['Cement_Plant_Type_Id'])){extract($_GET);}
else{$Cement_Plant_Type_Id="";$Cement_Plant_Type="";$Status="";}
?>
<form autocomplete="off" action="javascript:submit_btn(<?php echo ($Cement_Plant_Type_Id=="")?"0":$Cement_Plant_Type_Id; ?>,Cement_Plant_Type.value,Status.value);">
<div class="modal-header">
	<h5 class="modal-title"><?php echo ($Cement_Plant_Type_Id=="")?"Add New":"Update"; ?> Plant Type</h5>
	<button type="button" class="close" onclick="close_model();"><span>&times;</span>
	</button>
</div>
<div class="modal-body">
    <div id="msg_box" style="color:red;width:100%;"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Plant Type <span>*</span></label>
					<input type="text" id="Cement_Plant_Type" class="form-control" placeholder="Plant Type" value="<?php echo $Cement_Plant_Type; ?>" required>
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
    <button type="submit" class="btn btn-success"><?php echo ($Cement_Plant_Type_Id=="")?"SUBMIT":"UPDATE"; ?></button>
	<button type="button" class="btn btn-success" onclick="close_model();">CLOSE</button>
</div>
</form>
