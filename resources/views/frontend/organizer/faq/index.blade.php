@extends('frontend.organizer.layout.default')
@section('title', 'FAQ')
@section('faq-active', 'active')
@section('body')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row clearfix justify-content-center">
               <div class="col-md-12">
                   <div id="accordion">
                       @foreach($faqs as $faq)
                           <div class="card">
                               <div class="card-header" id="heading{{$loop->iteration}}">
                                   <h5 class="mb-0">
                                       <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse{{$loop->iteration}}">
                                           {{ $faq->title }}
                                       </button>
                                   </h5>
                               </div>

                               <div id="collapse{{$loop->iteration}}" class="collapse @if($loop->first) show @endif" aria-labelledby="heading{{$loop->iteration}}" data-parent="#accordion">
                                   <div class="card-body">{{ $faq->content }}</div>
                               </div>
                           </div>
                       @endforeach
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
