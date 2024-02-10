<div class="col-xl-3 col-lg-4 col-md-6">
    <aside class="blog-sidebar">
        <div class="widget sidebar-widget">
            <h4 class="widget-title">Ən son suallar</h4>
            <div class="rc__post-wrapper">
                <div class="rc__post-item">
                    @foreach($recentQuestions as $question)
                    <div class="rc__post-content mb-2">
                        <ul class="tgbanner__content-meta list-wrap">
                            <li class="category">{{ $question->updated_at->format('d.m.Y') }}</li>
                        </ul>
                        <h5 class="title tgcommon__hover fw-normal"><a href="{{ route("site.question.detail.get", $question->slug) }}">{{ $question->title }}</a>
                        </h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </aside>
</div>
