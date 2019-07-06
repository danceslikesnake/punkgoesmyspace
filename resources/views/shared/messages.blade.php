<div style="margin: 0 1.5rem 1.5rem 1.5rem;">
@if(session('success'))
    <div class="notification is-primary">{{session('success')}}</div>
@endif
@if(session('error'))
    <div class="notification is-danger">{{session('error')}}</div>
@endif
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="notification is-danger">
            {{$error}}
        </div>
    @endforeach
@endif
</div>