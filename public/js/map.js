    var x = document.getElementById("demo");
    function getLocation() {
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
    x.innerHTML = "Geolocation không được hỗ trợ bởi trình duyệt này.";
    }
    }
    function showPosition(position) {
    //vi do
    lat = position.coords.latitude;
    //kinh do
    lon = position.coords.longitude;
    document.getElementById("diachi").value = lat +','+  lon;
    latlon = new google.maps.LatLng(lat, lon)
    mapholder = document.getElementById('mapholder')
    mapholder.style.height = '250px';
    mapholder.style.width = '500px';
    var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
    var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
    }
    function showError(error) {
    switch(error.code) {
    case error.PERMISSION_DENIED:
    x.innerHTML = "Người sử dụng từ chối cho xác định vị trí."
    break;
    case error.POSITION_UNAVAILABLE:
    x.innerHTML = "Thông tin vị trí không có sẵn."
    break;
    case error.TIMEOUT:
    x.innerHTML = "Yêu cầu vị trí người dùng vượt quá thời gian quy định."
    break;
    case error.UNKNOWN_ERROR:
    x.innerHTML = "Một lỗi xảy ra không rõ nguyên nhân."
    break;
    }
    }