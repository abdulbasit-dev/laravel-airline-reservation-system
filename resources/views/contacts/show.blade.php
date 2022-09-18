@extends('layouts.master')

@section('title')
  @lang('translation.contact.contact')
@endsection
\

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.contact.contact')
    @endslot
    @slot('li_2')
      {{ route('contacts.index') }}
    @endslot
    @slot('title')
      @lang('translation.contact.contact_info')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-8">
      <div class="card">
        <div class="card-body border-bottom">

          <div>
            <div>
              <h2 class="">{{ $contact->subject }}</h3>
                <h5>{{ $contact->created_at }} by <a href="{{ route('users.show', $contact->user->id) }}" class="text-primary fw-bold">{{ Str::title($contact->user->name) }}</a></h5>
                <p class="text-muted mt-4">{{ $contact->note }}</p>
            </div>
          </div>
        </div>

      </div>


    </div>
  </div>
@endsection
