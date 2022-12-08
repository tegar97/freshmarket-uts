 </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js" integrity="sha512-94dgCw8xWrVcgkmOc2fwKjO4dqy/X3q7IjFru6MHJKeaAzCvhkVtOS6S+co+RbcZvvPBngLzuVMApmxkuWZGwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
 <script type="text/javascript">
     $(function() {
         $('#category-name').on('keyup', function() {
             $('#category-demo .category-demo-text').text($(this).val());
         });

     });

     $(function() {
         $('#color')
             .colorpicker({})
             .on('colorpickerChange', function(e) { //change the bacground color of the main when the color changes  
                 new_color = e.color.toString()
                 console.log($('#category-demo').css('background-color', new_color))
                 $('#category-demo').css('background-color', new_color)
             })
     });
     $(document).ready(() => {
         $('#icon').change(function() {
             console.log('tess')
             const file = this.files[0];
             console.log(file);
             if (file) {
                 let reader = new FileReader();
                 reader.onload = function(event) {
                     console.log(event.target.result);
                     $('#imgPreview').attr('src', event.target.result);
                 }
                 reader.readAsDataURL(file);
             }
         });
     });
 </script>
 <script>
     $(document).ready(function() {
         $('#table').DataTable();
     });
 </script>
 <script>
     $(function() {
         $("#price").keyup(function(e) {
             $(this).val(format($(this).val()));
         });
     });
     var format = function(num) {
         var str = num.toString().replace("", ""),
             parts = false,
             output = [],
             i = 1,
             formatted = null;
         if (str.indexOf(".") > 0) {
             parts = str.split(".");
             str = parts[0];
         }
         str = str.split("").reverse();
         for (var j = 0, len = str.length; j < len; j++) {
             if (str[j] != ",") {
                 output.push(str[j]);
                 if (i % 3 == 0 && j < (len - 1)) {
                     output.push(",");
                 }
                 i++;
             }
         }
         formatted = output.reverse().join("");
         return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
     };
 </script>

 <script>
     const navbar = document.querySelector(".col-navbar");
     const cover = document.querySelector(".screen-cover");

     const sidebar_items = document.querySelectorAll(".sidebar-item");

     function toggleNavbar() {
         navbar.classList.toggle("d-none");
         cover.classList.toggle("d-none");
     }

     function toggleActive(e) {
         sidebar_items.forEach(function(v, k) {
             v.classList.remove("active");
         });
         e.closest(".sidebar-item").classList.add("active");
     }
 </script>
 </body>

 </html>