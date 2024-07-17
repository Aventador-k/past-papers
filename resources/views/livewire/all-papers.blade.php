<section class="a">
    <div class="container-search">
      <h1>SEARCH THE YEAR OF EXAM YOU WISH TO AQUIRE</h1>
      <div class="search-bar">
        <input
          type="search"
          class="search"
          id="searchinput"
          placeholder="SEARCH...."
          wire:model.live="search"
        />
        <i class="fa-brands fa-searchengin" id="icon"></i>
      </div>
    </div>

    <div id="cardcontainer">

      @foreach ($papers as $paper)
      <div class="card">
          <h3>Subject:{{ $paper->title }}</h3>
          <h3>Year: {{ $paper->year }}</h3>
          <p>Class:{{ $paper->name }}</p>
          <a href="/payments/details/{{ $paper->id }}">
              <button  type="button" class="button">Purchase</button>
          </a>
      </div>
      @endforeach
    </div>
  </section>
