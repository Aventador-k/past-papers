@extends('layout.app')
@section('title', 'All Paper')

@section('content')
    <div class="tb-conatainer">
        <h1 class="heading">EXAMINATION PAPERS</h1>
        <!-- <input type="text" id="myinput" onkeyup="search()" placeholder="NAME" /> -->

        <table class="table" id="mytable" data-filter-control="true" data-show-search-clear-button="true">
            <thead>
                <tr>
                    <th>
                        Year
                    </th>
                    <th>
                       Paper Name
                    </th>
                    <!-- <th>
                <input type="text" class="search-input" placeholder="batch" />
              </th>
              <th>
                <input type="text" class="search-input" placeholder="training" />
              </th>
              <th>
                <input type="text" class="search-input" placeholder="status" />
              </th> -->
                    <th>
                        <!-- <input type="text" class="search-input" placeholder="purchase" /> -->
                        <u>PURCHASE</u>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($papers as $paper )
                <tr>
                    <td>{{ $paper->year }}</td>
                    <td>{{ $paper->title }}</td>
                    <td><a href="#" class="btn">PURCHASE</a></td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script src="/papers.js"></script>

    @push('styles')
        @vite('resources/css/papers.css')
    @endpush
@endsection
