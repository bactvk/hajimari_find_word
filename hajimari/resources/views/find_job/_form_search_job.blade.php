<div class="row mb-5">


  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
    <input type="text" value="{{$inputs['nameJob']}}" name="nameJob" class="form-control form-control-lg place_work_search" placeholder="Nhập tên việc làm">
    <div></div>
  </div>

  {{-- place work --}}
  {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
    <input type="text" class="form-control form-control-lg place_work_search" value="{{$inputs['workplace']}}" placeholder="Địa điểm làm việc" readonly>  
    <ul class="list-unstyled dropdown_place_work">
      @foreach($listWorkplace as $city)
      <li>
        <label><input class="workplace" type="checkbox" name="workplace[]" value="{{$city->id}}" />{{$city->name}}</label>
      </li>
      @endforeach
    </ul>
  </div> --}}

  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
    <select name="workplace[]" class="form-control form-control-lg js-example-basic-multiple" multiple="multiple">
        <option></option>
        @foreach($listWorkplace as $city)
          
            <option value="{{$city->id}}" {{ ( isset(Request()->workplace) && in_array($city->id,(Request()->workplace)) )?'selected':'' }} > {{$city->name}} </option>
         
        @endforeach
    </select>
  </div>


  {{-- linh vuc --}}
  
  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4  mb-lg-0">
    <input type="text" value="{{$inputs['field']}}" class="form-control form-control-lg place_work_search" placeholder="Lĩnh vực" readonly >
    <ul class="list-unstyled dropdown_place_work">
      @foreach($listField as $field)
        <li>
          <label class="field_parent"><input type="checkbox" class="field_search" name="field_parent[]" value="{{$field->id}}" />{{$field->name}}</label>
        </li>
        <?php $field_child = \App\Job::getFieldParent($field->id) ?>
        @if($field_child)
          @foreach($field_child as $item)
            <li>
              <label><input type="checkbox" class="field_search" name="field_child[]" value="{{$item->id}}" />{{$item->name}}</label>
            </li>
          @endforeach
        @endif
      @endforeach
      
    </ul>
  </div>



  {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4  mb-lg-0">
   
      <select name="field_search[]" class="form-control form-control-lg field_search" multiple="multiple">
        <option></option>

        @foreach($listField as $field)

          <option class="field_parent" value="{{$field->id}}"  > {{$field->name}} </option>

          
          @if($field_child)
            @foreach($field_child as $item)
              <option class="field_child" value="{{$item->id}}" > {{$item->name}} </option>
            @endforeach

          @endif
        @endforeach

      </select> 
  </div> --}}

  {{-- salary --}}
  {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mt-4 mb-lg-0">
    <input type="text" class="form-control form-control-lg place_work_search" placeholder="Mức lương" value="{{$inputs['salaryLevel']}}"readonly>
    <ul class="list-unstyled  dropdown_place_work">
      <li>
        <label><input type="checkbox" class="field_search_salary" name="salaryLevel[]" value="1" /> < 500$</label>
      </li>
      <li>
        <label><input type="checkbox" class="field_search_salary" name="salaryLevel[]" value="2" /> 500 - 1000$</label>
      </li>
      <li>
        <label><input type="checkbox" class="field_search_salary" name="salaryLevel[]" value="3" /> 1001$ - 1500$</label>
      </li>
      <li>
        <label><input type="checkbox"class="field_search_salary" name="salaryLevel[]" value="4" /> 1501$ - 2000$</label>
      </li>
      <li>
        <label><input type="checkbox" class="field_search_salary" name="salaryLevel[]" value="5" /> 2001$ - 2500$</label>
      </li>
      <li>
        <label><input type="checkbox" class="field_search_salary" name="salaryLevel[]" value="6"/> >2500$</label>
      </li>

    </ul>
  </div> --}}

  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mt-4 mb-lg-0">
    <select name="salaryLevel[]" class="form-control form-control-lg salaryLevel" multiple="multiple">
        <option></option>
        @for($i=1; $i<=6; $i++)
          
            <option value="{{$i}}" {{ ( isset(Request()->salaryLevel) && in_array($i,(Request()->salaryLevel)) )?'selected':'' }} >
                @if($i==1) {{"< 500$"}}
                @elseif($i==2) {{"500 - 1000$"}}
                @elseif($i==3) {{"1001$ - 1500$"}}
                @elseif($i==4) {{"1501$ - 2000$"}}
                @elseif($i==5) {{"2001$ - 2500$"}}
                @elseif($i==6) {{">2500$"}}

                @endif 
                
            </option>
         
        @endfor
    </select>
  </div>

  {{-- laguage --}}
  {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mt-4 mb-lg-0">
    <input type="text" class="form-control form-control-lg place_work_search" value="{{$inputs['laguageLevel']}}" placeholder="Trình độ tiếng nhật" readonly>
    <ul class="list-unstyled  dropdown_place_work">
      <li>
        <label><input class="field_search_languge" name="laguageLevel[]" type="checkbox" value="1" />N1</label>
      </li>
      <li>
        <label><input class="field_search_languge" name="laguageLevel[]" type="checkbox" value="2"/>N2</label>
      </li>
      <li>
        <label><input class="field_search_languge" name="laguageLevel[]" type="checkbox" value="3"/>N3</label>
      </li>
      <li>
        <label><input class="field_search_languge" name="laguageLevel[]" type="checkbox" value="4"/>N4</label>
      </li>
      <li>
        <label><input class="field_search_languge" name="laguageLevel[]" type="checkbox" value="5"/>N5</label>
      </li>
     
    </ul>
  </div> --}}
  <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mt-4 mb-lg-0">
    <select name="laguageLevel[]" class="form-control form-control-lg laguageLevel" multiple="multiple">
        <option></option>
        @foreach($listLanguage as $lang)
          
            <option {{ ( isset(Request()->laguageLevel) && in_array($lang,(Request()->laguageLevel)) )?'selected':'' }} value="{{$lang}}" > {{"N".$lang}} </option>
         
        @endforeach
    </select>
  </div>


  <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mt-4 mb-lg-0">
    <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Tìm kiếm</button>
  </div>

</div>

