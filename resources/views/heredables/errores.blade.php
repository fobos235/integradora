@if($errors -> any())
    @foreach ($collection as $item)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach