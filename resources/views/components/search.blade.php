
<div class="col-12 col-md-6 col-lg-6 px-0">
    <form method="/">
        <div id="datatable_filter" class="dataTables_filter px-0" style="text-align: left">
            <label>
                <div class="input-group d-flex">
                    <input type="search" class="form-control outline-primary" placeholder="Search" id="search" name="search" value="{{ request('search') }}" />
                    <button class="btn btn-primary" id="search" type="submit">Search</button>
                </div>   
            </label>             
        </div>
    </form>
</div>