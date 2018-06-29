var lim ;
$(function(){
	lim =0;
	$(".money").each(function(){
		if(parseInt($(this).text()) > lim)
			lim = parseInt($(this).text());

});
	var slide = $("#ex12c").slider({ id: "slider12c", min: 0, max: lim, step : 5, range : true , value: [0,lim] });
	$("#lim").text(lim);
	$("#clear_com").hide();
	$("#clear_tit").hide();
	$("#clear_pri").hide();
	$("#min").val(parseInt($("#ex12c").slider('getValue')[0]));
	$("#max").val(parseInt($("#ex12c").slider('getValue')[1]));

});

$('.dropdown-menu').click(function(e) {
    e.stopPropagation();
});

$("#ex12c").change(function(){
	constraint();
});

var j=0,flag,i;
var checker=[];
$("#company").find($("input[type=checkbox]")).change(function(){
	checker.length = 0;
	j=0;
	constraint();
});

$("#title").find($("input[type=checkbox]")).change(function(){
	checker.length = 0;
	j=0;
	constraint();
});

$("#clear_com").click(function(){
	$("#company").find("input[type=checkbox]:checked").prop("checked", false);
	constraint();
});

$("#clear_tit").click(function(){
	$("#title").find("input[type=checkbox]:checked").prop("checked", false);
	constraint();
});

$("#clear_pri").click(function(){
	var arr = [0,lim];
	$("#ex12c").slider("setValue",arr);
	constraint();
});

function constraint(){

	$(".product").parent().show();
	if($("#company").find("input[type=checkbox]:checked").length != 0){
		$("#company").find("input[type=checkbox]:checked").each(function(){
			checker[j]=$(this).attr("id").toUpperCase();
			j++; 
		});
		$(".com").each(function(){
			flag = 0;
			i=0;
			while(i < checker.length){
				if($(this).text().toUpperCase() == checker[i])
					flag =1 ;
				i++;
			}
			if(!flag)
				$(this).parent().parent().parent().hide();
			
		});
		$("#clear_com").show();
	}
	else
		$("#clear_com").hide();

	if($("#title").find("input[type=checkbox]:checked").length != 0){
		$("#title").find("input[type=checkbox]:checked").each(function(){
			checker[j]=$(this).attr("id").toUpperCase();
			j++; 
		});
		$(".tit").each(function(){
			flag = 0;
			i=0;
			while(i < checker.length){
				if($(this).text().toUpperCase() == checker[i])
					flag =1 ;
				i++;
			}
			if(!flag)
				$(this).parent().parent().parent().hide();	
		});
		$("#clear_tit").show();	
	}
	else
		$("#clear_tit").hide();

	var min_val = parseInt($("#ex12c").slider('getValue')[0]);
	var max_val = parseInt($("#ex12c").slider('getValue')[1]);
	$("#min").val(min_val); 
	$("#max").val(max_val);
	$(".money").each(function(){
		if(parseInt($(this).text()) < min_val || parseInt($(this).text()) > max_val)
		$(this).parent().parent().parent().parent().hide();
	});
	if(min_val == 0 && max_val == lim)
		$("#clear_pri").hide();
	else
		$("#clear_pri").show();
}

