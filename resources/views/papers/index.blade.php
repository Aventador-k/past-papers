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
    <section class="a">
      <div class="container-search">
        <h1>SEARCH THE YEAR OF EXAM YOU WISH TO AQUIRE</h1>
        <div class="search-bar">
          <input
            type="text"
            class="search"
            id="searchinput"
            placeholder="SEARCH...."
          />
          <i class="fa-brands fa-searchengin" id="icon"></i>
        </div>
      </div>

      <div id="cardcontainer">
        @foreach ($papers as $paper)
        <div class="card">
            <h3>Subject:{{ $paper->title }}</h3>
            <h3>Year: {{ $paper->year }}</h3>
            <p>Class:{{ $paper->grade->name }}</p>
            <a href="/payments/details/{{ $paper->id }}">
                <button  type="button" class="button">Purchase</button>
            </a>
        </div>
        @endforeach
      </div>
    </section>
    <script src="/papers.js"></script>

  </body>
</html>
