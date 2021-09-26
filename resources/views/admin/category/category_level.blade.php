<div class="form-group">
    <label>Select Category Level</label><span class="text-danger"> * </span>
    <select name="Parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
        <option value="">Main Category</option>
        @if(!empty($getCataegories))
            @foreach($getCataegories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @if(!empty($category['subCategory']))
                        @foreach($category['subCategory'] as $subCat)
                            <option value="{{$subCat->id}}"> ➥ {{$subCat->category_name}}</option>
                        @endforeach
                    @endif
            @endforeach
        @endif
    </select>
</div>
