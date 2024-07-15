@extends('layout.app')
@section('title','Home')
@section('content')
<header class="header">
    <a href="#" class="logo"><u>NAC</u></a>
    <i class="fa-solid fa-bars" id="menu"></i>
    <nav class="navbar">
      <a href="#">HOME</a>
      <a href="#c">EXAMS</a>
      <a href="#b">ABOUT</a>
      <a href="#d">CONTACT</a>
    </nav>
</header>
<section class="a" style="background-image: url(/images/math.jpg)">
    <div class="card">
      <div class="container">
        <u><h1>NAC</h1></u>
        <h2>National Assessment Consortings</h2>
        <p>
          The ability to bring you good quality material,for knowledge
          practice and brain juice.
        </p>
      </div>
      <button class="btn">
        <a href="#c">EXAMS</a>
      </button>
    </div>
  </section>

  <section class="b" id="b">
    <div class="container">
      <div class="image">
        <img src="/images/brain-power.jpg" alt="" />
      </div>
      <div class="content">
        <h1><u>ABOUT-US</u></h1>
        <p>
          Welcome to National Assessment Consortings, your trusted platform
          for online exams and assessments. Whether you're a student preparing
          for a crucial exam, an educator looking to streamline the assessment
          process, or an organization seeking reliable testing solutions,
          we've got you covered.
        </p>
      </div>
    </div>
    <div class="container">
      <div class="image">
        <img src="/images/mathbord.jpg" alt="" />
      </div>
      <div class="content">
        <h1><u>OUR-MISSION</u></h1>
        <p>
          At National Assessment Consortings, our mission is to empower
          learners and educators by providing a user-friendly, secure, and
          efficient platform for conducting exams and assessments. We strive
          to enhance the learning experience and facilitate fair evaluation
          through innovative technology and comprehensive tools.
        </p>
      </div>
    </div>
    <div class="container">
      <div class="image">
        <img src="/images/red-balloon.jpg" alt="" />
      </div>
      <div class="content">
        <h1><u>WHAT-SETS-US-APART</u></h1>
        <p>
          Quality Assurance: We partner with reputable publishers and content
          providers to ensure that all materials available on our platform are
          accurate, up-to-date, and aligned with the latest exam standards and
          requirements. <br />
          <br />
          Competitive Pricing: Enjoy competitive prices on all our products,
          with regular discounts and promotions to help you stretch your
          budget further without compromising on quality. <br />
          <br />
          Exceptional Customer Service: Our dedicated customer support team is
          here to assist you with any questions, concerns, or technical issues
          you may encounter. We're committed to providing prompt, friendly,
          and personalized service to ensure your shopping experience is
          smooth and hassle-free.
        </p>
      </div>
    </div>
  </section>

  {{--  TODO USE SUBJECTID AS THE SEARCH PARAM --}}

  <section class="c" id="c" style="background-image: url(/images/math.jpg)">
    <div class="contain">
      <h1><u>EXAMS</u></h1>
      <p>
        Below is a collection of all the available grade exams. <br />
        Select one of the grades to procede to the next step. <br />
        <br />THNK YOU AND WELCOME. <br />
      </p>
      <div class="cards">
        <button class="btn open-pp1"><a href="#">GRADE:PP1</a></button>
        <button class="btn open-pp2"><a href="#">GRADE:PP2</a></button>
        <button class="btn open-pp3"><a href="#">GRADE:PP3</a></button>
        <button class="btn open-pp4"><a href="#">GRADE:PP4</a></button>
        <button class="btn open-pp5"><a href="#">GRADE:PP5</a></button>
        <button class="btn open-pp6"><a href="#">GRADE:PP6</a></button>
      </div>
    </div>

    <dialog class="modal" id="modal">
      <h3>FROM THIS SECTION,CHOOSE THE SUBJECT</h3>
      <div class="buttons">
        @foreach ($subjects as $subject)
        <button class="btn"><a href="/papers?subject={{ $subject->id }}">{{ $subject->name }}</a></button>
        @endforeach
      </div>
      <div class="close">
        <button type="button" class="close btn">CLOSE</button>
      </div>
    </dialog>
  </section>

  <section class="d" id="d" style="background-image: url(/images/netnodes.jpg)">
    <div class="contain">
      <h1>CONTACT-US</h1>
      <div class="items">
        <div class="contact">
          <div class="info">
            <i class="fa-solid fa-phone-volume icon"></i>
            <div class="phone">
              <h3>PHONE</h3>
              <p>0744226644</p>
            </div>
          </div>
          <div class="info">
            <i class="fa-solid fa-envelope-circle-check icon"></i>
            <div class="phone">
              <h3>EMAIL</h3>
              <p>supreme-monkey@gmail.com</p>
            </div>
          </div>
          <div class="info">
            <i class="fa-solid fa-location-dot icon"></i>
            <div class="phone">
              <h3>ADDRESS</h3>
              <p>
                2345 sugar-base camp <br />
                NEW YOURK 5000
              </p>
            </div>
          </div>
        </div>
        <div class="send">
          <h1>SEND A MESSAGE</h1>
          <input type="text" placeholder="Full Name" class="name" />
          <input type="email" placeholder="Email" />
          <input type="type" placeholder="TYPE MESSAGE" />
          <button type="submit">SEND</button>
        </div>
      </div>
    </div>
  </section>



  <script src="/js.js"></script>

  @push('styles')
  @vite('resources/css/app.css')
  @endpush
@endsection


