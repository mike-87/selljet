<!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <a href="/home"><h3>Sell jet</h3></a>
        </div>
        <ul class="list-unstyled components">
            @foreach($categories as $section)
            
            <li>
                <a data-bs-toggle="collapse" href="#multiCollapseExample{{$section->categories_id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$section->categories_id}}" class="dropdown-toggle">{{$section->name}}</a>

                @if(count($section->children) > 0)

                <ul class="collapse list-unstyled multi-collapse" id="multiCollapseExample{{$section->categories_id}}">
                    @foreach($section->children as $category)
                    <li>
                        <a data-bs-toggle="collapse" href="#multiCollapseExample{{$category->categories_id}}" aria-expanded="false" aria-controls="multiCollapseExample{{$category->categories_id}}" class="dropdown-toggle">{{$category->name}}</a>
                        @if(count($category->children) > 0)
                                
                        <ul class="collapse list-unstyled multi-collapse" id="multiCollapseExample{{$category->categories_id}}">
                        @foreach($category->children as $subcategory)
                            <li>
                                <a href="/ads/category/{{$subcategory->categories_id}}" class="item-indent">{{$subcategory->name}}</a>      
                            </li>
                        @endforeach
                        </ul>
                                
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif

            </li>
            @endforeach
        </ul>
    </nav>