<div class="card border-{{ $color }} bg-light mb-3">
    <div class="card-header">
        Response
    </div>
    <div class="card-body text-{{ $color }}">
        <p class="card-text">
            <div>
                Name searched for: {{ $data->name }}
            </div>
            <div>
                Gender: {{ $data->gender }}
            </div>
            <div>
                Probability: {{ $data->probability }}
            </div>
            <div>
                Count: {{ $data->count }}
            </div>
            <div>
                Json: <input type='text' class="form-text" value='{{ json_encode($data) }}' />
            </div>
        </p>
    </div>
</div>