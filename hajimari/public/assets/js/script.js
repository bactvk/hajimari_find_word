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




})

//xem them
$(function() {
  let $ul = $("ul.pagination");
  $ul.hide(); // Prevent the default Laravel paginator from showing, but we need the links...
  var $listJob = $("#listJobs");
  var url = $ul.find("a[rel='next']").attr("href");

 

  var numberClick = 0;

  $(".see-more").click(function() {
  	var pageLength = $(this).attr('pagelength');
  	
  		numberClick++;
  	if(numberClick < pageLength){

  		$.get(url, function(response) {
           $listJob.append(
               $(response).find("#listJobs").html()
           );
      	});

  	}
  	
      
  });

});