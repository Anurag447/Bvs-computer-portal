console.log("hello");

function profile(){
    console.log("working");
}

console.log("hello");

// function profile(user_id){
//     console.log(user_id);
   
// }
//     $('#profile-modal').show();

//     $.ajax({
//         type: "post",
//         url: "/coaching/admin/get-profile.php",
//         data: {id:user_id},
//         success: function (res) {
//          let new_data=JSON.parse(res);
//         $("#up_id").val(new_data.id);
//       $("#up_name").val(new_data.name);
//       $("#up_pass").val('');
//   }
//     });
// }

// function closeModal(){
//     $('#profile-modal').hide();
// }




// // for update validation
// $("#update").click(function(){
//     var id = $("#up_id").val();
//     var name = $("#up_name").val();
//      var password = $("#up_pass").val();

   

//     if(password.trim() == ""  ||  password.length <8){
//         Swal.fire({
//             icon: "error",
//             title: "Oops...",
//             text: "Password must be at least 8 characters and can't empty!",
//           });
        
//          return;
//     }

//     $.ajax({
//         type: "post",
//         url: "/coaching/admin/update-profile.php",
//         data: {id:id, name:name,password:password},
//         success: function (response) {
//             if(response=="true"){
//                 Swal.fire({
//                     title: "Updated Successfully!",
//                     icon: "success",
//                     draggable: true
//                   });
//             }
//         }
//     });



// })







