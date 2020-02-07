$(document).ready(function(){
	
	$('input.place_work_search').click(function(){

		if($('input.place_work_search').siblings().hasClass("show")){
			$('input.place_work_search').siblings().removeClass("show");
		}else $(this).siblings().addClass("show");	

	})
	

	var city = '',field='',salary_level='',languge_level='';
	var total_checked_workplace = 0 ,total_checked_field_search = 0 ,total_checked_field_search_salary = 0 ,total_checked_field_search_languge = 0;
	$('body').on('click','.workplace',function(){

		if($(this).prop('checked')){
			total_checked_workplace += 1;
			city += $(this).parent().text()+',';
		}else{
			total_checked_workplace -= 1;
			city = city.replace($(this).parent().text()+',','');
		}
		if(total_checked_workplace > 3){
			$('input.place_work_search').siblings().removeClass("show");

			$(this).parent().parent().parent().html('<li style="padding:8px 14px;border:1px solid">You can only select 3 items</li>');
		}else{
			$(this).parent().parent().parent().siblings('.place_work_search').attr('value',city.replace(/,\s*$/, ""));
		}
		
	})

	$('body').on('click','.field_search',function(){

		if($(this).prop('checked')){
			total_checked_field_search += 1;
			field += $(this).parent().text()+',';
		}else{
			total_checked_field_search -= 1;
			field = field.replace($(this).parent().text()+',','');
		}

		if(total_checked_field_search > 3){
			$('input.place_work_search').siblings().removeClass("show");

			$(this).parent().parent().parent().html('<li style="padding:8px 14px;border:1px solid">You can only select 3 items</li>');
		}else{
			$(this).parent().parent().parent().siblings('.place_work_search').attr('value',field.replace(/,\s*$/, ""));
		}
		
	})

	$('body').on('click','.field_search_salary',function(){

		if($(this).prop('checked')){ 
			total_checked_field_search_salary += 1;
			salary_level += $(this).parent().text()+',';
			
		}else{
			total_checked_field_search_salary -= 1;
			salary_level = salary_level.replace($(this).parent().text()+',','');
		}

		if(total_checked_field_search_salary > 3){
			$('input.place_work_search').siblings().removeClass("show");

			$(this).parent().parent().parent().html('<li style="padding:8px 14px;border:1px solid">You can only select 3 items</li>');
		}else{
			$(this).parent().parent().parent().siblings('.place_work_search').attr('value',salary_level.replace(/,\s*$/, ""));
		}
	})

	$('body').on('click','.field_search_languge',function(){ 

		if($(this).prop('checked')){
			total_checked_field_search_languge += 1;
			languge_level += $(this).parent().text()+',';
		}else{
			total_checked_field_search_languge -= 1;
			languge_level = languge_level.replace($(this).parent().text()+',','');
		}

		if(total_checked_field_search_languge > 3){
			$('input.place_work_search').siblings().removeClass("show");

			$(this).parent().parent().parent().html('<li style="padding:8px 14px;border:1px solid">You can only select 3 items</li>');
		}else{
			$(this).parent().parent().parent().siblings('.place_work_search').attr('value',languge_level.replace(/,\s*$/, ""));
		}	
	})


	// select2
	$(".js-example-basic-multiple").select2({
	    placeholder: "Địa điểm làm việc",
	    maximumSelectionLength: 3,
	    closeOnSelect: false
	});

	// $(".js-example-basic-multiple").on("select2:select", function (e) { 
	//   var select_val = $(e.currentTarget).val();
	//   $(this).siblings().val(select_val);
	//   console.log(select_val)
	// });

	
	// 



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



