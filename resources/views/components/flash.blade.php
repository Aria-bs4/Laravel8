@if( session()->has('success' ) )
    <div x-data="{show : true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="bg-blue-300 bottom-4 fixed px-4 py-4 right-4 rounded text-sm"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif