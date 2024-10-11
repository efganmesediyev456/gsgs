@extends('site.layouts.main')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/{{app()->getLocale()}}">@lang('frontend.home_page')</a>
                    <span></span> @lang('frontend.contact_page')
                </div>
            </div>
        </div>


        <section class="section-border pt-50 pb-50">
            <div class="container">
                @if($contact->map)
                <div id='map-panes' class="leaflet-map mb-50">
                    <iframe src="{{$contact->map}}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                @endif
                <div class="row">
                    @foreach($contactDetails as $detail)
                    <div class="col-md-4 mb-4 mb-md-0 mb-5">
                        <h4 class="mb-15 text-brand">{{ $detail->title }}</h4>
                        {{$detail->address}}<br>
                        <abbr title="Phone">@lang('frontend.contact_phone'):</abbr> {{$detail->phone}}<br>
                        <abbr title="Email">@lang('frontend.contact_email'): </abbr><a href="#"> {{$detail->email}} </a><br>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">{{ __('frontend.contact_form_title') }}</h3>
                            <p class="text-muted mb-30 text-center font-sm">{{ __('frontend.contact_form_content') }}</p>
                            <form class="contact-form-style text-center formContact" id="contact-form" action="{{ route('site.contact', ['language'=>app()->getLocale()]) }}" method="post">
                                <div class="row">
                                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="name" placeholder="{{ __('frontend.contact_form_first_name') }}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="email" placeholder="{{ __('frontend.contact_form_email') }}" type="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="phone" placeholder="{{ __('frontend.contact_form_phone') }}" type="tel">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="subject" placeholder="{{ __('frontend.contact_form_subject') }}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="textarea-style mb-30">
                                            <textarea name="message" placeholder="{{__('frontend.contact_form_message')}}"></textarea>
                                        </div>
                                        <button class="submit submit-auto-width" type="submit">{{ __('frontend.contact_form_submit') }}</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@section('footer_more')

@endsection
