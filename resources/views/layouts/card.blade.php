<link rel="stylesheet" href="{{ asset('assets/css/card.css') }}">


<div class="card-container row">
    @foreach ($datasets as $dataset)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm">
                <img class="image-dataset card-img-top"
                    src="{{ !empty($dataset->image) ? asset('assets/dataset_images/' . $dataset->image) : 'https://picsum.photos/200/300?random=' . rand(1, 1000) }}"
                    alt="Dataset Image">


                <div class="card-body">
                    <h5 class="card-title">{{ $dataset->name }}</h5>
                    <p class="card-text mt-auto">
                        {{ Str::limit($dataset->description, 72) }}
                        @if (strlen($dataset->description) > 72)
                            <a href="#" class="see-more" data-id="{{ $dataset->id }}"></a>
                        @endif
                    </p>

                </div>
                <a class="view-dataset" href="{{ $dataset->link }}">View
                    Datasets</a>
            </div>
        </div>
    @endforeach
</div>
