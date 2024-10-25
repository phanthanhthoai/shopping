
$(document).on('click','.action_delete',function(event)
{
     event.preventDefault();
     let urlRequest = $(this).data('url');
     let that =$(this);
     Swal.fire({
          title: "Bạn chắc chắn muốn xóa?",
          text: "Sẽ không khôi phục lại được",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Xóa"
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
               type: 'GET',
               url: urlRequest,
               success: function(data){
                    if(data.code == 200){
                         that.parent().parent().remove();
                    }
               },
               error: function(){

               }
            })
          }
        });
});



