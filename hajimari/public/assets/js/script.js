$(document).ready(function(){
	

	$('input.place_work_search').click(function(){

		if($('input.place_work_search').siblings().hasClass("show")){

			$('input.place_work_search').siblings().removeClass("show");
		}else{
			$(this).siblings().toggleClass("show");
		}

	})
	

	var city = '',field='',salary_level='',languge_level='';

	$('body').on('click','.workplace',function(){

		if($(this).prop('checked')){
			city += $(this).parent().text()+',';
		}else{
			city = city.replace($(this).parent().text()+',','');
		}
		$(this).parent().parent().parent().siblings('.place_work_search').attr('value',city.replace(/,\s*$/, ""));
	})

	$('body').on('click','.field_search',function(){

		if($(this).prop('checked')){
			field += $(this).parent().text()+',';
		}else{
			field = field.replace($(this).parent().text()+',','');
		}
		$(this).parent().parent().parent().siblings('.place_work_search').attr('value',field.replace(/,\s*$/, ""));
	})

	$('body').on('click','.field_search_salary',function(){

		if($(this).prop('checked')){
			salary_level += $(this).parent().text()+',';
			
		}else{
			salary_level = salary_level.replace($(this).parent().text()+',','');
		}
		$(this).parent().parent().parent().siblings('.place_work_search').attr('value',salary_level.replace(/,\s*$/, ""));
	})

	$('body').on('click','.field_search_languge',function(){

		if($(this).prop('checked')){
			languge_level += $(this).parent().text()+',';
		}else{
			languge_level = languge_level.replace($(this).parent().text()+',','');
		}
		$(this).parent().parent().parent().siblings('.place_work_search').attr('value',languge_level.replace(/,\s*$/, ""));
	})


	// $(".js-example-basic-multiple").select2({
	//     placeholder: "Địa điểm làm việc",
	//     maximumSelectionLength: 3,
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

	

})



