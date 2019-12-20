<script>
           
           $('#menu').mouseenter(function(){
               $('#submenu').slideDown()
           });
           
           $("div:not(#submenu, .header)").hover(function(){
               $('#submenu').slideUp(700)
           });
           
           
           
           
           
//           var block = false;
//           $("#menu").mouseenter(function(){
//               if (!block){
//                   block=true;
//                   $("#submenu").slideDown(400, function(){
//                       block=false;
//                   });
//               }
//           });
//           $("#menu").mouseleave(function(){
//               if (!block){
//                   block=true;
//                   $("#submenu").slideUp(2000, function(){
//                       block=false;
//                   });
//               }
//           });
           
           
           
//           $('#menu').on("mouseover" ,function() {
//               $(this).data( 'over' , setTimeout(function(){
//                $('#submenu').slideToggle();
//                }, 500));
//           })
//           .on('mouseout' , function(){
//               clearTimeout($(this).data('over'));
//           });
        
        </script>