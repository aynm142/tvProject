<div id="sidebar-wrapper">
    <div class="sidebar__search form-group">
        <form action="" onsubmit="alert('it will be sended..probably!');return false;">
            <input class="form-control" type="search" placeholder="Search something..">
        </form>
    </div>

    <div class="sidebar">
        <div class="sidebar__menu">
            @foreach($categories as $category)
                <div class="sidebar__menu-item">
                    <a data-genre="{{ $category->id }}" href="index.html">{{ $category->category_name }}</a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="sidebar-backdrop"></div>
</div>