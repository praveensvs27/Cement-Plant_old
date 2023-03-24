@extends('main_page')
@section('page_title','Company')
@section('main_content')
<div class="container-fluid">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4><button type="button" onclick="add_cement_company();" class="btn btn-light"><img src="assets/image/pen.png" width="35" height="35"></button>&nbsp;&nbsp;Company</h4>
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
									<th>Company Name</th>
									<th>Group Name</th>
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
	function add_cement_company(){
		jQuery.ajax({type: "GET",url: "/Cement_Company-create",
			success: function(data) {$("#basicModal_content_div").html(data);$("#basicModal").modal("show");}
		});
	}
	function edit_cement_company(Cement_Company_Id,Cement_Company,Cement_Group_Id,Status){
        var valu={Cement_Company_Id:Cement_Company_Id,Cement_Company:Cement_Company,Cement_Group_Id:Cement_Group_Id,Status:Status};
		jQuery.ajax({type: "GET",url: "/Cement_Company-create",data:valu,
			success: function(data) {$("#basicModal_content_div").html(data);$("#basicModal").modal("show");}
		});
	}
	function set_main_table_content()
	{
        var valu={action:"retrieve"};
		jQuery.ajax({type: "GET",url: "/db_cement_company_table",data:valu,
			success: function(data) {
				var tb_cont="";
				for (let i = 0; i < data.length; i++) {var data1=data[i];tb_cont+="<tr><td>"+(i+1)+"</td><td>"+data1["cement_company"]+"</td><td>"+data1["cement_group"]+"</td><td>"+(data1["status"]==1?"Active":"Inactive")+"</td><td style='text-align:center;'><button class='btn btn-success' onclick=\"edit_cement_company('"+data1["cement_company_id"]+"','"+data1["cement_company"]+"','"+data1["cement_group_id"]+"','"+data1["status"]+"');\"><i class='fa fa-pencil'></i></button>&nbsp;<button class='btn btn-danger' onclick='Delete_Confirm("+data1["cement_company_id"]+");'><i class='fa fa-trash'></i></button></td></tr>";}
				$('#main_table').DataTable().destroy();
				$("#main_table_content").html(tb_cont);
				$('#main_table').DataTable().draw();
			}
		});
	}
	(function($) {
		set_main_table_content();
	})(jQuery);
    function submit_btn(Cement_Company_Id,Cement_Company,Cement_Group_Id,Status)
    {
        var valu={column:"count(*) as cnt",table:"cement_company where cement_company='"+Cement_Company+"'"+(Cement_Company_Id!="0"?" and cement_company_id!="+Cement_Company_Id:"")};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var cnt=parseInt(data[0]["cnt"]);
                if(cnt==0){
                    if(Cement_Company_Id=="0")
                    {
                        var valu={action:"insert",Cement_Company:Cement_Company,Cement_Group_Id:Cement_Group_Id,Status:Status};
                        jQuery.ajax({type: "GET",url: "/db_cement_company_table",data:valu,
                            success: function(data) {$('#basicModal').modal('hide');set_main_table_content();}
                        });
                    }
                    else
                    {
                        var valu={action:"update",Cement_Company_Id:Cement_Company_Id,Cement_Company:Cement_Company,Cement_Group_Id:Cement_Group_Id,Status:Status};
                        jQuery.ajax({type: "GET",url: "/db_cement_company_table",data:valu,
                            success: function(data) {$('#basicModal').modal('hide');set_main_table_content();}
                        });
                    }
                }else{
                    $('#msg_box').html("Company name already exist.");
                }
            }
        });
    }
	function Delete_Confirm(Cement_Company_Id)
	{
        if(Cement_Company_Id!="")
		{
            Swal.fire({
                title: 'Do you want to Delete Cement Company?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                denyButtonText: 'Cancel',
                }).then((result) => {
                    if(result["value"]){delete_btn(Cement_Company_Id);}
                }
            );
        }else{alert("Company not selected.");}
	}
    function delete_btn(Cement_Company_Id){
		var valu={action:"delete",Cement_Company_Id:Cement_Company_Id};
		jQuery.ajax({type: "GET",url: "/db_cement_company_table",data:valu,
			success: function(data) {Swal.fire('Deleted successfully!', '', 'success');set_main_table_content();}
		});
    }
</script>
@endsection
