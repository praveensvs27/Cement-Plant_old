<style>
	.text-label{ color:black; }
	.text-label span{ color:red; }
</style>
<?php
if(isset($_GET['Cement_Group_Id'])){extract($_GET);}
else{$Cement_Group_Id="";$Cement_Group="";$Status="";}
?>
<form autocomplete="off" action="javascript:submit_btn(<?php echo ($Cement_Group_Id=="")?"0":$Cement_Group_Id; ?>,Cement_Group.value,Status.value);">
<div class="modal-header">
	<h5 class="modal-title"><?php echo ($Cement_Group_Id=="")?"Add New":"Update"; ?> Group</h5>
	<button type="button" class="close" onclick="close_model();"><span>&times;</span></button>
</div>
<div class="modal-body">
    <div id="msg_box" style="color:red;width:"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-label">Group Name <span>*</span></label>
                    <input type="text" id="Cement_Group" class="form-control" placeholder="Group Name" value="<?php echo $Cement_Group; ?>" required>
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
	<button type="submit" class="btn btn-success"><?php echo ($Cement_Group_Id=="")?"SUBMIT":"UPDATE"; ?></button>
	<button type="button" class="btn btn-success" onclick="close_model();">CLOSE</button>
</div>
</form>
