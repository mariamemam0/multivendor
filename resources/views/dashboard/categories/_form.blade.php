@if($errors->any())
<div class="alert alert-danger">
    <h3>Error Occured!</h3>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif




<div class="form-group">
      <x-form.label id="name">Category Name</x-form.label>
       <br>
        <x-form.input  label="Category Name" class="form-control-lg" role="input"  name="name" value="{{$category->name}}" />
    </div>
    <div class="form-group">
        <x-form.label id="category parent">Category Parent</x-form.label><br>
        <select name="parent_id" calss="form-control form-select">
            <option value="">primary category</option>
            @foreach($parents as $parent)
            <option value="{{$parent->id}}" @selected(old('parent_id', $category->parent)==$parent->id) >{{$parent->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <x-form.label id="description">Description</x-form.label>
        <x-form.textarea name="description" :value="$category->description"/>
    </div>
    <div class="form-group">
        <x-form.label id="image">Image</x-form.label>
        <x-form.input type="file" name="image" accept="image/*"/>
        @if($category->image)
        <img src="{{asset('storage/'. $category->image) }}" alt= "" height="50px">
        @endif

    </div>
    <div class="form-group">
        <x-form.label id="status">Status</x-form.label>
        <div>
            <x-form.radio name="status" checked="$category->status" :options="['active'=> 'Active','archived'=>'Archived']"/>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{$button_label ?? 'save'}}</button>
    </div>