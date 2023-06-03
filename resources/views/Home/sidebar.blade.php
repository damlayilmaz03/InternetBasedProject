 <!-- Start menu section -->
 
    @php
    $mainCategories= \App\Http\Controllers\HomeController::maincategorylist()
    @endphp
 <section id="aa-menu-area">
    <nav class="navbar navbar-default main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->                                               
          <!-- Text based logo -->
           <a class="navbar-brand aa-logo" href="{{route('admin')}}"> Home <span>Sale</span></a>
           <!-- Image based logo -->
           <!-- <a class="navbar-brand aa-logo-img" href="index.html"><img src="{{asset('assets')}}/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
          
            <li class="{{ '/' == request()->path() ? 'active' : '' }}" ><a href="{{route('admin')}}">HOME</a></li>
            
            @foreach($mainCategories as $rs) 
             <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="" >{{$rs->title}}<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu"> 
                       @if(count($rs->children))
                            @include('home.categorytree',['children' => $rs->children])
                          @endif 
              </ul>
            </li>
            @endforeach
   
            <li class="{{ 'admin/about' == request()->path() ? 'active' : '' }}"><a href="{{route('about')}}">About Us</a></li>
            <li class="{{ 'admin/references' == request()->path() ? 'active' : '' }}"><a href="{{route('references')}}">References</a></li>
            <li class="{{ 'faq' == request()->path() ? 'active' : '' }}"><a href="{{route('faq')}}">FAQ</a></li>
            <li class="{{ 'admin/contact' == request()->path() ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
          </ul>                            
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </section>
  <!-- End menu section -->