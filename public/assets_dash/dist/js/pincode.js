function get_state_city(){
    var pincode = jQuery('#pincode').val();
    if(pincode==''){
      jQuery('#city').val('');
      jQuery('#state').val('');
    }else{
      jQuery.ajax({
        url:'{{route('dashboard.getPinCodeDetails')}}',
        type:'post',
        data:'pincode='+pincode+'&_token={{csrf_token()}}',
        success:function(data){
          if(data=='no'){
            alert('Wrong Pincode');
            jQuery('#city').val('');
            jQuery('#state').val('');
          }else{
            var getData=$.parseJSON(data);
            jQuery('#city').val(getData.city);
            jQuery('#state').val(getData.state);
          }
        }
      });
    }
    }