<div class="row">
    @foreach($audios as $audio)
        <div class="col-lg-6 col-sm-6">
            <div class="featured__post">
                <div class="featured__content">
                    <ul class="tgbanner__content-meta list-wrap">
                        <li class="category"><a
                                href="{{ route('site.audio-category.slug.get', $audio->category->slug) }}">{{ $audio->category->name }}</a>
                        </li>
                    </ul>
                    <h4 class="title tgcommon__hover mb-2">{{ $audio->title }}</h4>
                    <div class="ready-player-1 player">
                        <audio crossorigin>
                            <source src="{{ url($audio->audio) }}" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
