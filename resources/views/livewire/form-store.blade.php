<div>
<!-- @if ($errors->any())
    <div class="alert alert-danger w-50 mx-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif -->
<form wire:submit.prevent="submitForm"  class="w-50 mx-auto">
    @csrf
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input wire:model="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{old('title')}}" name="title">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea wire:model="description" class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{old('description')}}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
</div>
<!-- <div class="mb-3">
  <select hidden class="form-control" id="exampleFormControlInput1" name="postCreator"> 
  <option value='{{auth()->user()->id}}' >{{auth()->user()->name}}</option>
  </select> 
</div> -->
<input type="submit" class="btn btn-success">
</form>

</div>