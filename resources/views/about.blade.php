{{-- Header --}}
<x-header/>

{{-- Main navbar --}}
<x-main-nav/>
<br><br>

{{-- Top Portion --}}
<div class="container">
    <div class="row text-center">
      <div class="col-sm">
        <p class="main-header-text"><strong>Why think of security?</strong></p>
        <hr class="hr-customized">
        <p class="regular-text">In a world where more and more of our sensitive data is used by all kinds
            of applications, it is of utmost importance that these are handled in a clear
            and safe.
        </p>
      </div>

      <div class="col-sm">
        <p class="main-header-text"><strong>Risk mitigation</strong></p>
        <hr class="hr-customized">
        <p class="regular-text">There will always be risks when working with computer systems. It is our job,
            as developers and also as end users to be aware of the most common threats
            out there so that we can avoid and mitigate embarrassing situations.
        </p>
      </div>

      <div class="col-sm">
        <p class="main-header-text"><strong>Be reliable</strong></p>
        <hr class="hr-customized">
        <p class="regular-text">Your operations should be as reliable as possible to your clients.</p>
      </div>
    </div>
</div>
<hr>

{{-- Bottom Portion --}}
<div class="row custom-margin-left text-center mt-5">
    <div class="col-md-3">
        <p class="main-header-text"><strong>About the website</strong></p>
        <p class="regular-text">The idea behind this website is to share and to encourage people to think more
            about security themes. Security is often overlooked due to tight deadlines, 
            cost avoidence or even lack of knowledge. Being such an important area, this
            project will focus on sharing and learning important concepts of technological
            security. 
        </p>
    </div>

    <div class="col-sm-1"></div>
    <div class="col-md-3">
        <p class="main-header-text"><strong>About the author</strong></p>
        <p class="regular-text">Ever since i was a little kid, i always wondered what made things tick.
            I remember that i used to disassemble toys and equipments when i didnt
            needed them anymore, so i could learn a little bit of how they worked.
            This passion brough me to the technology field, where now i make my living.
            Today i'm a full stack web developer, but my true passion lies on the backend.
            Linux enthusiastic, interested also in penetration testing. I hope i can share
            a little bit of what i know with you, and also to learn a bunch more 
            along the way!
        </p>
    </div>

    <div class="col-sm-1"></div>
    <div class="col-md-3">
        <p class="main-header-text"><strong>Who am i?</strong></p>
        <img src="{{ asset('img/me.jpg') }}" class="rounded-circle float-left shadow-lg" alt="Me">
        <p class="regular-text">Graduated in IT at FATEC-RP (Faculdade de Tecnologia de Ribeirão Preto)
            in 2020. Full stack Web Developer, passionate about technology and security, meditation 
            and calisthenics. Brazilian, {{ date('Y') - 1994 }} years old.
        </p>
    </div>
</div>

{{-- Footer --}}
<x-footer/>