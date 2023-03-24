@extends('main_page')
@section('page_title','Plant')
@section('main_content')
<div class="container-fluid">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4><button type="button" onclick="add_cement_plant();" class="btn btn-light"><img src="assets/image/pen.png" width="35" height="35"></button>&nbsp;&nbsp;Plant</h4>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="main_table" class="display" style="min-width: 845px;color:black;">
							<thead>
								<tr>
									<th style="width:100px;">Sno</th>
									<th>Plant Type</th>
									<th>Plant Name</th>
									<th>Company Name</th>
									<th>Latitude</th>
									<th>Longitude</th>
									<th>City</th>
									<th>State</th>
									<th>Address</th>
									<th>Contact Person name</th>
									<th>Contact Phone number</th>
									<th>Contact Email</th>
                                    <th>Status</th>
									<th style="width:90px;">Action</th>
								</tr>
							</thead>
							<tbody id="main_table_content">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer_content')
<script>
	function add_cement_plant(){
		jQuery.ajax({type: "GET",url: "/Cement_Plant-create",
			success: function(data) {$("#basicModal_content_div").html(data);$("#basicModal").modal("show");}
		});
	}
	function edit_cement_plant(Cement_Plant_Id,Cement_Plant_Type_Id,Cement_Plant,Cement_Company,Latitude,Longitude,City,State_Id,Contact_Person_name,Contact_Phone_number,Contact_Email,Address,Status){
        var valu={Cement_Plant_Id:Cement_Plant_Id,Cement_Plant_Type_Id:Cement_Plant_Type_Id,Cement_Plant:Cement_Plant,Cement_Company:Cement_Company,Latitude:Latitude,Longitude:Longitude,City:City,State_Id:State_Id,Contact_Person_name:Contact_Person_name,Contact_Phone_number:Contact_Phone_number,Contact_Email:Contact_Email,Address:Address,Status:Status};
        jQuery.ajax({type: "GET",url: "/Cement_Plant-create",data:valu,
            success: function(data) {$("#basicModal_content_div").html(data);$("#basicModal").modal("show");}
        });
	}
	function set_main_table_content()
	{
        var valu={action:"retrieve"};
		jQuery.ajax({type: "GET",url: "/db_cement_plant_table",data:valu,
			success: function(data) {
				var tb_cont="";
				for (let i = 0; i < data.length; i++) {
					var data1=data[i];
					tb_cont+="<tr><td>"+(i+1)+"</td><td>"+data1["cement_plant_type"]+"</td><td>"+data1["cement_plant"]+"</td><td>"+data1["cement_company"]+"</td><td>"+data1["latitude"]+"</td><td>"+data1["longitude"]+"</td><td>"+data1["city"]+"</td><td>"+data1["state_name"]+"</td><td>"+data1["address"]+"</td><td>"+data1["contact_person_name"]+"</td><td>"+data1["contact_phone_no"]+"</td><td>"+data1["contact_email"]+"</td><td>"+(data1["status"]==1?"Active":"Inactive")+"</td><td style='text-align:center;'><button class='btn btn-success' onclick=\"edit_cement_plant('"+data1["cement_plant_id"]+"','"+data1["cement_plant_type_id"]+"','"+data1["cement_plant"]+"','"+data1["cement_company_id"]+"','"+data1["latitude"]+"','"+data1["longitude"]+"','"+data1["city"]+"','"+data1["state_id"]+"','"+data1["contact_person_name"]+"','"+data1["contact_phone_no"]+"','"+data1["contact_email"]+"','"+data1["address"]+"','"+data1["status"]+"');\"><i class='fa fa-pencil'></i></button>&nbsp;<button class='btn btn-danger' onclick='Delete_Confirm("+data1["cement_plant_id"]+");'><i class='fa fa-trash'></i></button></td></tr>";
				}
				$('#main_table').DataTable().destroy();
				$("#main_table_content").html(tb_cont);
				$('#main_table').DataTable().draw();
			}
		});
	}
	(function($) {
		set_main_table_content();
	})(jQuery);
    function submit_btn(Cement_Plant_Id,Cement_Plant_Type_Id,Cement_Plant,Cement_Company,Latitude,Longitude,City,State_Id,Contact_Person_name,Contact_Phone_number,Contact_Email,Address,Status)
    {
        var valu={column:"count(*) as cnt",table:"cement_plant where cement_plant='"+Cement_Plant+"'"+(Cement_Plant_Id!="0"?" and cement_plant_id!="+Cement_Plant_Id:"")};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var cnt=parseInt(data[0]["cnt"]);
                if(cnt==0){
                    if(Cement_Plant_Id=="0")
                    {
                        var valu={action:"insert",Cement_Plant_Type_Id:Cement_Plant_Type_Id,Cement_Plant:Cement_Plant,Cement_Company:Cement_Company,Latitude:Latitude,Longitude:Longitude,City:City,State_Id:State_Id,Contact_Person_name:Contact_Person_name,Contact_Phone_number:Contact_Phone_number,Contact_Email:Contact_Email,Address:Address,Status:Status};
                        jQuery.ajax({type: "GET",url: "/db_cement_plant_table",data:valu,
                            success: function(data) {$('#basicModal').modal('hide');set_main_table_content();}
                        });
                    }
                    else
                    {
                        var valu={action:"update",Cement_Plant_Id:Cement_Plant_Id,Cement_Plant_Type_Id:Cement_Plant_Type_Id,Cement_Plant:Cement_Plant,Cement_Company:Cement_Company,Latitude:Latitude,Longitude:Longitude,City:City,State_Id:State_Id,Contact_Person_name:Contact_Person_name,Contact_Phone_number:Contact_Phone_number,Contact_Email:Contact_Email,Address:Address,Status:Status};
                        jQuery.ajax({type: "GET",url: "/db_cement_plant_table",data:valu,
                            success: function(data) {$('#basicModal').modal('hide');set_main_table_content();}
                        });
                    }
                }else{
                    $('#msg_box').html("Plant name already exist.");
                }
            }
        });
    }
	function Delete_Confirm(Cement_Plant_Id)
	{
        if(Cement_Plant_Id!="")
		{
            Swal.fire({
                title: 'Do you want to Delete Plant?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                denyButtonText: 'Cancel',
                }).then((result) => {
                    if(result["value"]){delete_btn(Cement_Plant_Id);}
                }
            );
        }else{alert("Plant not selected.");}
	}
    function delete_btn(Cement_Plant_Id){
		var valu={action:"delete",Cement_Plant_Id:Cement_Plant_Id};
		jQuery.ajax({type: "GET",url: "/db_cement_plant_table",data:valu,
			success: function(data) {Swal.fire('Deleted successfully!', '', 'success');set_main_table_content();}
		});
    }
</script>
@endsection
