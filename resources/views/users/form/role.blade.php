@php
$roles = App\Models\Role::get();
@endend
<form class="" action="" method="post">
  <div class="from-group">
    <select class="" name="roles" multiple>
      @foreach ($roles as $role)
      <option value="{{$role->id}}">{{$role->display_name}}</option>
    </select>
  </div>

  <input type="submit" name="" value="Save" class="btn btn-success">
</form>
