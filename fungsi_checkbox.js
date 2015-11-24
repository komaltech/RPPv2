$(function(){
 
// Fungsi Checkbox Pilih Semua
$("#pilihsemua").click(function () { // Jika Checkbox Pilih Semua di ceklis maka semua sub checkbox akan diceklis juga
$(‘.pilih’).attr(‘checked’, this.checked);
});
 
// Jika semua sub checkbox diceklis maka Checkbox Pilih Semua akan diceklis juga
$(".pilih").click(function(){
 
if($(".pilih").length == $(".pilih:checked").length) {
$("#pilihsemua").attr("checked", "checked");
} else {
$("#pilihsemua").removeAttr("checked");
}
 
});
});
