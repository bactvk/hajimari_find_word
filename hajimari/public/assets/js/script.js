$(document).ready(function(){
	
	$('input.place_work_search').click(function(){
		$(this).siblings().toggleClass("show");;
	})
	
	var city = '',field='',salary_level='',languge_level='';

	$('body').on('click','.workplace',function(){

		if($(this).prop('checked')){
			city += $(this).parent().text()+',';
			$(this).parent().parent().parent().siblings('.place_work_search').attr('value',city);
		}else{
			city = '';
		}
	})

	$('body').on('click','.field_search',function(){

		if($(this).prop('checked')){
			field += $(this).parent().text()+',';
			$(this).parent().parent().parent().siblings('.place_work_search').attr('value',field);
		}else{
			field = '';
		}
	})

	$('body').on('click','.field_search_salary',function(){

		if($(this).prop('checked')){
			salary_level += $(this).parent().text()+',';
			$(this).parent().parent().parent().siblings('.place_work_search').attr('value',salary_level);
		}else{
			salary_level = '';
		}
	})

	$('body').on('click','.field_search_languge',function(){

		if($(this).prop('checked')){
			languge_level += $(this).parent().text()+',';
			$(this).parent().parent().parent().siblings('.place_work_search').attr('value',languge_level);
		}else{
			languge_level = '';
		}
	})


	$(".js-example-basic-multiple").select2({
	    placeholder: "Địa điểm làm việc",
	    maximumSelectionLength: 3,
	});
	

})

//see more
// $(function() {
//   var $ul = $("ul.pagination");
//   $ul.hide();
//   var $listJob = $("#listJobs");
//   var url = $ul.find("a[rel='next']").attr("href");   //hajimari.localhost.vn/?workplace%5B0%5D=1&laguageLevel%5B0%5D=2&page=3
//   var numberClick = 0;

//   var tmp = url.split("=");  //get page
//   var page = parseInt(tmp[tmp.length-1])-1;

//   // alert(url);

//   $(".see-more").click(function() {

//   	page++;

//   	var tmp = url.lastIndexOf("=");
//   	var url_slice = url.slice(0,tmp);
//   	url = url_slice+"="+page;
  	

//   	var pageLength = $(this).attr('pagelength');
  	
//   		numberClick++;
//   	if(numberClick < pageLength){

//   		$.get(url, function(data) {
//            $listJob.append(
//                $(data).find("#listJobs").html()
//            );
//       	});

  		
//   	}else { $(this).css('display','none'); }
  	
      
//   });

// });

$(function() {
  	
  	var page = 1;
    
    $('.see-more').click(function(){
    	page += 1;
    	var url = $(this).attr('url');
    	
    	$.get(url,{ page : page } ,function(data) {
    		var html = '';
    		for (var item in data){
    			// console.log(data[item]);
    			if(data[item]['lang_id']!=null) data[item]['lang_id']="N"+data[item]['lang_id'];
    			else data[item]['lang_id'] = '';

    			html += '<tr>'+
	              '<td>' + data[item]['job_category_name'] + '</td>'+
	              '<td>' + data[item]['name'] + '</td>'+
	              '<td>'+ data[item]['area_name'] + '</td>'+
	              '<td>' + data[item]['lang_id'] +'</td>'+
	              '<td>'+ data[item]['salary_from'] + "-" + data[item]['salary_to']+'$' + '</td>'+
	            '</tr>';

    		}
    		// console.log(html);
    		if(data.length>0 )
           		$('#listJobs').append(html);
	      	else{
	      		
	      		$('.see-more').css('display','none');
	      	}
	  	});


    })
	

});