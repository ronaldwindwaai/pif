<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                </div>
                <ul class="breadcrumb">
                    <?php $link=''; ?>
                    <li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
                    @foreach(Request::segments() as $segment)
                        <?php $link = $link.'/'.$segment;?>
                        <li class="breadcrumb-item"><a href="{{ $link }}">{{ ucwords($segment) }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
