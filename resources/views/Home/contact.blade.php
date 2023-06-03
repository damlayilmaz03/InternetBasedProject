@extends('layouts.frontbase')

@section('title','Contact | '.$setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)



  @section('content')
  


  <!-- Start Proerty header  -->

  <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Contact</h2>
            <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">HOME</a></li>            
            <li class="active">Contact</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- End Proerty header  -->

 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
          <div class="aa-contact-area">
            <div class="aa-contact-top">
             <div class="aa-contact-top-left">
                <iframe width="100%" height="450" frameborder="0" allowfullscreen="" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6851.201919469417!2d-86.11773906635584!3d33.47324776828677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x888bdb60cc49c571%3A0x40451ca6baf275c7!2s36008+AL-77%2C+Talladega%2C+AL+35160%2C+USA!5e0!3m2!1sbn!2sbd!4v1460452919256"></iframe>
              </div>
              <div class="aa-contact-top-right">
                
              <h2>Contact</h2>
                <p></p>
                  <div>
                       {!! $setting->contact !!}
                  </div>  
              </div>
              
              
            </div>
            <div class="aa-contact-bottom">
              <div class="aa-title">
              @include('home.messages')
                <h2>Send Your Message</h2>
                <span></span>
                <p>Your email address will not be published. Required fields are marked <strong class="required">*</strong></p>
              </div>
             
              <div class="aa-contact-form">
                <form action="{{route('storemessage')}}" class="contactform" method="post">         
                  @csrf         
                  <p class="comment-form-author">
                    <label for="author">Name <span class="required">*</span></label>
                    <input type="text" name="name" placeholder="Name & Surname" size="30" required="required">
                  </p>
                  <p class="comment-form-author">
                    <label for="author">Phone <span class="required">*</span></label>
                    <input type="text" name="phone" placeholder="Phone Number" size="30" required="required">
                  </p>
                  <p class="comment-form-email">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" name="email"  placeholder="Email" aria-required="true" required="required">
                  </p>
                  <p class="comment-form-url">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" placeholder="Subject">  
                  </p>
                  <p class="comment-form-comment">
                    <label for="message">Message</label>
                    <textarea name="message" cols="45" rows="8" placeholder="Your Message" aria-required="true" required="required"></textarea>
                  </p>                
                  <p class="form-submit">
                  <button type="submit" class="btn btn-primary">Send Message</button>
                  </p>        
                </form>
              </div>
            </div>
          </div>
       </div>
     </div>
   </div>
 </section>




  @endsection