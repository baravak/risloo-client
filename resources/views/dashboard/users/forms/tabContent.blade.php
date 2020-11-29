<div class="tab-pane fade pt-3" id="public-key" role="tabpanel" aria-labelledby="public-key-tab">
    @if (auth()->user() && auth()->user()->public_key)
        <div class="card-body">
            <div class="form-group form-group-m">
                <textarea disabled class="form-control form-control-m text-left direction-ltr fs-10" name="publicKey" id="publicKey" cols="30" rows="10" style="resize: none">{{ auth()->user()->public_key }}</textarea>
                <label for="publicKey">{{__('Public key')}}</label>
            </div>
        </div>
    @else
        <form action="{{route('dashboard.users.publicKey', ['user' => $user->id])}}" method="POST">
            <div class="card-body">
                <div class="form-group form-group-m">
                    <textarea class="form-control form-control-m text-left direction-ltr fs-10" name="publicKey" id="publicKey" cols="30" rows="10" style="resize: none"></textarea>
                    <label for="publicKey">{{__('Public key')}}</label>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{__('Set public key')}}
                </button>
            </div>
        </form>
        @endif
</div>
