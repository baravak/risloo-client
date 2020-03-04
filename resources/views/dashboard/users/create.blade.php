@extends($display->dashboard)

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-8 col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-header">Create</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('users.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('users.name') }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">{{ __('users.mobile') }}</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="{{ __('users.mobile') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('users.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('users.email') }}">
                    </div>

                    <div class="form-group">
                        <label for="username">{{ __('users.username') }}</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="{{ __('users.username') }}">
                    </div>

                    <div class="form-group">
                        <label for="status">{{ __('users.status') }}</label>
                        <select class="custom-select" id="status" name="status">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">{{ __('users.type') }}</label>
                        <select class="custom-select" id="type" name="type">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <label class="d-block">{{ __('users.gender') }}</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="genderMale" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="genderMale">{{ __('male') }}</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="genderFemale" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="genderFemale">{{ __('female') }}</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('users.create') }}</button>
                    <a href="/dashboard/users" class="btn btn-light">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
