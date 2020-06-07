<div class="member">
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="{{ asset('assets/images/work.png') }}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">
                {{ $announcement->title }}
            </h4>
            <p>{{ $announcement->created_at }}</p>
            <span class="divider"></span>
            <p>{{ $announcement->description }}</p>
        </div>
    </div>
</div>