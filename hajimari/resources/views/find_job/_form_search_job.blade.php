<div class="row mb-5">


  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
    <input type="text" value="{{$inputs['nameJob']}}" name="nameJob" class="form-control form-control-lg place_work_search" placeholder="Nhập tên việc làm" autocomplete="off">
    <div></div>
  </div>

  {{-- place work --}}


  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
    <select name="workplace[]" class="form-control form-control-lg workplace" multiple="multiple">
        <option></option>
        @foreach($listWorkplace as $city)
          
            <option value="{{$city->id}}" {{ in_array($city->id, $inputs['workplace'] ) ? 'selected':'' }} > {{$city->name}} </option>
         
        @endforeach
    </select>
  </div>


  {{-- linh vuc --}}


  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4  mb-lg-0">
   
      <select name="field_search[]" class="form-control form-control-lg field_search" multiple="multiple">
        <option></option>

        @foreach($listField as $field)
          @if($field->parent_id == 0)
          <option class="field_parent" value="{{$field->id}}" {{ in_array($field->id, $inputs['field_search'])?'selected':'' }}  > {{$field->name}} </option>

          @else
              <option class="field_child" value="{{$field->id}}" {{ in_array($field->id, $inputs['field_search'])?'selected':'' }} > {{$field->name}} </option>

          @endif
        @endforeach

      </select> 
  </div>


  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mt-4 mb-lg-0">
    <select name="salaryLevel[]" class="form-control form-control-lg salaryLevel" multiple="multiple">
        <option></option>
        @foreach($salaryLevel as $i => $value)
          
            <option value="{{$i}}" {{ in_array($i, $inputs['salaryLevel']) ?'selected':'' }} >
                {{$value}}
                
            </option>
         
        @endforeach
    </select>
  </div>

  {{-- laguage --}}

  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mt-4 mb-lg-0">
    <select name="laguageLevel[]" class="form-control form-control-lg laguageLevel" multiple="multiple">
        <option></option>
        @foreach($listLanguage as $lang)
          
            <option {{ in_array($lang,  $inputs['laguageLevel']) ?'selected':'' }} value="{{$lang}}" > {{"N".$lang}} </option>
         
        @endforeach
    </select>
  </div>


  <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mt-4 mb-lg-0">
    <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Tìm kiếm</button>
  </div>

</div>

