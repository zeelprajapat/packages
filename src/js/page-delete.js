
// alert("hii");
// $(document).ready(function() {

//     $(".page_delete").click(function() {
//         alert("hii");
//         if (!confirm("Do you really want to delete page?")) {
//             return false;
//         }else{
//             $.ajax({
//                 type: "DELETE",
//                 url: "{{ route('page.destroy', ['page' => $value->id])}}",
//                 success: function(result) {
//                   // do something
//                 }
//               });
//         }
//     });

// });

$(".page_delete").click(function(id) {
    if (!confirm("Do you really want to delete page?")) {
        return false;
    }

});

