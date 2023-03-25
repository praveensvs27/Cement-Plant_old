@extends('main_page')
@section('page_title','Plant Type')
@section('main_content')
<div class="container-fluid">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4><button type="button" onclick="add_cement_plant_type();" class="btn btn-light"><img src="assets/image/pen.png" width="35" height="35"></button>&nbsp;&nbsp;Plant Type</h4>
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
	function add_cement_plant_type(){
		jQuery.ajax({type: "GET",url: "/Cement_Plant_Type-create",
			success: function(data) {$("#basicModal_content_div").html(data);$("#basicModal").modal("show");}
		});
	}
	function edit_cement_plant_type(Cement_Plant_Type_Id,Cement_Plant_Type,Status){
        var valu={Cement_Plant_Type_Id:Cement_Plant_Type_Id,Cement_Plant_Type:Cement_Plant_Type,Status:Status};
		jQuery.ajax({type: "GET",url: "/Cement_Plant_Type-create",data:valu,
			success: function(data) {$("#basicModal_content_div").html(data);$("#basicModal").modal("show");}
		});
	}
	function set_main_table_content()
	{
        var valu={action:"retrieve"};
		jQuery.ajax({type: "GET",url: "/db_cement_plant_type_table",data:valu,
			success: function(data) {
				var tb_cont="";
				for (let i = 0; i < data.length; i++) {var data1=data[i];tb_cont+="<tr><td>"+(i+1)+"</td><td>"+data1["cement_plant_type"]+"</td><td>"+(data1["status"]==1?"Active":"Inactive")+"</td><td style='text-align:center;'><button class='btn btn-success' onclick=\"edit_cement_plant_type('"+data1["cement_plant_type_id"]+"','"+data1["cement_plant_type"]+"','"+data1["status"]+"');\"><i class='fa fa-pencil'></i></button>&nbsp;<button class='btn btn-danger' onclick='Delete_Confirm("+data1["cement_plant_type_id"]+");'><i class='fa fa-trash'></i></button></td></tr>";}
				$('#main_table').DataTable().destroy();
				$("#main_table_content").html(tb_cont);
				$('#main_table').DataTable().draw();
			}
		});
	}
	(function($) {
		var table = $('#main_table').DataTable({
			"ordering": false
		});
		set_main_table_content();
	})(jQuery);
    function submit_btn(Cement_Plant_Type_Id,Cement_Plant_Type,Status)
    {
        var valu={column:"count(*) as cnt",table:"cement_plant_type where cement_plant_type='"+Cement_Plant_Type+"'"+(Cement_Plant_Type_Id!="0"?" and cement_plant_type_id!="+Cement_Plant_Type_Id:"")};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var cnt=parseInt(data[0]["cnt"]);
                if(cnt==0){
                    if(Cement_Plant_Type_Id=="0")
                    {
                        var valu={action:"insert",Cement_Plant_Type:Cement_Plant_Type,Status:Status};
                        jQuery.ajax({type: "GET",url: "/db_cement_plant_type_table",data:valu,
                            success: function(data) {$('#basicModal').modal('hide');set_main_table_content();}
                        });
                    }
                    else
                    {
                        var valu={action:"update",Cement_Plant_Type_Id:Cement_Plant_Type_Id,Cement_Plant_Type:Cement_Plant_Type,Status:Status};
                        jQuery.ajax({type: "GET",url: "/db_cement_plant_type_table",data:valu,
                            success: function(data) {$('#basicModal').modal('hide');set_main_table_content();}
                        });
                    }
                }else{
                    $('#msg_box').html("Plant type already exist.");
                }
            }
        });
    }
	function Delete_Confirm(Cement_Plant_Type_Id)
	{
        if(Cement_Plant_Type_Id!="")
        {
            Swal.fire({
                title: 'Do you want to Delete Plant Type?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                denyButtonText: 'Cancel',
                }).then((result) => {
                    if(result["value"]){delete_btn(Cement_Plant_Type_Id);}
                }
            );
        }else{alert("Plant Type not selected.");}
	}
    function delete_btn(Cement_Plant_Type_Id){
		var valu={action:"delete",Cement_Plant_Type_Id:Cement_Plant_Type_Id};
		jQuery.ajax({type: "GET",url: "/db_cement_plant_type_table",data:valu,
			success: function(data) {Swal.fire('Deleted successfully!', '', 'success');set_main_table_content();}
		});
    }
</script>
@endsection
