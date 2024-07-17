@extends('layout.app')
@section('title', 'Choose Subject')
@section('content')

<form action="/add/subjects" method="POST">
    @csrf
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
          <div>
            <h2 class="font-semibold text-xl text-gray-600">Add Subjects To Grades</h2>
            {{-- <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p> --}}

            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
              <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-gray-600">
                  <p class="font-medium text-lg">Personal Details</p>
                  <p>Please fill out all the fields.</p>
                </div>

                <div class="lg:col-span-2">
                  <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                    <div class="md:col-span-5">
                      <label for="subject">Subject</label>
                      <select name="subject" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" id="subject">
                        @foreach ($subjects as $subject )
                        <option type="text" name="subject" id="subject"  value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach

                      </select>

                    </div>

                    <div class="md:col-span-5">
                        <label for="grade">Grade</label>
                        <select name="grade" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" id="grade">
                            @foreach ($grades as $grade)
                            <option type="text" name="grade" id="grade"  value="{{ $grade->id }}">{{  $grade->name  }}</option>
                            @endforeach

                        </select>

                      </div>

                    <div class="md:col-span-5 text-right">
                      <div class="inline-flex items-end">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
</form>


@push('styles')
@vite('resources/css/tailwind.css')
@endpush

@endsection
