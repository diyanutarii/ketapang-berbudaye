@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
        <span class="text-capitalize">
            {{ Session::get('message') }}
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
        @foreach ($errors->all() as $error)
            @if (count($errors->all()) > 1)
                - <span class="text-capitalize">{{ $error }}</span><br>
            @else
                <span class="text-capitalize">
                    {{ $error }}
                </span>
            @endif
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
