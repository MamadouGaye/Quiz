<div livewire:quiz.3s>
    <div style="width: 500px; height: 500px;">
        <livewire:livewire-pie-chart
            key="{{ $pieChartModel->reactiveKey() }}"
            :pie-chart-model="$pieChartModel"
        />
    </div>

    <ul>
        @foreach($quiz->responses as $choice)
        <li>{{ $choice->text }}: <b>{{ $choice->votes }} {{ Str::plural('vote', $choice->votes) }}</b></li>
        @endforeach
    </ul>
</div>
