@extends('main_page')
@section('page_title','Plant Location')
@section('main_content')
<div class="container-fluid">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="welcome-text">
				<h4>Plant Location</h4>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
            <div id="map" style="width:100%;height: 500px;"></div>
            <script>
                let map, activeInfoWindow, markers = [];
                function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {center: {lat: 11.3410,lng: 77.7172,},zoom: 6.5});
                }
                function initMarkers(initialMarkers) {
                    for (let i = 0; i < markers.length; i++) {markers[i].setMap(null);}
                    markers = [];
                    for (let index = 0; index < initialMarkers.length; index++) {
                        const markerData = initialMarkers[index];
                        const marker = new google.maps.Marker({
                            position: markerData.position,
                            label: markerData.label,
                            draggable: markerData.draggable,
                            map
                        });
                        markers.push(marker);
                        const infowindow = new google.maps.InfoWindow({content: `${markerData.msg}`,});
                        marker.addListener("click", (event) => {
                            if(activeInfoWindow) {activeInfoWindow.close();}
                            infowindow.open({anchor: marker,shouldFocus: false,map});
                            activeInfoWindow = infowindow;
                        });
                    }
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAJGUYUdhVOmp1DoDe640xRLCE7JjFZdMw&callback=initMap" async></script>
		</div>
		<div class="col-md-3">
            <div class="form-group mb-0">
                <label class="text-label mb-0">State List</label>
                <div style="background-color: #fff;color:black;border:1px solid #eaeaea;height:200px;overflow-y: scroll;">
                    <ul class="list-group" id="state_checkbox_list"></ul>
                </div>
            </div>
            <div class="form-group mb-0">
                <label class="text-label mb-0">Group List</label>
                <div style="background-color: #fff;color:black;border:1px solid #eaeaea;height:200px;overflow-y: scroll;">
                    <ul class="list-group" id="group_checkbox_list"></ul>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
@section('footer_content')
<script>
    function set_State_Id()
    {
        var valu={column:"state_id,state_name",table:"state_creation"};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var tb_cont="<li class='list-group-item p-0 px-1'><div class='custom-control custom-checkbox'><input class='custom-control-input state_checkbox_list' id='state_checkbox_list-all' type='checkbox' onclick='state_checkbox_list_all(this.checked);'><label class='cursor-pointer font-italic d-block custom-control-label' for='state_checkbox_list-all'>All</label></div></li>";
                for (let i = 0; i < data.length; i++)
                {
                    var data1=data[i];var id=data1["state_id"];
                    tb_cont+="<li class='list-group-item p-0 px-1'><div class='custom-control custom-checkbox'><input class='custom-control-input state_checkbox_list' id='state_checkbox_list-"+id+"' type='checkbox' onclick='state_checkbox_list_change();'><label class='cursor-pointer font-italic d-block custom-control-label' for='state_checkbox_list-"+id+"'>"+data1["state_name"]+"</label></div></li>";
                }
                $("#state_checkbox_list").html(tb_cont);
            }
        });
    }
    function state_checkbox_list_all(ch)
    {
        const state_checkbox_list = document.getElementsByClassName("state_checkbox_list");
        for (let i = 1; i < state_checkbox_list.length; i++) {
            state_checkbox_list[i].checked=ch;
        }
        state_checkbox_list_change();
    }
    function state_checkbox_list_change()
    {
        var state_id="";
        const state_checkbox_list = document.getElementsByClassName("state_checkbox_list");
        for (let i = 1; i < state_checkbox_list.length; i++) {
            if(state_checkbox_list[i].checked)
            {state_id+=(state_id!=""?",":"")+(state_checkbox_list[i].id.split("-")[1]);}
        }
        var group_id="";
        const group_checkbox_list = document.getElementsByClassName("group_checkbox_list");
        for (let i = 1; i < group_checkbox_list.length; i++) {
            group_id+=(group_id!=""?",":"")+(group_checkbox_list[i].id.split("-")[1]);
            document.getElementById("group_checkbox_list1-"+(group_checkbox_list[i].id.split("-")[1])).innerHTML="0";
        }
        document.getElementById("group_checkbox_list1-all").innerHTML="0";
        //if(state_id!="")
        {
            var valu={state_id:state_id,group_id:group_id};
            jQuery.ajax({type: "GET",url: "/retrieve_db_group_cnt_table",data:valu,
                success: function(data) {
                    var total_cnt=0;
                    for (let i = 0; i < data.length; i++)
                    {
                        var data1=data[i];var cnt=parseInt(data1["group_cnt"]);total_cnt+=cnt;
                        document.getElementById("group_checkbox_list1-"+data1["group_id"]).innerHTML=cnt;
                    }
                    document.getElementById("group_checkbox_list1-all").innerHTML=total_cnt;
                }
            });
        }
        set_Map_Location_Id();
    }
    function group_checkbox_list_all(ch)
    {
        const group_checkbox_list = document.getElementsByClassName("group_checkbox_list");
        for (let i = 1; i < group_checkbox_list.length; i++) {
            group_checkbox_list[i].checked=ch;
        }
        set_Map_Location_Id();
    }
    function set_Cement_Group_Id()
    {
        var valu={column:"cement_group_id,cement_group",table:"cement_group"};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var tb_cont="<li class='list-group-item p-0 px-1'><div class='custom-control custom-checkbox'><input class='custom-control-input group_checkbox_list' id='group_checkbox_list-all' type='checkbox' onclick='group_checkbox_list_all(this.checked);'><label class='cursor-pointer font-italic d-block custom-control-label' for='group_checkbox_list-all'>All (<span id='group_checkbox_list1-all'>0</span>)</label></div></li>";
                for (let i = 0; i < data.length; i++)
                {
                    var data1=data[i];var id=data1["cement_group_id"];
                    tb_cont+="<li class='list-group-item p-0 px-1'><div class='custom-control custom-checkbox'><input class='custom-control-input group_checkbox_list' id='group_checkbox_list-"+id+"' type='checkbox' onclick='set_Map_Location_Id();'><label class='cursor-pointer font-italic d-block custom-control-label' for='group_checkbox_list-"+id+"'>"+data1["cement_group"]+" (<span id='group_checkbox_list1-"+id+"'>0</span>)</label></div></li>";
                }
                $("#group_checkbox_list").html(tb_cont);
                state_checkbox_list_change();
            }
        });
    }
    function set_Map_Location_Id()
    {
        var state_id="";
        const state_checkbox_list = document.getElementsByClassName("state_checkbox_list");
        for (let i = 1; i < state_checkbox_list.length; i++) {
            if(state_checkbox_list[i].checked)
            {state_id+=(state_id!=""?",":"")+(state_checkbox_list[i].id.split("-")[1]);}
        }
        var group_id="";
        const group_checkbox_list = document.getElementsByClassName("group_checkbox_list");
        for (let i = 1; i < group_checkbox_list.length; i++) {
            if(group_checkbox_list[i].checked)
            {group_id+=(group_id!=""?",":"")+(group_checkbox_list[i].id.split("-")[1]);}
        }
        var valu={state_id:state_id,group_id:group_id};
        jQuery.ajax({type: "GET",url: "/retrieve_db_plant_loc_stgr_table",data:valu,
            success: function(data) {
                const initialMarkers = [];let j = 0;
                for (let i = 0; i < data.length; i++)
                {
                    var data1=data[i];
                    if((data1["latitude"]!="")&&(data1["longitude"]!=""))
                    {
                        var latitude=parseFloat(data1["latitude"]);var longitude=parseFloat(data1["longitude"]);
                        initialMarkers[j]={"position":{"lat":latitude,"lng":longitude},"label":{"color":"white"},"draggable":false,"msg":"<b style='color:black;'>Group name : "+data1["cement_group"]+"<br>Company name : "+data1["cement_company"]+"<br>Plant name : "+data1["cement_plant"]+"</b>"};
                    }
                }
                initMarkers(initialMarkers);
            }
        });
    }
    (function($) {
        set_State_Id();
        set_Cement_Group_Id();
    })(jQuery);
</script>
@endsection
