//state data

$(document).on('change','.country',function(){
var countryID=$(this).val();
if(countryID){
$.ajax({
type:'POST',
url:'backend.php',
data:{'country_id':countryID},
success:function(result){
$('.state').html(result);
}
});
}else{

$('.state').html('<option value="">country</option>');
$('.district').html('<option value="">State</option>');
}
});


//city data

$(document).on ('change','.state',function(){
var stateID=$(this).val();
if(stateID){
$.ajax({
type:'POST',
url:'backend.php',
data:{'state_id':stateID},
success:function(result){
$('.district').html(result);
}
});
}else{
$('.district').html('<option value="">distict</option>');
}
});