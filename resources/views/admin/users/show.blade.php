@extends('layouts.master')

@section('title')
  @lang('translation.user.user')
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('translation.user.user')
    @endslot
    @slot('li_2')
      {{ route('users.index') }}
    @endslot
    @slot('title')
      @lang('translation.user.user_info')
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body border-bottom">
          <div class="float-end dropdown ms-2">
            <a class="text-info" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-horizontal font-size-18"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="javascript:void(0)">@lang('translation.actions')</a>
              <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">@lang('translation.edit_resource', ['resource' => __('attributes.user')])</a>
              <a class="dropdown-item" href="javascript:void(0)" onclick="submitDeleteForm('userShowDeleteForm_{{ $user->id }}')"> @lang('translation.delete_resource', ['resource' => __('attributes.user')])</a>
              <form action="{{ route('users.destroy', $user->id) }}" method="POST" id="userShowDeleteForm_{{ $user->id }}">
                @csrf
                @method('DELETE')
              </form>
            </div>
          </div>

          <div class="mb-4">
            <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-lg" alt="Responsive image">
          </div>

          <div class="row justify-content-between">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table-nowrap table-borderless mb-0 table">
                  <tbody>
                    <tr>
                      <th scope="row">@lang('translation.user.name') :</th>
                      <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.user.role') :</th>
                      <td>{{ $user->getRoleNames()[0] }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.user.phone') :</th>
                      <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.user.phone_alt') :</th>
                      <td>{{ $user->phone_alt ?? '---' }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.user.email') :</th>
                      <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                      <th scope="row">@lang('translation.user.address') :</th>
                      <td>{{ $user->address ?? '---' }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
