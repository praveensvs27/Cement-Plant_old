@extends('main_page')
@section('page_title','Plant Location')
@section('main_content')
<div class="container-fluid">
	<div class="row mb-3">
		<div class="col-md-9">
            <div id="map" style="width:100%;height: 420px;"></div>
			<div class="card">
				<div class="card-body">
                    <div class="table-responsive" style="width:100%;">
                        <table id="main_table" class="display" style="min-width: 845px;color:black;">
                            <thead>
                                <tr class="text-center">
                                    <th>Sno</th>
                                    <th>Group Name</th>
                                    <th>Company Name</th>
                                    <th>Faculty Name</th>
                                    <th>City</th>
                                    <th>Location 1</th>
                                    <th>Location 2</th>
                                    <th>Location 3</th>
                                </tr>
                            </thead>
                            <tbody id="main_table_content">
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJGUYUdhVOmp1DoDe640xRLCE7JjFZdMw" ></script>
            <script>
                var directionsDisplay = new google.maps.DirectionsRenderer();
                var directionsService = new google.maps.DirectionsService();
                function calculateRoutes(pierLocation)
                {
                    var plant_detail_tb_row=document.getElementsByClassName('plant_detail_tb_row');
                    for (let i = 0; i < plant_detail_tb_row.length; i++)
                    {
                        var lat=parseFloat(plant_detail_tb_row[i].getElementsByClassName('latitude')[0].value);
                        var lng=parseFloat(plant_detail_tb_row[i].getElementsByClassName('longitude')[0].value);
                        var destinationLocation = new google.maps.LatLng(lat,lng);
                        var request = {
                            origin: pierLocation,
                            destination: destinationLocation,
                            travelMode: 'DRIVING',
                            provideRouteAlternatives: true
                        };
                        directionsService.route(request, function(result, status) {
                            var routes=["NULL","NULL","NULL"];
                            if (status === 'OK')
                            {
                                directionsDisplay.setDirections(result);
                                for (var x = 0; (x < result.routes.length)&&(x<3); x++) {
                                    var route = result.routes[x];
                                    for (var y = 0; y < route.legs.length; y++) {
                                        routes[x]=route.legs[y].distance.text;
                                    }
                                }
                            }
                            plant_detail_tb_row[i].getElementsByClassName('route1')[0].innerHTML=routes[0];
                            plant_detail_tb_row[i].getElementsByClassName('route2')[0].innerHTML=routes[1];
                            plant_detail_tb_row[i].getElementsByClassName('route3')[0].innerHTML=routes[2];
                        });
                    }
                }
                let map, activeInfoWindow, plantmarkers=[],piermarkers=[];
                function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {center: {lat: 11.3410,lng: 77.7172,},zoom: 6.5});
                }
                function init_piermarkers(pierdata) {
                    var plant_detail_tb_row=document.getElementsByClassName('plant_detail_tb_row');
                    for (let i = 0; i < plant_detail_tb_row.length; i++)
                    {
                        var plant_detail_tb_row1=plant_detail_tb_row[i];
                        plant_detail_tb_row1.getElementsByClassName('route1')[0].innerHTML="NULL";
                        plant_detail_tb_row1.getElementsByClassName('route2')[0].innerHTML="NULL";
                        plant_detail_tb_row1.getElementsByClassName('route3')[0].innerHTML="NULL";
                    }
                    for (let index = 0; index < pierdata.length; index++)
                    {
                        const markerData = pierdata[index];
                        var pierLocation = new google.maps.LatLng(markerData.position.lat,markerData.position.lng);
                        calculateRoutes(pierLocation);
                        break;
                    }
                }
                function init_plantmarkers(plantdata) {
                    for (let i = 0; i < plantmarkers.length; i++) {plantmarkers[i].setMap(null);}plantmarkers = [];
                    for (let index = 0; index < plantdata.length; index++) {
                        const markerData = plantdata[index];
                        const marker = new google.maps.Marker({
                            position: markerData.position,
                            label: markerData.label,
                            draggable: markerData.draggable,
                            map
                        });
                        plantmarkers.push(marker);
                        const infowindow = new google.maps.InfoWindow({content: `${markerData.msg}`,});
                        marker.addListener("click", (event) => {
                            if(activeInfoWindow) {activeInfoWindow.close();}
                            infowindow.open({anchor: marker,shouldFocus: false,map});
                            activeInfoWindow = infowindow;
                        });
                    }
                }
            </script>
		</div>
		<div class="col-md-3">
            <div class="form-group mb-0">
                <label class="text-label mb-0">Location</label>
                <input type="text" class="form-control" placeholder="Location">
            </div>
            <div class="form-group mb-0">
                <label class="text-label mb-0">Latitude</label>
                <input type="text" class="form-control" placeholder="Latitude">
            </div>
            <div class="form-group mb-1">
                <label class="text-label mb-0">Longitude</label>
                <input type="text" class="form-control" placeholder="Longitude">
            </div>
            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary" onclick="initMarkers([]);">Search</button>
            </div>
            <div class="form-group mb-0">
                <label class="text-label mb-0">Site List</label>
                <div style="background-color: #fff;color:black;border:1px solid #eaeaea;height:200px;overflow-y: scroll;">
                    <ul class="list-group" id="site_checkbox_list">
                    </ul>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
