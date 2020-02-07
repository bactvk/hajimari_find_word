$(document).ready(function(){
	
	$('input.place_work_search').click(function(){

		if($('input.place_work_search').siblings().hasClass("show")){
			$('input.place_work_search').siblings().removeClass("show");
		}else $(this).siblings().addClass("show");	

	})	
	// select2
	$(".workplace").select2({
	    placeholder: "Địa điểm làm việc",
	    maximumSelectionLength: 3,
	    closeOnSelect: false
	});

	$(".field_search").select2({
	    placeholder: "Lĩnh vực",
	    maximumSelectionLength: 3,
	    closeOnSelect: false,
		    //style field parent
		templateResult: function (data) {    
		
		    if (!data.element) {
		      return data.text;
		    }

		    var $element = $(data.element);

		    var $wrapper = $('<span></span>');
		    $wrapper.addClass($element[0].className);

		    $wrapper.text(data.text);

		    return $wrapper;
		  }

	});

	$(".laguageLevel").select2({
	    placeholder: "Trình độ tiếng nhật",
	    maximumSelectionLength: 3,
	    closeOnSelect: false
	});
  
	$(".salaryLevel").select2({
	    placeholder: "Mức lương",
	    maximumSelectionLength: 3,
	    closeOnSelect: false
	});

	

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



