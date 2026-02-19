@extends('admin.layouts.app')

@section('title', 'Why Section – Home Content')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="mb-0">Why You Should Join?</h5>
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        @if($errors->any())
          <div class="alert alert-danger alert-dismissible" role="alert">
            <ul class="mb-0">
              @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif

        <form action="{{ route('admin.content.why.update') }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <label class="form-label" for="title">Section title <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $why->title) }}" required />
          </div>
          <div class="mb-4">
            <label class="form-label" for="description">Section description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $why->description) }}</textarea>
          </div>
          <hr class="my-4" />
          <h6 class="mb-3">Cards (1–6)</h6>
          @for($i = 1; $i <= 6; $i++)
            @php
              $titleKey = 'card'.$i.'_title';
              $descKey = 'card'.$i.'_desc';
            @endphp
            <div class="card mb-3">
              <div class="card-body">
                <h6 class="text-muted">Card {{ $i }}</h6>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="{{ $titleKey }}">Title</label>
                    <input type="text" class="form-control @error($titleKey) is-invalid @enderror" id="{{ $titleKey }}" name="{{ $titleKey }}" value="{{ old($titleKey, $why->$titleKey) }}" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="{{ $descKey }}">Description</label>
                    <input type="text" class="form-control @error($descKey) is-invalid @enderror" id="{{ $descKey }}" name="{{ $descKey }}" value="{{ old($descKey, $why->$descKey) }}" />
                  </div>
                </div>
              </div>
            </div>
          @endfor
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update Why Section</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
