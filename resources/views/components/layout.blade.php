 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Thura Blog</title>
     <link rel="icon" type="image/svg+xml"
         href="https://img.freepik.com/free-vector/organic-flat-computer-programming-illustration_23-2148955256.jpg?t=st=1755321877~exp=1755325477~hmac=cf8ec9ce8b37c887a654f5b77f6829f92914412d9a64e22b07b101da7545be77&w=1060" />
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
         rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
     <script src="https://cdn.tailwindcss.com"></script>
 </head>



 <body style=" font-family: 'Montserrat'; " id="home" class="d-flex flex-column min-vh-100">


     <x-navbar />

     <main class="flex-grow-1 mt-20">
         {{ $slot }}
         <div id="app" class=""></div>
     </main>

     <x-footer />

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
     </script>

     <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
     <script>
         ClassicEditor
             .create(document.querySelector('.editor'))
             .catch(error => {
                 console.error(error);
             });
     </script>

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



 </body>

 </html>
