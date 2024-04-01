<div class="card border-0">
    <div class="card-body">
        <h5 class="card-title"></h5>
        <form type="POST" action="{{ route('marketplace.search') }}">
            <div class="input-group">
                <input type="search" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary border-0" data-mdb-ripple-init><i class="fas fa-lg fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
