<link rel="stylesheet" href="{{ asset('assets/css/card.css') }}">

<div class="row card-container">
    @foreach ($datasets as $dataset)
        <div class="col-6 col-sm-4 col-md-3 mb-2">
            <div class="card" id="dataset-card-{{ $dataset->id }}">
                <div class="image-button-container">
                    <img class="card-img"
                        src="{{ !empty($dataset->image) ? asset('assets/dataset_images/' . $dataset->image) : 'https://picsum.photos/200/300?random=' . rand(1, 1000) }}"
                        alt="Dataset Image">

                    <!-- Subscription Button inside its own form -->
                    <form action="{{ route('subscribe', ['datasetId' => $dataset->id]) }}" method="POST"
                        class="d-inline">
                        @csrf
                        <button class="subscribe-data btn btn-primary" type="submit">
                            <i class="fas fa-bolt"></i>
                            {{ in_array($dataset->id, $subscribedDatasetIds) ? 'Unsubscribe' : 'Subscribe' }}
                        </button>
                    </form>
                </div>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $dataset->name }}</h5>
                    <p class="card-text mt-auto">
                        {{ Str::limit($dataset->description, 72) }}
                    </p>
                </div>

                <!-- View Dataset Link -->
                <a class="view-dataset" href="{{ $dataset->link }}">View Datasets</a>
            </div>
        </div>
    @endforeach
</div>

<!-- Include your JavaScript file -->
<script src="{{ asset('assets/js/card.js') }}"></script>
