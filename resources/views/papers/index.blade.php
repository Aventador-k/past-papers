<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../font-awesome/css/all.css" />
    <link rel="stylesheet" href="style.css" />
    @vite('resources/css/papers.css')
    <title>Papers Page</title>
  </head>
  <body style="background-image: url(/images/chemistry.jpg)">
    <x-nav-bar/>
    <livewire:all-papers/>
    {{-- <script src="/papers.js"></script> --}}

  </body>
</html>
