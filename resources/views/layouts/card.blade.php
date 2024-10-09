<link rel="stylesheet" href="{{ asset('assets/css/card.css') }}">

<div class="card-container row">
    @foreach ($datasets as $dataset)
        <div class="col-6 col-sm-4 col-md-3 mb-2">
            <div class="card">
                <img class="card-img"
                    src="{{ !empty($dataset->image) ? asset('assets/dataset_images/' . $dataset->image) : 'https://picsum.photos/200/300?random=' . rand(1, 1000) }}"
                    alt="Dataset Image">

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $dataset->name }}</h5>
                    <p class="card-text mt-auto">
                        {{ Str::limit($dataset->description, 72) }}

                    </p>
                </div>
                <a class="view-dataset" href="{{ $dataset->link }}">View Datasets</a>
            </div>
        </div>
    @endforeach
</div>
