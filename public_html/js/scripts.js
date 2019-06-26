jQuery('.aClass').click(function(e){
   e.preventDefault(); //to prevent the default behaviour of a tag 
   var val = jQuery('#reporte').val(); //get prvious value
   if(jQuery(this).text() == 'Action'){
       jQuery('#reporte').val(val + 'Thank You ');
   }else{
       jQuery('#reporte').val(val + 'Good Luck ');
   }
});
