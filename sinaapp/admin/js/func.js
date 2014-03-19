function submitext(formid, retid, url,ret) {
	$.ajax({
		url : url,
		data : $(formid).serialize(),
		type : "GET",
		beforeSend : function () {},
		success : function (msg) {
			$(retid).html(msg);
			ret();
		}
	});
	return false;
}

function SwitchOpt(node, url,ret) {
	if (node.className == 'active')
		return;
	$("ul").find(".active").removeClass("active");
	node.className = 'list-group-item active';
	$('input[name="url"]').val(url);
	submitext('#its', '.main', 'main.php',ret);
}


  function post(dataurl,formid,retid)
  {
  $.post(dataurl,$(formid).serialize(),function (result){
  $(retid).html(result);
  },'text');
  return false; 
  }




/* 	function submitext2(formid,retid,url){

$.post(url,$(formid).serialize(),function (resultData){
$(retid).html(resultData);
},'text');
return false;
} */
