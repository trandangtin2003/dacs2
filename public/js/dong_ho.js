function Dong_ho() {
    var gio = document.getElementById("gio");
    var phut = document.getElementById("phut");
    var giay = document.getElementById("giay");
    var buoi = document.getElementById("buoi");
    var Gio_hien_tai = new Date().getHours();
    var Phut_hien_tai = new Date().getMinutes();
    var Giay_hien_tai = new Date().getSeconds();
    gio.innerHTML = Gio_hien_tai;
    phut.innerHTML = Phut_hien_tai;
    giay.innerHTML = Giay_hien_tai;
    if(Gio_hien_tai>=3 && Giay_hien_tai<10){
        buoi.innerHTML = "SÁNG";
    }
    if (Gio_hien_tai<=15 && Giay_hien_tai>=10) {
        buoi.innerHTML = "TRƯA";
    } else {
        buoi.innerHTML = "night";
    }
   
   
}
var Dem_gio = setInterval(Dong_ho, 1000);



