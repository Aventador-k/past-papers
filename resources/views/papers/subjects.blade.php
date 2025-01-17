@extends('layout.app')
@section('title', 'Choose Subject')
@section('content')
<dialog class="modal" id="modal">
    <h3>FROM THIS SECTION,CHOOSE THE SUBJECT</h3>
    <div class="buttons">
        @if (count($subjects) <= 0)
            <h1>No Subjects Available For The Selected Grade</h1>
        @else
        @foreach ($subjects as $subject)
        <button class="btn"><a href="/papers?subject={{ $subject->subjectId }}&grade={{ $subject->gradeId }}">{{ $subject->name }}</a></button>
        @endforeach
        @endif

    </div>
    <div class="close">
      <button type="button" class="close btn">CLOSE</button>
    </div>
  </dialog>
<script>
    const open = document.querySelectorAll('.open-pp1');
    const close = document.querySelector('.close');
    modal.showModal();
</script>
  @push('styles')
  @vite('resources/css/app.css')
  @endpush
@endsection
