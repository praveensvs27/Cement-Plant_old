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
	<div class="row mb-3">
		<div class="col-md-9">
            <div id="map" style="width:100%;height: 600px;"></div>
            <script>
                let map, activeInfoWindow, markers = [];

                /* ----------------------------- Initialize Map ----------------------------- */
                function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: {
                            lat: 11.3410,
                            lng: 77.7172,
                        },
                        zoom: 6.5
                    });
                    map.addListener("click", function(event) {
                        mapClicked(event);
                    });
                    initMarkers();
                }

                /* --------------------------- Initialize Markers --------------------------- */
                function initMarkers() {
                    const initialMarkers = [{"position":{"lat":11.341,"lng":77.7172},"label":{"color":"white"},"draggable":true},{"position":{"lat":11.6643,"lng":78.146},"label":{"color":"white"},"draggable":false},{"position":{"lat":13.08268,"lng":80.270721},"label":{"color":"white"},"draggable":true},{"position":{"lat":9.925201,"lng":78.119774},"label":{"color":"white"},"draggable":true}];

                    for (let index = 0; index < initialMarkers.length; index++) {

                        const markerData = initialMarkers[index];
                        const marker = new google.maps.Marker({
                            position: markerData.position,
                            label: markerData.label,
                            draggable: markerData.draggable,
                            map
                        });
                        markers.push(marker);

                        const infowindow = new google.maps.InfoWindow({
                            content: `<b style='color:;'>${markerData.position.lat}, ${markerData.position.lng}</b>`,
                        });
                        marker.addListener("click", (event) => {
                            if(activeInfoWindow) {
                                activeInfoWindow.close();
                            }
                            infowindow.open({
                                anchor: marker,
                                shouldFocus: false,
                                map
                            });
                            activeInfoWindow = infowindow;
                            markerClicked(marker, index);
                        });

                        marker.addListener("dragend", (event) => {
                            markerDragEnd(event, index);
                        });
                    }
                }

                /* ------------------------- Handle Map Click Event ------------------------- */
                function mapClicked(event) {
                    console.log(map);
                    console.log(event.latLng.lat(), event.latLng.lng());
                }

                /* ------------------------ Handle Marker Click Event ----------------------- */
                function markerClicked(marker, index) {
                    console.log(map);
                    console.log(marker.position.lat());
                    console.log(marker.position.lng());
                }

                /* ----------------------- Handle Marker DragEnd Event ---------------------- */
                function markerDragEnd(event, index) {
                    console.log(map);
                    console.log(event.latLng.lat());
                    console.log(event.latLng.lng());
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAJGUYUdhVOmp1DoDe640xRLCE7JjFZdMw&callback=initMap" async></script>
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
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <div class="form-group mb-0">
                <label class="text-label mb-0">State List</label>
                <div style="background-color: #fff;border:1px solid #eaeaea;height:150px;overflow-y: scroll;">
                    <ul class="list-group" id="state_checkbox_list">
                        <!--<li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck1" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck1">Margherita</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck2" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck2">Pepperoni</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck3" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck3">Prosciutto</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck4" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck4">Neapolitano</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck5" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck5">Tarantella</label>
                            </div>
                        </li>-->
                    </ul>
                </div>
            </div>
            <div class="form-group mb-0">
                <label class="text-label mb-0">Group List</label>
                <div style="background-color: #fff;border:1px solid #eaeaea;height:150px;overflow-y: scroll;">
                    <ul class="list-group" id="group_checkbox_list">
                        <!--<li class="list-group-item rounded-0">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck1" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck1">Margherita</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck2" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck2">Pepperoni</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck3" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck3">Prosciutto</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck4" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck4">Neapolitano</label>
                            </div>
                        </li>
                        <li class="list-group-item rounded-0">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck5" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck5">Tarantella</label>
                            </div>
                        </li>-->
                    </ul>
                </div>
            </div>
            <div class="form-group mb-0">
                <label class="text-label mb-0">Site List</label>
                <div style="background-color: #fff;border:1px solid #eaeaea;height:150px;overflow-y: scroll;">
                    <ul class="list-group">
                        <li class="list-group-item rounded-0">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck1" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck1">Margherita</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck2" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck2">Pepperoni</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck3" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck3">Prosciutto</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck4" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck4">Neapolitano</label>
                            </div>
                        </li>
                        <li class="list-group-item rounded-0">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="customCheck5" type="checkbox">
                                <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck5">Tarantella</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="main_table" class="display" style="min-width: 845px">
							<thead>
								<tr>
                                    <th>Sno</th>
                                    <th>From</th>
                                    <th>To</th>
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
                var tb_cont="";
                for (let i = 0; i < data.length; i++)
                {
                    var data1=data[i];
                    tb_cont+="<li class='list-group-item'><div class='custom-control custom-checkbox'><input class='custom-control-input' id='customCheck1' type='checkbox'><label class='cursor-pointer font-italic d-block custom-control-label' for='customCheck1'>"+data1["state_name"]+"</label></div></li>";
                }
                $("#state_checkbox_list").html(tb_cont);
            }
        });
    }
    function set_Cement_Group_Id()
    {
        var valu={column:"cement_group_id,cement_group",table:"cement_group"};
        jQuery.ajax({type: "GET",url: "/retrieve_db_table",data:valu,
            success: function(data) {
                var tb_cont="";
                for (let i = 0; i < data.length; i++)
                {
                    var data1=data[i];
                    tb_cont+="<li class='list-group-item'><div class='custom-control custom-checkbox'><input class='custom-control-input' id='customCheck1' type='checkbox'><label class='cursor-pointer font-italic d-block custom-control-label' for='customCheck1'>"+data1["cement_group"]+"</label></div></li>";
                }
                $("#group_checkbox_list").html(tb_cont);
            }
        });
    }
    (function($) {
        set_State_Id();
        set_Cement_Group_Id();
    })(jQuery);
</script>
@endsection
