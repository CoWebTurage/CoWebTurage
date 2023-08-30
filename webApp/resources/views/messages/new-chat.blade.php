<form method="post" action="{{ route('message.send') }}">
    @csrf
    <label>
        {{ __('Select a user to message') }}
        <div>
            <select name="receiver_id">
                @foreach(getUsersNoChat(Auth::user()->id) as $userToChat)
                    <option value="{{ $userToChat->id }}"> {{ $userToChat->firstname . " " . $userToChat->lastname }}</option>
                @endforeach
            </select>
        </div>
    </label>
    <div>
        <label>
            {{__('Type your message here')}}
            <input name='body' class="form-input">
        </label>
    </div>
    <button class="form-button">{{ __('Submit') }}</button>
</form>
