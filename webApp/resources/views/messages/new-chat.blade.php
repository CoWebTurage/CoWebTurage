<h2>{{ __("New chat") }}</h2>
<form class="space-y-2" method="post" action="{{ route('message.send') }}">
    @csrf

    <div>
        <label for="receiver_id">{{ __('Select a user to message') }}</label>
        <select id="receiver_id" name="receiver_id">
            @foreach($usersToChat as $userToChat)
                <option value="{{ $userToChat->id }}"> {{ $userToChat->firstname . " " . $userToChat->lastname }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="body">{{__('Type your message here')}}</label>
        <input id="body" name='body' class="form-input">
    </div>
    <button class="primary-button p-2 text-base" type="submit">{{ __('Submit') }}</button>
</form>
