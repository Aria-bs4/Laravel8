<x-layout>
    <x-setting heading='Publish New Post'>
        
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name='title' required/>
            <x-form.input name='slug' required/>
            <x-form.input name='thumbnail' type='file' required />
            <x-form.textarea name='excerpt' :slot="null"/>
            <x-form.textarea name='body' :slot="null"/>

            <x-form.field>
                <x-form.label name='category' />

                <select id='category_id' name='category_id'>
                    @foreach (App\Models\Category::all() as $category)
                        <option 
                            value='{{ $category->id }}' {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ $category->name }}</option>
                    @endforeach
                </select>

                <x-form.error name='category' />
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>

    </x-setting>



</x-layout>