<div class="form-group dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Except
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <div class="dropdown-item">
            @foreach($donates as $donation)
                <input type="checkbox" class="form-check-input" name="except[]" value="{{$donation->name}}" id="checkbox_{{str_replace(' ', '', $donation->name)}}">
                <label class="form-check-label" for="checkbox_{{$donation->name}}">{{$donation->name}}</label>
                <br/>
            @endforeach
        </div>
    </div>
</div>
