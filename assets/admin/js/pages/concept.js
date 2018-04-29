/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(function() {
  $('.date_picker').datepicker()
  $('.sidebar-menu').find('li').removeClass('active');
  $('.sb-concept').parent('li').addClass('active');
  $('#dataTable').dataTable({
      "bPaginate": true,
      "bLengthChange": true,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": true
  });

  $("#editForm").validate({
    rules: {
      title: "required",
    },
    messages: {
      title: "Please enter title"
    },
    submitHandler: function() {
      var data_form = $('#editForm').serialize();
      $.ajax({
        type: 'post',
        url: $('#editForm').attr('action'),
        data: data_form,
        dataType: 'json',
        success: function(rs){
          if (rs.status){
            $('.notification').hide();
            $('.msg-success').text(rs.msg);
            $('.alert-success').fadeIn('slow');
            $('#form').trigger('reset');
          }
          else{
              $('.notification').hide();
              $('.msg-error').text(rs.msg);
              $('.alert-danger').fadeIn('slow');
          }
          var hideNoti = setTimeout(function(){
                  $('.notification').fadeOut('slow');
              },2000);
          return false;
        }
      });
      return false;
    }
  });

  $('.deleteItem').click(function() {
    var href = $(this).attr("href");
    $.ajax({
        type: 'post',
        url: href,
        dataType: 'json',
        success: function(rs) {
            if (rs.status) {
                window.location.reload();
                return false;
            }
            else {
                return false;
            }
        }

    });
    return false;
  });

  $('#import_csv').on('submit', function (e) {

    e.preventDefault();

      $.ajax({
        method: 'POST',
        url: $('#import_csv').attr('action'),
        data: new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        dataType: 'json',
        success: function(rs){
          $('#import_csv')[0].reset();
          var message = '';
          for(var i=0; i< rs.msg.length; i++){
            message += '<br>' + rs.msg[i];
          }
          if (rs.status){
            $('.notification').hide();
            $('.msg-success').text(rs.msg);
            $('.alert-success').fadeIn('slow');
          }
          else{
              $('.notification').hide();
              $('.msg-error').html(message);
              $('.alert-danger').fadeIn('slow');
          }
          // var hideNoti = setTimeout(function(){
          //         $('.notification').fadeOut('slow');
          //     },2000);
          return false;
        }
      });

  });
});
