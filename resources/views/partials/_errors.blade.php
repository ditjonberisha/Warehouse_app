
@if(count($errors))
    <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            <div class="alert alert-danger">
                <div class="form-group">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif