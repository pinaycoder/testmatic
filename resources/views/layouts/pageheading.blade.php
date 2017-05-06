<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ ucfirst(strtok(Request::path(), '/')) }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Home</a>
            </li>
            <li class="active">
                <strong>{{ ucfirst(strtok(Request::path(), '/')) }}</strong>
            </li>
            <!--<li class="active">
                <strong>{{ ucfirst(Request::path()) }}</strong>
            </li>-->
        </ol>
    </div>
    <div class="col-lg-2">
        
    </div>
</div>