@section('footer_content')
<script>
    initMap();
    function set_Site_Id()
    {
        var valu={column:"id,site_name,latitude,longitude",table:"site_creation order by site_name asc"};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var tb_cont="";
                for (let i = 0; i < data.length; i++)
                {
                    var data1=data[i];var id=data1["id"];
                    var latitude=(data1["latitude"]!=""?parseFloat(data1["latitude"]):0);
                    var longitude=(data1["longitude"]!=""?parseFloat(data1["longitude"]):0);
                    tb_cont+="<li class='list-group-item p-0 px-1'><div class='custom-control custom-checkbox'><input class='custom-control-input site_checkbox_list' id='site_checkbox_list-"+id+"' type='checkbox' onclick=\"set_Map_Location_Id(this,'"+data1["site_name"]+"',"+latitude+","+longitude+");\"><label class='cursor-pointer font-italic d-block custom-control-label' for='site_checkbox_list-"+id+"'>"+data1["site_name"]+"</label></div></li>";
                }
                $("#site_checkbox_list").html(tb_cont);
            }
        });
    }
    function set_Map_Location_Id(chbox,site_name,latitude,longitude)
    {
        const site_checkbox_list = document.getElementsByClassName("site_checkbox_list");
        for (let i = 0; i < site_checkbox_list.length; i++) {
            if((site_checkbox_list[i].id!=chbox.id)?(site_checkbox_list[i].checked):false)
            {site_checkbox_list[i].checked=false;break;}
        }
        const pierdata = [];
        if((chbox.checked)?((latitude!=0)&&(longitude!=0)):false)
        {pierdata[0]={"position":{"lat":latitude,"lng":longitude},"label":{"text":"A","color":"white"},"draggable":false,"msg":"<b style='color:black;'>Site name : "+site_name+"</b>"};}
        init_piermarkers(pierdata);
    }
    function set_Plant_table()
	{
		jQuery.ajax({type: "GET",url: "/retrieve_db_plant_det_loc_table",
			success: function(data) {
				var tb_cont="";const plantdata = [];
				for (let i = 0; i < data.length; i++)
                {
                    var data1=data[i];
                    var latitude=(data1["latitude"]!=""?parseFloat(data1["latitude"]):0);
                    var longitude=(data1["longitude"]!=""?parseFloat(data1["longitude"]):0);
                    tb_cont+="<tr class='plant_detail_tb_row'><td>"+(i+1)+"<input type='hidden' class='latitude' value='"+latitude+"'/><input type='hidden' class='longitude' value='"+longitude+"'/></td><td>"+data1["cement_group"]+"</td><td>"+data1["cement_company"]+"</td><td>"+data1["cement_plant"]+"</td><td>"+data1["city"]+"</td><td class='route1'>NULL</td><td class='route2'>NULL</td><td class='route3'>NULL</td></tr>";
                    plantdata[i]={"position":{"lat":latitude,"lng":longitude},"label":{"color":"white"},"draggable":false,"msg":"<b style='color:black;'>Group name : "+data1["cement_group"]+"<br>Company name : "+data1["cement_company"]+"<br>Plant name : "+data1["cement_plant"]+"</b>"};
                }
				$('#main_table').DataTable().destroy();
				$("#main_table_content").html(tb_cont);
				$('#main_table').DataTable({
                    "ordering": false,
                    "dom": 'lBfrtip',
                    "buttons": ['excel', 'print']/* ,
                    "lengthMenu": [
                        [10, 25, 50,100, -1],
                        [10, 25, 50,100, 'All'],
                    ] */
                }).draw();
                init_plantmarkers(plantdata);
			}
		});
	}
    (function($) {
		var table = $('#main_table').DataTable({
			"ordering": false
		});
        set_Site_Id();
        set_Plant_table();
    })(jQuery);
</script>
@endsection
