<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      @vite(['resources/css/app.css', 'resources/js/app.js'])
      <title>Электронный архив</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  </head>

  <body class="text-center h-100">

  
    <div class="header_cover h-100 text-bg-dark">
      
        <x-header title="Электронный архив"/>
    
        <x-content_header/>
    
    </div>
  
  
    <div class="container">
        <div class="row">
            <div class="col">
                <x-search-document/>
            </div>
        </div>
    </div>
  


  <footer class="footer">
    <x-footer/>
  </footer>

  </body>
</html>