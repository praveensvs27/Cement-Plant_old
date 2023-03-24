<style>
	.text-label{ color:black; }
	.text-label span{ color:red; }
</style>
<?php
if(isset($_GET['Cement_Plant_Id'])){extract($_GET);}
else{$Cement_Plant_Id="";$Cement_Plant_Type_Id="";$Cement_Plant="";$Cement_Company="";$Latitude="";$Longitude="";$City="";$State_Id="";$Contact_Person_name="";$Contact_Phone_number="";$Contact_Email="";$Address="";$Status="";}
?>
<form autocomplete="off" action="javascript:submit_btn(<?php echo ($Cement_Plant_Id=="")?"0":$Cement_Plant_Id; ?>,Cement_Plant_Type_Id.value,Cement_Plant.value,Cement_Company.value,Latitude.value,Longitude.value,City.value,State_Id.value,Contact_Person_name.value,Contact_Phone_number.value,Contact_Email.value,Address.value,Status.value);">
<div class="modal-header">
	<h5 class="modal-title"><?php echo ($Cement_Plant_Id=="")?"Add New":"Update"; ?> Plant</h5>
	<button type="button" class="close" onclick="close_model();"><span>&times;</span></button>
</div>
<div class="modal-body">
    <div id="msg_box" style="color:red;width:100%;"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Plant Type <span>*</span></label>
					<select id="Cement_Plant_Type_Id" class="form-control" required><option value="">Select</option></select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Plant Name <span>*</span></label>
					<input type="text" id="Cement_Plant" class="form-control" placeholder="Plant" value="<?php echo $Cement_Plant; ?>" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Company <span>*</span></label>
					<select id="Cement_Company" class="form-control" required><option value="">Select</option></select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">City <span>*</span></label>
					<input type="text" id="City" class="form-control" placeholder="City" value="<?php echo $City; ?>" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Latitude <span>*</span></label>
					<input type="text" id="Latitude" class="form-control" placeholder="Latitude" value="<?php echo $Latitude; ?>" pattern="[0-9]{2}.[0-9]{6}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Longitude <span>*</span></label>
					<input type="text" id="Longitude" class="form-control" placeholder="Longitude" value="<?php echo $Longitude; ?>" pattern="[0-9]{2}.[0-9]{6}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">State <span>*</span></label>
					<select id="State_Id" class="form-control" required><option value="">Select</option></select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Contact Person name</label>
					<input type="text" id="Contact_Person_name" class="form-control" placeholder="Contact Person name" value="<?php echo $Contact_Person_name; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Contact Phone number</label>
					<input type="text" id="Contact_Phone_number" class="form-control" placeholder="Contact Phone number" pattern="[+]{0,1}[0-9]+" value="<?php echo $Contact_Phone_number; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Contact Email</label>
					<input type="email" id="Contact_Email" class="form-control" placeholder="Contact Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $Contact_Email; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-label">Address</label>
					<textarea id="Address" class="form-control" placeholder="Address" rows="4"><?php echo $Address; ?></textarea>
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
    <button type="submit" class="btn btn-success"><?php echo ($Cement_Plant_Id=="")?"SUBMIT":"UPDATE"; ?></button>
	<button type="button" class="btn btn-success" onclick="close_model();">CLOSE</button>
</div>
<script>
    function set_Cement_Plant_Type_Id()
    {
        var Cement_Plant_Type_Id="<?php echo $Cement_Plant_Type_Id; ?>";var valu={column:"cement_plant_type_id,cement_plant_type",table:"cement_plant_type"};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var tb_cont="<option value=''>Select</option>";
                for (let i = 0; i < data.length; i++) {var data1=data[i];tb_cont+="<option value='"+data1["cement_plant_type_id"]+"'"+((Cement_Plant_Type_Id==data1["cement_plant_type_id"])?" selected":"")+">"+data1["cement_plant_type"]+"</option>";}
                $("#Cement_Plant_Type_Id").html(tb_cont);
            }
        });
    }
    function set_Cement_Company()
    {
        var Cement_Company="<?php echo $Cement_Company; ?>";var valu={column:"cement_company_id,cement_company",table:"cement_company"};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var tb_cont="<option value=''>Select</option>";
                for (let i = 0; i < data.length; i++) {var data1=data[i];tb_cont+="<option value='"+data1["cement_company_id"]+"'"+((Cement_Company==data1["cement_company_id"])?" selected":"")+">"+data1["cement_company"]+"</option>";}
                $("#Cement_Company").html(tb_cont);
            }
        });
    }
    function set_State_Id()
    {
        var State_Id="<?php echo $State_Id; ?>";var valu={column:"state_id,state_name",table:"state_creation"};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var tb_cont="<option value=''>Select</option>";
                for (let i = 0; i < data.length; i++) {var data1=data[i];tb_cont+="<option value='"+data1["state_id"]+"'"+((State_Id==data1["state_id"])?" selected":"")+">"+data1["state_name"]+"</option>";}
                $("#State_Id").html(tb_cont);
            }
        });
    }
    (function($) {
        set_Cement_Plant_Type_Id();$("#Cement_Plant_Type_Id").select2();
        set_Cement_Company();$("#Cement_Company").select2();
        set_State_Id();$("#State_Id").select2();
    })(jQuery);
</script>
