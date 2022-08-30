<ul>
    @foreach($subcategories as $subcategory)
        <li>
            <i class="far fa-plus-square" style="margin-right: 6px;"></i> {{$subcategory->name}}
            {{-- <a href="{{ route('category.edit', $subcategory->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="edit">
                <i class="la la-edit"></i>
            </a>
            <a href="{{ route('category.destroy', $subcategory->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                <i class="la la-trash"></i>
            </a> --}}
            @if(count($subcategory->subcategory))
                @include('dashboard.category.subCategoryList',['subcategories' => $subcategory->subcategory])
            @endif
        </li>
    @endforeach
</ul>
